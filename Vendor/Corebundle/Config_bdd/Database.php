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

	//List de tout les Posts

	public function select()
	{
		$query = $this->getPDO()->query('SELECT id, titre, chapo, auteur, DATE_FORMAT(dateCreation, \'%d/%m/%Y a %Hh%i\') AS dateCreation, DATE_FORMAT(dateModification, \'%d/%m/%Y a %Hh%i\') AS dateModification, contenu FROM post ORDER BY id DESC');
		// Retourne un tableau contenant toutes les lignes du jeu d'enregistrements.
		$data = $query->fetchall(PDO::FETCH_OBJ); //retourne le jeu de résultats sous forme d'un objet dont les noms de propriétés correspondent aux noms des colonnes
		return $data; //retourne la valeur $data.
	}

	//Affiche un post specifique en fonction de son identifiant (id)

	public function show($attributes)
	{
		$query = $this->getPDO()->prepare('SELECT id, titre, chapo, auteur, DATE_FORMAT(dateCreation, \'%d/%m/%Y a %Hh%i\') AS dateCreation, DATE_FORMAT(dateModification, \'%d/%m/%Y a %Hh%i\') AS dateModification, contenu FROM post WHERE id = :id');
		$query->execute($attributes);
		$data = $query->fetchall();
		return $data;
	}

	//Insert le Post dans la BDD

	public function insert($attributes)
	{
		//requete preparer 
		$query = $this->getPDO()->prepare('INSERT INTO post (titre, auteur, chapo, contenu, dateCreation, dateModification) VALUES (:titre, :auteur, :chapo, :contenu, now(), now())');
		$query->execute($attributes);//execute la requete preparer getPDO.
		return $query;
	}

	//mettre a jour un post en fonction de son identifiant (ID).
	
	public function update($attributes)
	{
		$query = $this->getPDO()->prepare('UPDATE post SET titre = :titre, auteur = :auteur, chapo = :chapo, dateModification = now(), contenu = :contenu WHERE id = :id');
		$query->execute($attributes);
		return $query;
	}

	//Recupere le dernier identifiant de la table.
		
	public function max()
	{
		$query = $this->getPDO()->query('SELECT MAX(id) FROM post');
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;
	}

	// Supprime un Post de la BDD en fonction de son ID
	
	public function delete($attributes)
	{
		$query = $this->getPDO()->prepare('DELETE FROM post WHERE id = :id');
		$query->execute($attributes);
		return $query;
		
	}
}

