<?php 

//Including Necessary Files 
include 'model/db.class.php';
include 'model/data.class.php';
include 'model/pages.class.php';
include 'model/capsule.class.php';

//Initialization of Available Capsule
capsuleMain::capsuleAvailableList();

//Initialization of Available Pages
pagesMain::pagesAvailableList();

echo "test test";

?>