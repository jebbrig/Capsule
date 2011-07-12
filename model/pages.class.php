<?php 

class pagesMain {

public $capName;
public $capCreator;
public $capDescription;
public $capCSS;
public $capJS;

	public function __construct ($capName,$capCreator,$capDescription,$capCSS,$capJS) {
	
		$this -> capName 		= $capName;
		$this -> capCreator 	= $capCreator;
		$this -> capDescription = $capDescription;
		$this -> capCSS 		= $capCSS;
		$this -> capJS 			= $capJS;
		
		echo $this 				-> capCSS;
		echo $this 				-> capJS;
	
	}
	
	public function pagesAvailableList () {
	
		$page  = mysql_real_escape_string($_GET[id]);
		$data  = new dataSelect ("","cap_menu","cap_men_id","$page");
		$data -> selectFindMenuPath($page);
		
		include $data -> singleResult;
					
	}
	
	
}


?>