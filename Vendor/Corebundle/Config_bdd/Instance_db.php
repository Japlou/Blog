<?php

namespace Config;

class Instance_db 
{
	private $donnees = [];
	/**
   * @var Singleton
   * @access private
   * @static
   */
	private static $_instance; // Contientras l'instance de la class.

   /**
    * Méthode qui crée l'unique instance de la classe
    * si elle n'existe pas encore puis la retourne.
    * @param void la fonction getInstance n'accepte aucun parametre 
    * @return Singleton
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