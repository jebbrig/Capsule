<?php 

//Including necessary files 
include_once '../model/db.class.php';
include_once '../model/data.class.php';
include_once '../model/pages.class.php';
include_once '../model/capsule.class.php';

//Accepting basic data 
$id 		= $_POST[id];
$include	= $_POST[incl];
$control	= $_POST[control]; 


switch ($control) {

	case "dropDownData":
		include_once "$include";
		$array 		= menuData::dropDownData($id,$array);
		$menuTree 	= menuView::printDropDownData($array,$i,$subMenu);
		echo $menuTree;
	break;
	
	default:
		echo "No controller selected";
	break;


}

?>