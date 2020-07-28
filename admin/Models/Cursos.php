<?php
namespace Models;
use \Core\Model;

class Cursos extends Model {

	public function getCursos() {
		$array = array();

		$sql = "SELECT *, (select count(*) from aluno_curso where aluno_curso.id_curso = cursos.id) as qtalunos 
		FROM cursos ORDER BY ordem";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getCurso($id) {
		$array = array();

		$sql = "SELECT * FROM cursos WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getCursosInscritos($id_aluno) {
		$array = array();

		$sql = "SELECT id_curso FROM aluno_curso WHERE id_aluno = '$id_aluno'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$rows = $sql->fetchAll();

			foreach($rows as $row) {
				$array[] = $row['id_curso'];
			}
		}

		return $array;
	}

	public function updateCurso($id, $nome, $descricao, $url) {
		$this->db->query("UPDATE cursos SET nome = '$nome', descricao = '$descricao', url = '$url' WHERE id = '$id'");

		return $this->getCurso($id);
	}

	public function updateImagemCurso($id, $imagem) {
		$this->db->query("UPDATE cursos SET imagem = '$imagem' WHERE id = '$id'");

		return $this->getCurso($id);
	}

	public function updateCursoPorOrdem($id, $ordem) {
		$this->db->query("UPDATE cursos SET ordem = '$ordem' WHERE id = '$id'");
		return $this->getCurso($id);
	}

}
?>