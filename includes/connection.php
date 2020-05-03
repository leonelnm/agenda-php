<?php


class Connection{
	
	static function createConnection()
	{
		try {
			$pdo = new PDO("sqlite:agenda.db"); 

			return $pdo;
		} catch (\PDOException $th) {
			echo 'error connection: ' .$th->getMessage();
		}
	}

}

?>