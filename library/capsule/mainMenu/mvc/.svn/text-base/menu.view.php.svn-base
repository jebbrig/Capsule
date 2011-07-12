<?php

class menuView extends menuMain {

	public function menuMainDisplay () {
	
			$this -> menuRoot .= "<ul class='menu'>";
			$this -> menuRoot .= "<li class='logoHeader'></li>";
		
			$data  = new dataSelect ("*","cap_menu","cap_men_parent","IS NULL");
			$data -> selectSingleTableWhereClauseIsNull();
			
				foreach ($data -> arrayResult as $key => $value) { 
				$id = strtolower($value[cap_men_id]);
					if (preg_match("/[&]/",$id)) {
					$id = str_replace("&","a",$id);
					$id = preg_replace("/[^a-zA-Z0-9]/","-",$id);
					}
					else {
					$id = preg_replace("/[^a-zA-Z0-9]/","-",$id);
					}
				$this -> menuRoot .= "<li class='menuList'><a href='$id' class='href'>$value[cap_men_name]</a></li>";
				}
		
			$this -> menuRoot .= "<li class='search'><input type='text' class='searchBoxMain'></li>";
			$this -> menuRoot .= "</ul>";
			
		}
	
	
	public function createTreeStructure ($menuTree,&$i,&$subMenu) {
	
	$subMenu;
	$i = array();
	
		foreach ($menuTree as $key => $value) {
		
		$subMenu .= "<ul>";
		
			foreach ($value as $keyParent => $valueParent) {
			
				if ($keyParent == 'parent') {
				
					foreach ($valueParent as $keyParent2 => $valueParent2) {
					
						if (!in_array($valueParent2[Name],$i)) {
							if ($valueParent2[Path] != '') {
							$subMenu .= "<li><a href='$valueParent2[Path]'>$valueParent2[Name]</a></li>";
							}
							else {
							$subMenu .= "<li>$valueParent2[Name]</li>";
							}
						}
						
						else {}
						
					$i [] = $valueParent2[Name];
					
					}
					
				}
				
				else if ($keyParent == 'child') {
					foreach ($valueParent as $keyParent3 => $valueParent3) {
					menuView::createTreeStructure($valueParent,$i,$subMenu);
					break;
					
					}
					
				}
			
			}			

		$subMenu .= "</ul>";
		
		}
		
	return $subMenu;
	
	}
	
	public function createServiceTreeStructure ($menuTree,&$i,&$subMenu,&$parentName) {

		$subMenu;
		
		//$preview = array();
		
		$i = array();
		
			foreach ($menuTree as $key => $value) {
			
				if ($parentName == "") {	
				$subMenu .= "<div class='oilupstream'><ul>";
				}
				else {
				$subMenu .= "<ul>";
				}
			
				foreach ($value as $keyParent => $valueParent) {
												
					if ($keyParent == 'parent') {
										
						foreach ($valueParent as $keyParent2 => $valueParent2) {
						
							if (!in_array($valueParent2[Name],$i)) {
								if ($valueParent2[Path] != '' && $valueParent2[IMG] != '') {
								$parentName = $valueParent2[Name];
								$subMenu .= "<li><img src='$valueParent2[IMG]' class='menuIMG'><a href='$valueParent2[Path]'>$valueParent2[Name]</a></li>";
								//$preview [] = $valueParent2[Preview];
								}
								else if ($valueParent2[Path] != '' && empty($valueParent2[IMG])) {
								$parentName = $valueParent2[Name];
								$subMenu .= "<li><a href='$valueParent2[Path]'>$valueParent2[Name]</a></li>";
								//$preview [] = $valueParent2[Preview];
								}
								else if ($valueParent2[Path] == '' && $valueParent2[IMG] != '') {
								$parentName = $valueParent2[Name];
								$subMenu .= "<li><img src='$valueParent2[IMG]' class='menuIMG'>$valueParent2[Name]</a></li>";
								//$preview [] = $valueParent2[Preview];
								}
								else {
								$parentName = $valueParent2[Name];
								$subMenu .= "<li>$valueParent2[Name]</li>";
								//$preview [] = $valueParent2[Preview];
								}
							}
							
							else {}
							
						$i [] = $valueParent2[Name];
						$preview [] = $valueParent2[Preview];
						
						}
						
					}
					
					else if ($keyParent == 'child') {
						foreach ($valueParent as $keyParent3 => $valueParent3) {
						menuView::createTreeStructure($valueParent,$i,$subMenu,$parentName);
						break;
						
						}
						
					}
				
				}			
				
				if ($parentName == "Oil and Gas Upstream") {	
				$subMenu .= "</ul>";
				}
				else if ($parentName == "Oil and Gas Downstream") {
				$subMenu .= "</ul></div>";
				$subMenu .= "<div class='informationTech'>";
				}
				else if ($parentName == "Information Technology") {
				$subMenu .= "</ul></div>";
				$subMenu .= "<div class='ehs'>";
				}
				else if ($parentName == "Environment, health and Safety") {
				$subMenu .= "</div>";
				}
				else {
				$subMenu .= "</ul>";
				}
			
			}
		
		return $subMenu;
		
		}
		
		
	public function createServiceTreePreviewStructure () {
		
	$query	 = "SELECT cap_men_id, cap_men_name, cap_men_preview FROM cap_menu WHERE cap_men_preview IS NOT NULL";
	$result	 = mysql_query($query);
	
		while($row = mysql_fetch_array($result)) {
	
		$preview [] = array("ID" => $row[cap_men_id], "Name" => $row[cap_men_name], "Preview" => $row[cap_men_preview]);
	
		}		
	
	return $preview;
			
	}
	
	
	public function menuJavascriptSneak ($data) {
		
		foreach ($data as $key => $value) {
		
		$id	 = $value['ID'];
		$nam = str_replace(" ","",$value['Name']);
		$pre = $value['Preview'];
		
		$ret .= "var menuMain" . $nam . " = \"$pre\";";
		
		}
		
	return $ret;
	
	}
	
	public function menuJavascript ($menu,$var) {
		
	$res = "var " . $var . " = \"$menu\";";
	
	return $res;
	
	}

}


?>