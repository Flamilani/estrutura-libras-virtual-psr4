<?php
namespace Controllers;
use \Core\Controller;
use \Models\Usuarios;
use \Models\Alunos;
use \Models\Cursos;
use \Models\Modulos;
use \Models\Aulas;

class CursosController extends Controller {

    public function index() {
        $usuarios = new Usuarios();
        if(!$usuarios->isLogged()) {
           header("Location: " . BASE . "admin/login");
       } 
        $dados = array(
            'cursos' => array()
		);			

        $cursos = new Cursos();
        $dados['cursos'] = $cursos->getCursos();
        
        $this->loadTemplate('cursos', $dados);
	}
	
	public function update_ordem_curso() {

		// Usuário ordena curso
		$dados = array(
            'cursos' => array()
		);			

		if(isset($_POST['ordem']) && !empty($_POST['ordem'])) {				
			$array_ordem = $_POST['ordem'];
			$cont_ordem = 1;
			foreach($array_ordem as $id_curso) {
				$cursos = new Cursos();			
				$cursos->updateCursoPorOrdem($id_curso, $cont_ordem);	
				$cont_ordem++;
			}

			header("Location: ". BASE . "admin/cursos");
		}
		
		$cursos = new Cursos();
        $dados['cursos'] = $cursos->getCursos();
        
        $this->loadTemplate('cursos', $dados);
	}

	public function update_ordem_modulo() {

		// Usuário ordena curso
		$dados = array(
			'curso' => array(),
			'modulos' => array()
		);			

		if(isset($_POST['id_modulo']) && !empty($_POST['id_modulo'])) {				
			$array_ordem = $_POST['id_modulo'];
			$id_curso = $_POST['id_curso'];
			
			var_dump("entrou post: " . $id_curso);
			$cont_ordem = 1;
			foreach($array_ordem as $id_modulo) {
				$modulos = new Modulos();			
				$modulos->updateModuloPorOrdem($id_modulo, $id_curso, $cont_ordem);	
				$cont_ordem++;	
				var_dump("entrou foreach: " . $id_curso);
			}		
			header("Location: ". BASE . "admin/cursos/ordenar_modulo/" . $id_curso);
		}
		$modulos = new Modulos();		
		$dados['modulos'] = $modulos->getModulosPorOrdem($id_curso);

		$cursos = new Cursos();
		$dados['curso'] = $cursos->getCurso($id_curso);
        
        $this->loadTemplate('modulo_ordenar', $dados);
	}

	public function add_aula() {

		$dados = array(
			'curso' => array(),
			'aula' => array()
		);			
		
		if(isset($_POST['aula']) && !empty($_POST['aula'])) {
			$aula = addslashes($_POST['aula']);
			$moduloaula = addslashes($_POST['moduloaula']);
			$tipo = addslashes($_POST['tipo']);
			$id = addslashes($_POST['id']);

			$aulas = new Aulas();
			$aulas->addAula($id, $moduloaula, $aula, $tipo);
			
			$_SESSION['alerta_add_aula'] = 
			'<div class="text-center alert alert-success" role="alert">
			Aula inserida com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>';
		}	

		$aulas = new Aulas();		
		$dados['aula'] = $aulas->getAula($id_curso);

		$cursos = new Cursos();
		$dados['curso'] = $cursos->getCurso($id_curso);
        
        $this->loadTemplate('aulas', $dados);
	}

	public function update_ordem_aula() {

		// Usuário ordena curso
		$dados = array(
			'curso' => array(),
			'aula' => array()
		);			

		if(isset($_POST['id_aula']) && !empty($_POST['id_aula'])) {				
			$array_ordem = $_POST['id_aula'];
			$id_modulo = $_POST['id_modulo'];
			$id_curso = $_POST['id_curso'];
			$cont_ordem = 1;
			foreach($array_ordem as $id_aula) {
				$aulas = new Aulas();			
				$aulas->updateAulaPorOrdem($id_aula, $id_modulo, $cont_ordem);	
				$cont_ordem++;
			}	
			header("Location: ". BASE . "admin/cursos/aulas/" . $id_curso);
		}

		$aulas = new Aulas();		
		$dados['aula'] = $aulas->getAula($id_curso);

		$cursos = new Cursos();
		$dados['curso'] = $cursos->getCurso($id_curso);
        
        $this->loadTemplate('aulas', $dados);
	}
    
