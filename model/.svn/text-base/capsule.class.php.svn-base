<?php 

class capsuleMain {

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
	
	public function capsuleAvailableList () {
	
		$capList	=  new dataSelect("*","cap_list","cap_lis_status","Active");
		$capList	-> selectSingleTableWhereClause();
		
		if (isset($capList -> arrayResult)) {
				
			foreach ($capList -> arrayResult as $list) {

				include_once "$list[cap_lis_include]";
			
			}
			
		}
			
	}
	
	
}


?>