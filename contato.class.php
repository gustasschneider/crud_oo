<?php
class Contato {

	private $pdo;

	public function __construct() {
		$this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "root", "");
	}

	public function adicionar($postData) {
		if($this->existeEmail($postData->frm_add_email) == false) {
			$sql = "INSERT INTO contatos (cnto_nome, cnto_email) VALUES (:cnto_nome, :cnto_email)";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':cnto_nome', $postData->frm_add_nome);
			$sql->bindValue(':cnto_email', $postData->frm_add_email);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

	public function getInfo($id_contato) {
		$sql = "SELECT * FROM contatos WHERE cnto_id = :cnto_id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':cnto_id', $id_contato);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return array();
		}
	}

	public function getAll() {
		$sql = "SELECT * FROM contatos";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return array();
		}
	}

	public function editar($postData) {

		if($this->existeEmail(!empty($postData->frm_edit_email)) == false) {
			$sql = "UPDATE contatos SET cnto_nome = :cnto_nome, cnto_email = :cnto_email WHERE cnto_id = :cnto_id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':cnto_nome', $postData->frm_edit_nome);
			$sql->bindValue(':cnto_email', $postData->frm_edit_email);
			$sql->bindValue(':cnto_id', $postData->frm_edit_id);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

	public function excluirPeloId($id_contato) {
		$sql = "UPDATE contatos SET cnto_status = 'N' WHERE cnto_id = :cnto_id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':cnto_id', $id_contato);
		$sql->execute();
	}

	public function excluirPeloEmail($email) {
		$sql = "DELETE FROM contatos WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->execute();
	}

	private function existeEmail($email) {
		$sql = "SELECT * FROM contatos WHERE cnto_email = :cnto_email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':cnto_email', $email);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

    public function ativarContato($id_contato) {
        $sql = "UPDATE contatos SET cnto_status = 'S' WHERE cnto_id = :cnto_id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':cnto_id', $id_contato);
        $sql->execute();
    }


}











