<?php
namespace Core;

class Controller {

	protected $db;

	public function __construct() {
		global $db;
		$this->db = $db;
	}

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

	public function zeroPad($string) {
		$str = str_pad($string, 4, '0', STR_PAD_LEFT);
		return $str;
	}

	public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
	}
	
	function limitarTexto($texto, $limite){
		$contador = strlen($texto);
		if ( $contador >= $limite ) {      
			$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
			return $texto;
		}
		else{
		  return $texto;
		}
	  }
	  
	  function aulaButton($tipo) {
		switch ($tipo) {
			case "especifica":
			  echo '<i class="fa fa-file-text-o" aria-hidden="true"></i>';
			  break;
			case "poll":
			  echo '<i class="fa fa-question" aria-hidden="true"></i>';
			  break;
			default:
			  echo '<i class="fa fa-video-camera" aria-hidden="true"></i>';
		  }
	  } 

	  function aulaColor($tipo) {
		switch ($tipo) {
			case "especifica":
			  echo 'info';
			  break;
			case "poll":
			  echo 'success';
			  break;
			default:
			  echo 'primary';
		  }
	  } 

	  function aulaTooltip($tipo) {
		switch ($tipo) {
			case "especifica":
			  echo 'Página Especifíca';
			  break;
			case "poll":
			  echo 'Questionário';
			  break;
			default:
			  echo 'Aula';
		  }
	  } 

}