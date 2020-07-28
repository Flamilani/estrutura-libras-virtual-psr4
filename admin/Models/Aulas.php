<?php
namespace Models;
use \Core\Model;

class Aulas extends Model {

	public function getAulasDoModulo($id) {
		$array = array();

		$sql = "SELECT * FROM aulas WHERE id_modulo = '$id' ORDER BY ordem";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();

			foreach($array as $aulachave => $aula) {
				if($aula['tipo'] == 'aula') {
					$sql = "SELECT nome_aula FROM aulas WHERE id = '".($aula['id'])."'";
					$sql = $this->db->query($sql)->fetch();
					$array[$aulachave]['nome'] = $sql['nome_aula'];
				}
				elseif($aula['tipo'] == 'poll') {
					$sql = "SELECT questao FROM questionarios WHERE id = '".($aula['id'])."'";
					$sql = $this->db->query($sql)->fetch();
					$array[$aulachave]['nome'] = $sql['questao'];	
				}
				elseif($aula['tipo'] == 'especifica') {
					$sql = "SELECT titulo_pagina FROM pagina_especifica WHERE id_aula = '".($aula['id'])."'";
					$sql = $this->db->query($sql)->fetch();
					$array[$aulachave]['nome'] = $sql['titulo_pagina'];
				}
			}
		}

		return $array;
	}

	public function deleteAula($id) {
		$sql = "SELECT id_curso FROM aulas WHERE id = '$id'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$this->db->query("DELETE FROM aulas WHERE id = '$id'");
			$this->db->query("DELETE FROM questionarios WHERE id_aula = '$id'");
			$this->db->query("DELETE FROM videos WHERE id_aula = '$id'");
			$this->db->query("DELETE FROM historico WHERE id_aula = '$id'");
			$this->db->query("DELETE FROM arquivos WHERE id_aula = '$id'");
			$this->db->query("DELETE FROM pagina_especifica WHERE id_aula = '$id'");
			$this->db->query("DELETE FROM atividades WHERE id_aula = '$id'");

			return $sql['id_curso'];
		}
	}

	public function addAula($id_curso, $id_modulo, $nome, $tipo) {
		$sql = "SELECT ordem FROM aulas WHERE id_modulo = '$id_modulo' ORDER BY ordem DESC LIMIT 1";
		$sql = $this->db->query($sql);
		$ordem = 1;
		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$ordem = intval($sql['ordem']);
			$ordem++;
		}

		$sql = "INSERT INTO aulas SET id_modulo = '$id_modulo', id_curso = '$id_curso', ordem = '$ordem', tipo = '$tipo', nome_aula = '$nome'";
		$this->db->query($sql);
		$id_aula = $this->db->lastInsertId();

	    if($tipo == 'especifica') {
			$this->db->query("INSERT INTO pagina_especifica SET id_aula = '$id_aula', titulo_pagina = '$nome'");
		} else {
			$this->db->query("INSERT INTO questionarios SET id_aula = '$id_aula', questao = '$nome'");
		} 
	}

	public function getAula($id_aula) {
		$array = array();

		$sql = "
		SELECT 
			tipo
		FROM 
			aulas 
		WHERE 
			id = '$id_aula'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$row = $sql->fetch();

			if($row['tipo'] == 'aula') {

				$sql = "SELECT * FROM aulas WHERE id = '$id_aula'";
				$sql = $this->db->query($sql);
				$array = $sql->fetch();
				$array['tipo'] = 'aula';

			}
			elseif($row['tipo'] == 'poll') {

				$sql = "SELECT * FROM questionarios WHERE id_aula = '$id_aula'";
				$sql = $this->db->query($sql);
				$array = $sql->fetch();
				$array['tipo'] = 'poll';

			}	
			elseif($row['tipo'] == 'especifica') {

				$sql = "SELECT * FROM pagina_especifica WHERE id_aula = '$id_aula'";
				$sql = $this->db->query($sql);
				$array = $sql->fetch();
				$array['tipo'] = 'especifica';

			}
		}

		return $array;
	}

	public function updateVideoAula($id, $nome, $descricao, $url) {
		$this->db->query("UPDATE videos SET nome = '$nome', descricao = '$descricao', url = '$url' WHERE id_aula = '$id'");

		return $this->getCursoDeAula($id);
	}

	public function updateQuestionarioAula($id, $pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $resposta, $questao, $midia_opcao, $midia_pergunta) {
		$this->db->query("UPDATE questionarios SET pergunta = '$pergunta', opcao1 = '$opcao1', opcao2 = '$opcao2', opcao3 = '$opcao3', opcao4 = '$opcao4', 
		resposta = '$resposta', questao = '$questao', midia_opcao = '$midia_opcao', midia_pergunta = '$midia_pergunta' WHERE id_aula = '$id'");

		return $this->getCursoDeAula($id);
	}

	
	public function updateAula($id, $nome, $midia, $atividade) {
		$sql = "SELECT id FROM aulas WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$this->db->query("UPDATE aulas SET nome_aula = '$nome', midia = '$midia', atividade = '$atividade' WHERE id = '$id'");

			return $sql['id'];
		}
	}

	public function updateAulaPorOrdem($id, $id_modulo, $ordem) {
		$this->db->query("UPDATE aulas SET ordem = '$ordem' WHERE id_modulo = '$id_modulo' AND id = '$id'");

		return $this->getCursoDeAula($id);
	}

	public function getCursoDeAula($id_aula) {

		$sql = "SELECT id_curso FROM aulas WHERE id = '$id_aula'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$row = $sql->fetch();
			return $row['id_curso'];
		} else {
			return 0;
		}

	}

	public function getAulaCurso($id_aula) {
		$array = array();

		$sql = "SELECT * FROM aulas WHERE id = '$id_aula'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	
	public function getModuloDeAula($id_aula) {

		$sql = "SELECT id_modulo FROM aulas WHERE id = '$id_aula'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$row = $sql->fetch();
			return $row['id_modulo'];
		} else {
			return 0;
		}

	}

	public function updateImagemAula($id, $imagem) {
		$this->db->query("UPDATE aulas SET imagem = '$imagem' WHERE id = '$id'");

		return $this->getAulaCurso($id);
	}

	public function updateArquivoAula($id, $arquivo) {
		$this->db->query("UPDATE aulas SET arquivo = '$arquivo' WHERE id = '$id'");

		return $this->getAulaCurso($id);
	}

	public function updateVideoDeAula($id, $url_video) {
		$this->db->query("UPDATE aulas SET url_video = '$url_video' WHERE id = '$id'");

		return $this->getAulaCurso($id);
	}

}