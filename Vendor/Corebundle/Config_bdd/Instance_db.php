<?php

namespace Config;

class Instance_db 
{
	private $donnees = [];
	
	private static $_instance; // Contientras l'instance de la class.

   /**
    * Méthode qui crée l'unique instance de la classe
    * si elle n'existe pas encore puis la retourne.
    * @return   [<S'assure que c'est un singletron donc la class Instance_db est seulement instancié une fois>]
    */
  public static function getInstance()
   {
   	if (is_null(self::$_instance)) 
    {
   		self::$_instance = new Instance_db();
   	}
   	return self::$_instance;
   }

   /**
    * Constructeur de la classe
    * Va charge le fichier Connexion_db.php.
    */
   
  public function __construct()
   {
   	$this->donnees = require dirname(dirname(dirname(__DIR__))) . '\App\Config_db\Connexion_db.php';
   }

   //GETTER : Apporte les infos relatif au fichier Connexion_db.php.

  public function get($key)
  {
    if(!isset($this->donnees[$key]))
    {
      return null;
    }
    return $this->donnees[$key];
  } 
}