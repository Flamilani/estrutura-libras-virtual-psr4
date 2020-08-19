<?php
namespace Core;

class Controller {

	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		require 'Views/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {
		require 'Views/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require 'Views/'.$viewName.'.php';
	}

	// HELPERS
	
	public function getLastUrl() {
		$url = explode("/", $_SERVER["PHP_SELF"]); 
		$last = end($url); 
		return $last;
	}


}