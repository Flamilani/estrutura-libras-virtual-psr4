<?php
namespace Models;
use \Core\Model;

class Alunos extends Model {

	public function getAlunos() {
		$array = array();

		$sql = "SELECT * FROM alunos";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	
	public function selectAlunosCurso() {
		$array = array();

		$sql = "SELECT DISTINCT id, nome FROM alunos WHERE NOT EXISTS 
		(SELECT * FROM aluno_curso WHERE alunos.id = aluno_curso.id_aluno)";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	
	public function getAlunosCurso() {
		$array = array();

		$sql = "SELECT * FROM alunos a INNER JOIN aluno_curso ac ON a.id = ac.id_aluno";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	
	public function addAlunoCurso($id_curso, $id_aluno) {
		$sql = "INSERT INTO aluno_curso SET id_curso = '$id_curso', id_aluno = '$id_aluno'";
		$sql = $this->db->query($sql);
	}
    
	public function addAluno($nome, $email, $senha, $status) {
		$sql = "INSERT INTO alunos SET nome = '$nome', email = '$email', senha = '$senha', senha_md5 = md5('$senha'), status = '$status'";
		$sql = $this->db->query($sql);
	}

	public function deleteAluno($id) {
		$sql = "DELETE FROM aluno_curso WHERE id_aluno = '$id'";
		$this->db->query($sql);

		$sql = "DELETE FROM alunos WHERE id = '$id'";
	}

	public function deleteAlunoCurso($id) {
		$sql = "SELECT id_curso FROM aluno_curso WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$this->db->query("DELETE FROM aluno_curso WHERE id = '$id'");

			return $sql['id_curso'];
		}
	}

	public function updateAluno($nome, $id) {
		$sql = "SELECT id_curso FROM modulos WHERE id = '$id'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$this->db->query("UPDATE modulos SET nome = '$nome' WHERE id = '$id'");

			return $sql['id_curso'];
		}
	}


}