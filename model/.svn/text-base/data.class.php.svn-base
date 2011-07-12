<?php 

$db = new databaseConn();
$db -> dbConnect();


class dataSelect {

public $column;
public $tableName;
public $whereClause;
public $arrayResult;
public $singleResult;
public $whereID;

	public function __construct($column,$tableName,$whereClause,$whereID) {
	
		$this -> column 		= $column;
		$this -> tableName		= $tableName;
		$this -> whereClause	= $whereClause;
		$this -> whereID		= $whereID;
	
	}

	public function selectSingleTable () {
	
		$query	= "SELECT " . $this -> column . " FROM " . $this -> tableName;
		$result	= mysql_query($query) or die (mysql_error());
		
			while ($row = mysql_fetch_assoc($result)) { 
			$array [] = $row;
			}
		
		$this -> arrayResult = $array; 
	
	}
	
	public function selectSingleTableWhereClause () {
	
		$query	= 
		"SELECT " . 
		$this -> column . " FROM " . 
		$this -> tableName . " WHERE " . 
		$this -> whereClause . " = '" . 
		$this -> whereID . "'";

		$result	= mysql_query($query) or die (mysql_error());
		
			while ($row = mysql_fetch_assoc($result)) { 
			$array [] = $row;
			}
		
		$this -> arrayResult = $array; 
	
	}
	
	
	public function selectSingleTableWhereClauseIsNull () {
		
			$query	= 
			"SELECT " . 
			$this -> column . " FROM " . 
			$this -> tableName . " WHERE " . 
			$this -> whereClause . " " . 
			$this -> whereID . "";

			$result	= mysql_query($query) or die (mysql_error());
			
				while ($row = mysql_fetch_assoc($result)) { 
				$array [] = $row;
				}
			
			$this -> arrayResult = $array; 
		
		}
	
	
	public function selectFindMenuPath ($page) {
		
		$query	= "SELECT cap_men_id FROM cap_menu";
		$result	= mysql_query($query);

			while ($row = mysql_fetch_array($result)) {
			$idMenu [] = $row[cap_men_id];
			}
			
			if (preg_match("/(-)(a)(-)+/",$this -> whereID)) {

			$split = explode("-",$this -> whereID);
			
			$this -> whereID = '';
			
				foreach ($split as $value) {
					if ($value == "a") {
					$combine .= "&-";
					}
					else {
					$combine .= $value . "-";
					}
				}
			
			$this -> whereID = $combine;
			
			$this -> whereID = preg_replace("/[^a-zA-Z0-9\&]/"," ",$this -> whereID);
			}
			else if (preg_match("/[-]/",$this -> whereID)) {
			$this -> whereID = preg_replace("/[^a-zA-Z0-9]/"," ",$this -> whereID);
			}
					
		$query  = "SELECT * FROM cap_menu 
				  LEFT JOIN cap_menu_pages_combine ON 
				  cap_menu.cap_men_id = cap_menu_pages_combine.cap_menu_cap_men_id 
				  LEFT JOIN cap_pages ON 
				  cap_menu_pages_combine.cap_pages_cap_pag_id = cap_pages.cap_pag_id
				  WHERE cap_men_id = '".$this -> whereID."'";

		$result = mysql_query($query) or die (mysql_error());
		$row	= mysql_fetch_array($result);
		$check	= mysql_affected_rows();
		$path	= $row[cap_pag_path];
				
			if ($page == '') {
			$this -> singleResult = "view/pages/default/index.php"; 
			}
			else if ($page != '' && $check == 0) {
			$this -> singleResult = "view/pages/404-Error/index.php";
			}
			else {
			$this -> singleResult = $path; 
			}
			
		}
	

}

class dataInsert {

}

class dataDelete {

}

class dataUpdate {

}


?>