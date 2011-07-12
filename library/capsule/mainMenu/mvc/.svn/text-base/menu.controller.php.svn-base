<?php

class menuController extends menuMain {

	public function subMenuModelSwitcher ($id,$var,$file,$u) {

	$this -> menuData = menuData::dropDownData($id,$array);

		switch ($var) {
		
		case "Main":
		menuView::menuMainDisplay();
		break;
		
	
		case "Service":
		$this -> menuTree = "<div id='mainMenu-Service'>" . menuView::createServiceTreeStructure($this -> menuData,$i,$subMenu,$parentName) . "</div>";
		$this -> menuJS	  = menuView::menuJavascript($this -> menuTree,$var);
		$text = $this -> menuJS;
		fwrite($file, "$text");
		unset($subMenu);
		break;
		
		
		case "SneakPrevSubMenu":
		$this -> menuTreePrev = menuView::createServiceTreePreviewStructure();
		$this -> menuJSPr = menuView::menuJavascriptSneak($this -> menuTreePrev);
		break;
		
		
		default:
			if (!empty($this -> menuData)) {
			$this -> menuTree = "<div id='mainMenuView1'>" . menuView::createTreeStructure($this -> menuData,$i,$subMenu) . "</div>";
			}
			else {
			$this -> menuTree = menuView::createTreeStructure($this -> menuData,$i,$subMenu);
			}
			
		$this -> menuJS	  = menuView::menuJavascript($this -> menuTree,$var);
		$text = $this -> menuJS;
		fwrite($file, "$text");
		unset($subMenu);
		break;
	
		}
	
	}

}

?>