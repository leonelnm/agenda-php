<?php

include_once('connection.php');
include_once('contact.php');

class ContactDao
{

	private $pdo;

	function __construct()
	{
		$this->pdo = Connection::createConnection();
		$this->createTable();
	}

	private function createTable()
	{
		$sql = "CREATE TABLE IF NOT EXISTS CONTACTS ( id INTEGER PRIMARY KEY, name VARCHAR(45) NOT NULL, telephone INNTEGER NOT NULL UNIQUE)";
		try {
			$this->pdo->exec($sql);
		} catch (\PDOException $th) {
			echo 'error create Table: ' . $th->getMessage();
		}
	}

	public function getAllContactsDB()
	{
		try {
			$stmt = $this->pdo->query("SELECT * FROM CONTACTS");
			$data = [];
			while ($row = $stmt->fetchObject()) {
				$contact = new Contact($row->name, $row->telephone);
				$contact->setId($row->id);
				$data[] = $contact;
			}
			return $data;
		} catch (\PDOException $th) {
			echo 'error create Table: ' . $th->getMessage();
		}
	}

	public function insertContactDB($name, $phone)
	{
		$sql = "INSERT INTO CONTACTS (name, telephone) VALUES (:name, :phone)";
		try {
			$smtp = $this->pdo->prepare($sql);
			$smtp->bindValue(':name', $name);
			$smtp->bindValue(':phone', $phone);
			$smtp->execute();

			return $this->pdo->lastInsertId();
		} catch (\PDOException $e) {
			echo 'error insert Table: ' . $e->getMessage();
		}
	}

	public function deleteContactDB($id)
	{
		$sql = "DELETE FROM CONTACTS WHERE id = :id";
		try {
			$smtp = $this->pdo->prepare($sql);
			$smtp->bindValue(':id', $id);
			$smtp->execute();

			return $smtp->rowCount();
		} catch (\PDOException $e) {
			echo 'error delete Table: ' . $e->getMessage();
		}
	}


	public function getContact($id)
	{
		$sql = "SELECT * FROM CONTACTS WHERE id = :id";
		try {

			$smtp = $this->pdo->prepare($sql);
			$smtp->bindValue(':id', $id);
			$smtp->execute();

			$result = $smtp->fetchObject();

			if ($result) {
				$contact = new Contact($result->name, $result->telephone);
				$contact->setId($result->id);
			}

			return $contact;
		} catch (\PDOException $e) {
			echo 'error delete Table: ' . $e->getMessage();
		}
	}

	public function updateContactDB($id, $name, $phone)
	{
		$sql = "UPDATE CONTACTS SET name=:name, telephone=:phone where id=:id";
		try {
			$smtp = $this->pdo->prepare($sql);
			$smtp->bindValue(':name', $name);
			$smtp->bindValue(':phone', $phone);
			$smtp->bindValue(':id', $id);
			$smtp->execute();

			return $smtp->rowCount();
		} catch (\PDOException $e) {
			echo 'error delete Table: ' . $e->getMessage();
		}
	}




	// Métodos para creaar un array en variables de sessión

	public function getAllContacts()
	{
		$contacts = array();

		foreach ($_SESSION["contacts"] as $item) {
			array_push($contacts, unserialize($item));
		}
		return $contacts;
	}

	public function createContact($name, $phone)
	{
		$this->checklength();

		return  array_unshift($_SESSION["contacts"], serialize(new Contact($name, $phone)));
	}


	public function checklength()
	{
		while (count($_SESSION["contacts"]) >= 10) {
			array_pop($_SESSION["contacts"]);
		};
	}
}
