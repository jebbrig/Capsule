<?php

class menuMain extends capsuleMain {

public $menuRoot;
public $menuModel;
public $menuTop;
public $menuData;
public $menuTree;
public $menuTreePrev;
public $menuJSPr;
public $menuJS;

	public function __construct () {
	
		parent::__construct(
	
		"mainMenu",
		"Media Instrument, Inc Team",
		"This is the main menu",
		"<link href='library/capsule/mainMenu/css/mainMenu.css' rel='stylesheet' type='text/css' />",
		"<script src='library/capsule/mainMenu/js/listener.js' type='text/javascript'></script>"
	
		);
		
		$query  = "SELECT cap_men_id,cap_men_name FROM cap_menu WHERE cap_men_parent IS NULL";
		$result = mysql_query($query);
		$file 	= fopen('library/capsule/mainMenu/js/subMenu.js', 'w') or die ('cannot write');
		$u		= 0;
		echo "<script type='text/javascript' language='javascript'>\n";		
		
			while ($row = mysql_fetch_array($result)) {
			$u++;
			menuController::subMenuModelSwitcher($row[cap_men_id],str_replace(" ","",$row[cap_men_name]),$file,$u);
			}
		
		echo "</script>";
		
		menuController::subMenuModelSwitcher("","SneakPrevSubMenu",$file,$u);
		
		$textPrev = $this -> menuJSPr;
		
		fwrite($file, "$textPrev");
		
		fclose($file);
		
		menuController::subMenuModelSwitcher("","Main",$file,$u);
		
	
	}
	
		
}



class menuData extends dataSelect {

	public function dropDownData ($id,&$menuTree) {
		
		$menuTree = array();
		$query	  = "SELECT * FROM cap_menu 
				     LEFT JOIN cap_menu_pages_combine ON cap_menu.cap_men_id = cap_menu_pages_combine.cap_menu_cap_men_id
				     LEFT JOIN cap_pages ON cap_menu_pages_combine.cap_pages_cap_pag_id = cap_pages.cap_pag_id
				     WHERE cap_men_parent = '$id' AND cap_men_access = 'Public' AND cap_men_status = 'Active'
				     ORDER BY cap_men_position ASC";
		$result	  = mysql_query($query);
		
			while ($row  = mysql_fetch_assoc($result)) {
						
			$array  []	 = array("ID" => $row[cap_men_id], "Name" => $row[cap_men_name], "Path" => $row[cap_pag_path], 'IMG' => $row[cap_men_img], 'Preview' => $row[cap_men_preview]);
			$parent 	 = $row[cap_men_id];
			$queryChild	 = "SELECT * FROM cap_menu WHERE cap_men_parent = '$parent'";
			$resultChild = mysql_query($queryChild);
			$check		 = mysql_affected_rows();
			
				if ($check != 0) {
				$menuTree  [] = array("parent" => $array, "child" => menuData::dropDownData($parent,$array[]));
				unset($array);
				}
				else {
				$menuTree []  = array("parent" => $array);
				}
							
			}
			
		return $menuTree;
						
	}
	
}

?>