    public function deletar($id) {

		$sql = "SELECT id FROM aulas WHERE id_curso = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$aulas = $sql->fetchAll();

			foreach($aulas as $aula) {
				$sqlaula = "DELETE FROM historico WHERE id_aula = '".($aula['id_aula'])."'";
				$this->db->query($sqlaula);

				$sqlaula = "DELETE FROM questionarios WHERE id_aula = '".($aula['id_aula'])."'";
				$this->db->query($sqlaula);

				$sqlaula = "DELETE FROM videos WHERE id_aula = '".($aula['id_aula'])."'";
				$this->db->query($sqlaula);
			}

		}

		$sql = "DELETE FROM aluno_curso WHERE id_curso = '$id'";
		$this->db->query($sql);

		$sql = "DELETE FROM aulas WHERE id_curso = '$id'";
		$this->db->query($sql);

		$sql = "DELETE FROM modulos WHERE id_curso = '$id'";
		$this->db->query($sql);

		$sql = "DELETE FROM cursos WHERE id = '$id'";
		$this->db->query($sql);

		header("Location: ". BASE . "admin/cursos");

	}

	public function adicionar() {
		$dados = array();

		if(isset($_POST['nome']) && !empty($_POST['nome'])) {

			$nome = addslashes($_POST['nome']);
			$descricao = addslashes($_POST['descricao']);
			$imagem = $_FILES['imagem'];

			if(!empty($imagem['tmp_name'])) {

				$md5name = md5(time().rand(0,9999)).'.jpg';
				$types = array('image/jpeg', 'image/jpg', 'image/png');

				if(in_array($imagem['type'], $types)) {
					$path = "../assets/uploads/images/";
					
					if(!is_dir($path)) {
						mkdir($path, 0755, true);
					}
					move_uploaded_file($imagem['tmp_name'], $path . $md5name);
					
					$this->db->query("INSERT INTO cursos SET nome = '$nome', descricao = '$descricao', imagem = '$md5name'");

					header("Location: " . BASE . 'admin');
				}

			}

		}

		$this->loadTemplate("curso_add", $dados);
	}

	public function editar($id) {
		$dados = array(
			'curso' => array()
		);

		if(isset($_POST['nome']) && !empty($_POST['nome'])) {
			$nome = addslashes($_POST['nome']);
			$descricao = addslashes($_POST['descricao']);
			$imagem = $_FILES['imagem'];
			$url = addslashes($_POST['url']);
			$urlCurta = "https://youtu.be/";
			$novaUrl = str_replace($urlCurta, 'https://www.youtube.com/embed/', $url);

			$cursos = new Cursos();
			$cursos->updateCurso($id, $nome, $descricao, $novaUrl);

			if(!empty($imagem['tmp_name'])) {

				$md5name = md5(time().rand(0,9999)).'.jpg';
				$types = array('image/jpeg', 'image/jpg', 'image/png');

				if(in_array($imagem['type'], $types)) {
					$path = "../assets/uploads/images/";
					
					if(!is_dir($path)) {
						mkdir($path, 0755, true);
					}
					move_uploaded_file($imagem['tmp_name'], $path . $md5name);

					$cursos->updateImagemCurso($id, $md5name);

				}
			}
			
			$_SESSION['alerta_editar_curso'] = 
			'<div class="text-center alert alert-primary" role="alert">
			Curso atualizado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>';
	
			header("Location: ".BASE."admin/cursos/editar/" . $id);
			exit;
		}

		$cursos = new Cursos();
		$dados['curso'] = $cursos->getCurso($id);

		$this->loadTemplate('curso_editar', $dados);
	}

	public function aulas($id) {
		$dados = array(
			'curso' => array(),
			'modulos' => array()
		);

        $modulos = new Modulos();

		// Usuário adicionou um novo módulo
		if(isset($_POST['modulo']) && !empty($_POST['modulo'])) {
			$modulo = addslashes($_POST['modulo']);
			$modulos->addModulo($modulo, $id);

			$_SESSION['alerta_add_modulo'] = 
			'<div class="text-center alert alert-success" role="alert">
			Módulo inserido com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>';

		}

		// Usuário adicionou uma aula nova
		if(isset($_POST['aula']) && !empty($_POST['aula'])) {
			$aula = addslashes($_POST['aula']);
			$moduloaula = addslashes($_POST['moduloaula']);
			$tipo = addslashes($_POST['tipo']);

			$aulas = new Aulas();
			$aulas->addAula($id, $moduloaula, $aula, $tipo);
			
			$_SESSION['alerta_add_aula'] = 
			'<div class="text-center alert alert-success" role="alert">
			Aula inserida com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>';
		}

		if(isset($_POST['id_aula']) && !empty($_POST['id_aula'])) {				
			$array_ordem = $_POST['id_aula'];
			$id_modulo = $_POST['id_modulo'];
			$cont_ordem = 1;
			foreach($array_ordem as $id_aula) {
				$aulas = new Aulas();			
				$aulas->updateAulaPorOrdem($id_aula, $id_modulo, $cont_ordem);	
				$cont_ordem++;
			}

			header("Location: ".BASE."admin/cursos/aulas/".$id);
			exit;
		}

		$cursos = new Cursos();
		$dados['curso'] = $cursos->getCurso($id);
		$dados['modulos'] = $modulos->getModulos($id);

		$this->loadTemplate('aulas', $dados);
	}


	public function deletar_modulo($id) {

		if(!empty($id)) {

			$id = addslashes($id);
			$modulos = new Modulos();

			$id_curso = $modulos->deleteModulo($id);

			header("Location: " . BASE . "admin/cursos/aulas/".$id_curso);
		
			$_SESSION['alerta_deletar_modulo'] = 
			'<div class="text-center alert alert-danger" role="alert">
			Módulo deletado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>';
			exit;
		}

		header("Location: " . BASE . 'admin');
	}

	public function ordenar_modulo($id) {
		$dados = array(
			'curso' => array(),
			'modulos' => array()
		);

		$cursos = new Cursos();
		$dados['curso'] = $cursos->getCurso($id);

		$modulos = new Modulos();
		$dados['modulos'] = $modulos->getModulos($id);

		$this->loadTemplate('modulo_ordenar', $dados);
	}

	public function ordenar_aula($id) {
		$dados = array(
			'modulos' => array()
		);

		$modulos = new Modulos();
		$dados['modulos'] = $modulos->getModulosPorAula($id);

		$this->loadTemplate('aula_ordenar', $dados);


	}

	public function editar_modulo($id) {
		$array = array();

		if(isset($_POST['modulo']) && !empty($_POST['modulo'])) {
			$nome = addslashes($_POST['modulo']);
			$midia = addslashes($_POST['midia']);
			$imagem = $_FILES['imagem'];
			$pdf = $_FILES['pdf'];
			$video = addslashes($_POST['url_video']);

				$modulos = new Modulos();
				$modulos->updateModulo($id, $nome, $midia);
			
				if(!empty($imagem['tmp_name']) && $midia == 'imagem') {

				$md5name = md5(time().rand(0,9999)).'.jpg';
				$types = array('image/jpeg', 'image/jpg', 'image/png');	
						
		/* 		if(!empty($id)) {
					$magem = $modulos->deleteImagemModulo($id);
					unlink ("../assets/uploads/" . $magem);
				} */

				if(in_array($imagem['type'], $types)) {

					$path = "../assets/uploads/images/";
				
					if(!is_dir($path)) {
						mkdir($path, 0755, true);
					}	
					move_uploaded_file($imagem['tmp_name'], $path . $md5name);

					$modulos = new Modulos();
					$modulos->updateImagemModulo($id, $md5name);

					}
			}			

			if(!empty($_POST['url_video']) && $midia == 'video') {
			
			$urlCurta = "https://youtu.be/";
			$parte = substr($video, 0, 17);		
				$novaUrl = str_replace($urlCurta, 'https://www.youtube.com/embed/', $video);

				$modulos = new Modulos();
				$modulos->updateVideoModulo($id, $novaUrl);
			}	
			
			if(!empty($pdf['tmp_name']) && $midia == 'arquivo') {

				$md5name = md5(time().rand(0,9999)).'.pdf';
				$types = array('application/pdf');

		/* 		if(!empty($id)) {
					$arquivo = $modulos->deleteArquivoModulo($id);
					unlink ("../assets/uploads/" . $arquivo);
				} */

				if(in_array($pdf['type'], $types)) {
					
					$path = "../assets/uploads/pdfs/";
					
					if(!is_dir($path)) {
						mkdir($path, 0755, true);
					}
					move_uploaded_file($pdf['tmp_name'], $path . $md5name);

					$modulos = new Modulos();
					$modulos->updateArquivoModulo($id, $md5name);					
				}
			}	

			$_SESSION['alerta_editar_modulo'] = 
			'<div class="text-center alert alert-info" role="alert">
			Módulo atualizado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>';

			header("Location: ".BASE."admin/cursos/editar_modulo/" . $id);
			exit;
		}

		$modulos = new Modulos();
		$array['modulo'] = $modulos->getModulo($id);
		$this->loadTemplate('curso_editar_modulo', $array);
	}

	public function deletar_aula($id) {

		if(!empty($id)) {

			$id = addslashes($id);
			$aulas = new Aulas();

			$id_curso = $aulas->deleteAula($id);

			$_SESSION['alerta_deletar_aula'] = 
			'<div class="text-center alert alert-danger" role="alert">
			Aula deletada com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>';

			header("Location: " . BASE . "admin/cursos/aulas/".$id_curso);
			exit;
		}

		header("Location: " . BASE . "admin");
	}

	public function editar_curso_aula($id) {
		$dados = array();		

		if(isset($_POST['nome']) && !empty($_POST['nome'])) {
			$nome = addslashes($_POST['nome']);
			$midia = addslashes($_POST['midia']);
			$atividade = addslashes($_POST['atividade']);
			$imagem = $_FILES['imagem'];
			$pdf = $_FILES['pdf'];
			$video = addslashes($_POST['url_video']);
			$video_mp4 = $_FILES['video_mp4'];
			$imagem_gif = $_FILES['gif'];
			$gif = $_FILES['gif'];

			$aulas = new Aulas();
			$aulas->updateAula($id, $nome, $midia, $atividade);			
		

			if(!empty($_POST['url_video']) && $midia == 'video_youtube') {
			
			$urlCurta = "https://youtu.be/";
			$parte = substr($video, 0, 17);		
				$novaUrl = str_replace($urlCurta, 'https://www.youtube.com/embed/', $video);

				$aulas = new Aulas();
				$aulas->updateVideoDeAula($id, $novaUrl);
			}	

			if(!empty($_POST['url_vimeo']) && $midia == 'video_vimeo') {
			
				$urlCurta = "https://vimeo.com/";
				$parte = substr($video, 0, 17);		
					$novaUrl = str_replace($urlCurta, 'https://player.vimeo.com/video/', $video);
	
					$aulas = new Aulas();
					$aulas->updateVimeoAula($id, $novaUrl);
				}	

				if(!empty($video_mp4['tmp_name']) && $midia == 'video_mp4') {

					$md5name = md5(time().rand(0,9999)).'.mp4';
					$types = array('video/mp4');
			
					if(in_array($video_mp4['type'], $types)) {
	
						$path = "../assets/uploads/videos/";
						
						if(!is_dir($path)) {
							mkdir($path, 0755, true);
						}
						move_uploaded_file($video_mp4['tmp_name'], $path . $md5name);
	
						$aulas = new Aulas();
						$aulas->updateVideoMp4Aula($id, $md5name);
	
						}
				}	

				if(!empty($imagem['tmp_name']) && $midia == 'imagem') {

					$md5name = md5(time().rand(0,9999)).'.jpg';
					$types = array('image/jpeg', 'image/jpg', 'image/png');
			
					if(in_array($imagem['type'], $types)) {
	
						$path = "../assets/uploads/images/";
						
						if(!is_dir($path)) {
							mkdir($path, 0755, true);
						}
						move_uploaded_file($imagem['tmp_name'], $path . $md5name);
	
						$aulas = new Aulas();
						$aulas->updateImagemAula($id, $md5name);
	
						}
				}

				if(!empty($imagem_gif['tmp_name']) && $midia == 'gif') {

					$md5name = md5(time().rand(0,9999)).'.png';
					$types = array('image/gif', 'image/jpeg', 'image/jpg', 'image/png');
			
					if(in_array($imagem_gif['type'], $types)) {
	
						$path = "../assets/uploads/gifs/";
						
						if(!is_dir($path)) {
							mkdir($path, 0755, true);
						}
						move_uploaded_file($imagem_gif['tmp_name'], $path . $md5name);
	
						$aulas = new Aulas();
						$aulas->updateImagemGifAula($id, $md5name);
	
						}
				}
				
				if(!empty($gif['tmp_name']) && $midia == 'gif') {

					$md5name = md5(time().rand(0,9999)).'.gif';
					$types = array('image/gif');
			
					if(in_array($gif['type'], $types)) {
	
						$path = "../assets/uploads/gifs/";
						
						if(!is_dir($path)) {
							mkdir($path, 0755, true);
						}
						move_uploaded_file($gif['tmp_name'], $path . $md5name);
	
						$aulas = new Aulas();
						$aulas->updateGifAula($id, $md5name);
	
						}
				}	
			
			if(!empty($pdf['tmp_name']) && $midia == 'arquivo') {

				$md5name = md5(time().rand(0,9999)).'.pdf';
				$types = array('application/pdf');
/* 
				if(!empty($id)) {
					$arquivo = $modulos->deleteArquivoModulo($id);
					unlink ("../assets/uploads/" . $arquivo);
				} */

				if(in_array($pdf['type'], $types)) {

					$path = "../assets/uploads/pdfs/";
					
					if(!is_dir($path)) {
						mkdir($path, 0755, true);
					}

					move_uploaded_file($pdf['tmp_name'], $path . $md5name);

					$aulas = new Aulas();
					$aulas->updateArquivoAula($id, $md5name);					
				}
			}
		

			$_SESSION['alerta_editar_aula'] = 
			'<div class="text-center alert alert-info" role="alert">
			Aula atualizada com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>';

			header("Location: ".BASE."admin/cursos/editar_curso_aula/" . $id);
			exit;
		}
		$aulas = new Aulas();
		$dados['aula'] = $aulas->getAulaCurso($id);
		$dados['curso'] = $aulas->getCursoDeAula($id);

		$this->loadTemplate('curso_editar_aula', $dados);
	}

	public function editar_aula($id) {
		$dados = array();
		$view = 'curso_editar_aula_video';

		$aulas = new Aulas();

		if(isset($_POST['nome']) && !empty($_POST['nome'])) {
			$nome = addslashes($_POST['nome']);
			$descricao = addslashes($_POST['descricao']);
			$url = addslashes($_POST['url']);

			$urlCurta = "https://youtu.be/";

			$parte = substr($url, 0, 17);	
	
				$novaUrl = str_replace($urlCurta, 'https://www.youtube.com/embed/', $url);
	
				$id_curso = $aulas->updateVideoAula($id, $nome, $descricao, $novaUrl, $duracao);
				
				$_SESSION['alerta_editar_aula_video'] = 
				'<div class="text-center alert alert-info" role="alert">
				Aula atualizada com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>';
							
				header("Location: " . BASE . "admin/cursos/editar_aula/".$id);
				exit;
		}

		if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			$titulo = addslashes($_POST['titulo']);
			$descricao = addslashes($_POST['descricao']);
			$url = addslashes($_POST['url']);

			$urlCurta = "https://youtu.be/";

			$parte = substr($url, 0, 17);	
	
				$novaUrl = str_replace($urlCurta, 'https://www.youtube.com/embed/', $url);
	
				$id_curso = $aulas->updateAtividade($id, $titulo, $descricao, $novaUrl);

				$_SESSION['alerta_editar_atividade'] = 
				'<div class="text-center alert alert-info" role="alert">
				Atividade atualizada com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>';

				header("Location: " . BASE . "admin/cursos/editar_aula/".$id);
				exit;
		
		}

		if(isset($_POST['arquivo']) && !empty($_POST['arquivo'])) {
			$arquivo = addslashes($_POST['arquivo']);
			$descricao = addslashes($_POST['descricao']);
			$pdf = $_FILES['pdf'];

			$id_curso = $aulas->updateArquivo($id, $arquivo, $descricao);		
	
			if(!empty($pdf['tmp_name'])) {

				$md5name = md5(time().rand(0,9999)).'.pdf';
				$types = array('application/pdf');

				if(in_array($pdf['type'], $types)) {
					move_uploaded_file($pdf['tmp_name'], "../assets/uploads/" . $md5name);

					$aulas->updateArquivoPDF($id, $md5name);					
				}
			}

				$_SESSION['alerta_editar_arquivo_pdf'] = 
				'<div class="text-center alert alert-info" role="alert">
				Arquivo atualizado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>';

				header("Location: " . BASE . "admin/cursos/editar_aula/".$id);
				exit;
		}

		if(isset($_POST['titulo_pagina']) && !empty($_POST['titulo_pagina'])) {
			$nome = addslashes($_POST['titulo_pagina']);
			$descricao = addslashes($_POST['descricao']);
			$url = addslashes($_POST['url']);

			$urlCurta = "https://youtu.be/";

			$parte = substr($url, 0, 17);	
	
				$novaUrl = str_replace($urlCurta, 'https://www.youtube.com/embed/', $url);
	
				$id_curso = $aulas->updateVideoAula($id, $nome, $descricao, $novaUrl, $duracao);

				$_SESSION['alerta_editar_aula_video'] = 
				'<div class="text-center alert alert-info" role="alert">
				Aula atualizada com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>';	

				header("Location: " . BASE . "admin/cursos/editar_aula/" . $id);
				exit;
		}

		if(isset($_POST['pergunta']) && !empty($_POST['pergunta'])) {
			$pergunta = addslashes($_POST['pergunta']);
			$opcao1 = addslashes($_POST['opcao1']);
			$opcao2 = addslashes($_POST['opcao2']);
			$opcao3 = addslashes($_POST['opcao3']);
			$opcao4 = addslashes($_POST['opcao4']);
			$resposta = addslashes($_POST['resposta']);
			$questao = addslashes($_POST['questao']);
			$midia_opcao = addslashes($_POST['midia_opcao']);
			$midia_pergunta = addslashes($_POST['midia_pergunta']);

			$id_curso = $aulas->updateQuestionarioAula($id, $pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $resposta, $questao, $midia_opcao, $midia_pergunta);

			$_SESSION['alerta_editar_questao'] = 
			'<div class="text-center alert alert-info" role="alert">
			Questionário atualizado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>';
	
			header("Location: " . BASE . "admin/cursos/editar_aula/" . $id);
			exit;
		}

		
		$dados['aula'] = $aulas->getAula($id);

		if($dados['aula']['tipo'] == 'video') {
			$view = 'curso_editar_aula_video';
		} elseif($dados['aula']['tipo'] == 'poll') {
			$view = 'curso_editar_aula_poll';			
		} else {
			$view = 'curso_editar_aula_especifica';
		}

		$this->loadTemplate($view, $dados);

	}

}
