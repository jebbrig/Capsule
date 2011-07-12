<?php

class databaseConn {

public $databaseType 	= "mySql";
public $host			= "localhost";
public $userName		= "root";
public $password		= "root";
public $dbName			= "asaperkasa";

	public function __construct() {
	
		if (!empty($databaseType) 	|| 
			!empty($host) 			|| 
			!empty($userName) 		|| 
			!empty($password) 		|| 
			!empty($dbName)) {
	
		$this -> databaseType 	= $databaseType;
		$this -> host 			= $host;
		$this -> userName 		= $userName;
		$this -> password 		= $password;
		$this -> dbName 		= $dbName;
		
		}
	
	}
	
	public function dbConnect () {
	
		mysql_connect ($this -> host, $this -> userName, $this -> password) or die (mysql_error());
		mysql_select_db ($this -> dbName) or die (mysql_error()); 
	
	}
	
	public function dbClose () {
		mysql_close(); 
	}

}

?>