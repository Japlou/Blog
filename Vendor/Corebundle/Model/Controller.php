<?php

//Class parentes des controllers

namespace Models;

class Controller
{

	protected $db;
	protected $param_db;
	protected $twig;

	public function __construct()
	{
		// Twig Configuration :
		$className = substr(get_class($this), 12, -10);
      	$loader = new \Twig_Loader_Filesystem('../App/Resources/Views/Templates/' . strtolower($className));
      	$this->twig = new \Twig_Environment($loader, array('cache' => false,));

      	//Charge la Configuration des parametre de l'instance DB
      	
      	$param_db = \Config\Instance_db::getInstance(); //va chercher les parametre dans le fichier instance_db.php

      	/*
      	* @param_db->get dans le fichier database.php les parametres (db_name, db_user, db_pass et db_host)
      	* 
      	 */

      	$this->db = new \Config\Database($param_db->get('db_name'), $param_db->get('db_user'), $param_db->get('db_pass'), $param_db->get('db_host'));
    }
      	
}
