<?php
namespace Models;
use \Core\Model;
use \Models\Aulas;

class Modulos extends Model {

	public function getModulos($id_curso) {
		$array = array();

		$sql = "SELECT * FROM modulos WHERE id_curso = '$id_curso' ORDER BY ordem";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();

			$aulas = new Aulas();

			foreach($array as $mChave => $mDados) {
				$array[$mChave]['aulas'] = $aulas->getAulasDoModulo($mDados['id']);
			}

		}

		return $array;
	}

	public function getModulosPorAula($id) {
		$array = array();

		$sql = "SELECT * FROM modulos WHERE id = '$id' ORDER BY ordem";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();

			$aulas = new Aulas();

			foreach($array as $mChave => $mDados) {
				$array[$mChave]['aulas'] = $aulas->getAulasDoModulo($mDados['id']);
			}

		}

		return $array;
	}

	public function getModulo($id) {
		$array = array();

		$sql = "SELECT * FROM modulos WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		var_dump("getModulo" . $array);
		return $array;
	}

	public function getModulosPorOrdem($id_curso) {
		$array = array();

		$sql = "SELECT * FROM modulos WHERE id_curso = '$id_curso' ORDER BY ordem";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
			}

		return $array;
	}

	public function updateModuloPorOrdem($id, $id_curso, $ordem) {
		$this->db->query("UPDATE modulos SET id_curso = '$id_curso', ordem = '$ordem' WHERE id = '$id'");

		return $this->getModulosPorOrdem($id);
	}


	public function addModulo($nome, $id_curso) {
		$sql = "SELECT ordem FROM modulos WHERE id_curso = '$id_curso' ORDER BY ordem DESC LIMIT 1";
		$sql = $this->db->query($sql);
		$ordem = 1;
		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$ordem = intval($sql['ordem']);
			$ordem++;
		}
		$this->db->query("INSERT INTO modulos SET nome = '$nome', ordem = '$ordem', id_curso = '$id_curso'");

	}

	public function deleteModulo($id) {
		$sql = "SELECT id_curso FROM modulos WHERE id = '$id'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$this->db->query("DELETE FROM modulos WHERE id = '$id'");

			return $sql['id_curso'];
		}
	}

	public function updateModulo($id, $nome, $midia) {
		$sql = "SELECT id FROM modulos WHERE id = '$id'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$this->db->query("UPDATE modulos SET nome = '$nome', midia = '$midia' WHERE id = '$id'");

			return $sql['id'];
		}
	}	

	public function deleteImagemModulo($id) {
		$array = array();

		$sql = "SELECT imagem FROM modulos WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$rows = $sql->fetchAll();

			foreach($rows as $row) {
				$array[] = $row['imagem'];
			}
		}
		return $array;
	}

	public function deleteArquivoModulo($id) {
		$array = array();
		
		$sql = "SELECT arquivo FROM modulos WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$rows = $sql->fetchAll();

			foreach($rows as $row) {
				$array[] = $row['arquivo'];
			}
		}
		return $array;
	}


	public function updateImagemModulo($id, $imagem) {
		$this->db->query("UPDATE modulos SET imagem = '$imagem' WHERE id = '$id'");

		return $this->getModulo($id);
	}

	public function updateArquivoModulo($id, $arquivo) {
		$this->db->query("UPDATE modulos SET arquivo = '$arquivo' WHERE id = '$id'");

		return $this->getModulo($id);
	}

	public function updateVideoModulo($id, $url_video) {
		$this->db->query("UPDATE modulos SET url_video = '$url_video' WHERE id = '$id'");

		return $this->getModulo($id);
	}


}