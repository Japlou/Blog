<?php


namespace Config;

use \PDO;

class Database 
{

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;

	//instance de PDO qui represente la connexion a la BDD.
	
	public function __construct ($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
	{
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;

	}

	//Connexion a la BDD en utilisant PDO
	private function getPDO() {
		if($this->pdo === null) { // s'assure que la BDD est pas deja connectee.
			$pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	public function query($statement)
	{
		$query = $this->getPDO()->query($statement);
		// Retourne un tableau contenant toutes les lignes du jeu d'enregistrements.
		$data = $query->fetchall(PDO::FETCH_OBJ); //retourne le jeu de résultats sous forme d'un objet dont les noms de propriétés correspondent aux noms des colonnes
		return $data; //retourne la valeur $data.

	}

	public function show($statement, $attributes)
	{
		$query = $this->getPDO()->prepare($statement);
		$query->execute($attributes);
		$data = $query->fetchall();
		return $data;
	
	}

	public function insert($statement, $attributes)
	{
		//requete preparer 
		$query = $this->getPDO()->prepare($statement);
		$query->execute($attributes);//execute la requete preparer getPDO.
		return $query;
	}

	public function max($statement)
	{
		$query = $this->getPDO()->query($statement);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;
	}

	

}

