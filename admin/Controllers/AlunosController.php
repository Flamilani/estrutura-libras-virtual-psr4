<?php
namespace Controllers;
use \Core\Controller;
use \Models\Usuarios;
use \Models\Alunos;

class AlunosController extends Controller {

    public function index() {
        $usuarios = new Usuarios();
        if(!$usuarios->isLogged()) {
           header("Location: " . BASE . "admin/login");
       } 

        $dados = array(
            'alunos' => array()
        );     
        
        if(isset($_POST['nome']) && !empty($_POST['nome'])) {

			$nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = $this->generateRandomString();
            $status = '1';

            $alunos = new Alunos();
            $alunos->addAluno($nome, $email, $senha, $status);			

            $_SESSION['alerta_add_aluno'] = 
            '<div class="text-center alert alert-success" role="alert">
            Aluno cadastrado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>';          
		}
     
        $alunos = new Alunos();
        $dados['alunos'] = $alunos->getAlunos();

        $this->loadTemplate('alunos', $dados);
    }
   
    public function deletar($id) {

		$alunos = new Alunos();
        $alunos->deleteAluno($id);          
      
			$_SESSION['alerta_deletar_aluno'] = 
			'<div class="text-center alert alert-danger" role="alert">
			Aluno deletado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>';

        header("Location: " . BASE . "admin/alunos");
	}

}