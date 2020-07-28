<?php
namespace Controllers;
use \Core\Controller;
use \Models\Usuarios;

class HomeController extends Controller {

    public function index() {
        $usuarios = new Usuarios();
        if(!$usuarios->isLogged()) {
           header("Location: " . BASE . "admin/login");
       } 

        $dados = array();
        $this->loadTemplate('home', $dados);
    }  

    public function perfil() {       
        $dados = array();
        $this->loadTemplate('perfil', $dados);
    }  

}
