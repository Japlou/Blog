<?php

namespace Entitys;

/**
 * Une classe representent un Post.
 */

class Post {

	 private $id, $titre, $auteur, $chapo, $contenu, $dateCreation, $dateModification;

	/**
	 * constructeur de la classe qui assigne les donnees specifiees en parametre aux attributs correspondants.
	 * @param $data array
	 */
	public function __construct(array $data){
		$this->hydrate($data);
	}

	/**
	 * Methode assignant les valeurs specifiees aux attributs correspondant.
	 * @param $data array
	 */
	
	public function hydrate(array $data){
		foreach ($data as $key => $value){
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

	//GETTERS //
	
	public function  getid()
	{
		return $this->id;
	}
	public function getAuteur()
	{
		return $this->auteur;
	}
	public function getTitre()
	{
		return $this->titre;
	}
	public function getChapo()
	{
		return $this->chapo;
	}
	public function getContenu()
	{
		return $this->contenu;
	}
	public function getDateModification()
	{
		return $this->dateModification;
	}
	public function getDateCreation()
	{
		return $this->dateCreation;
	}

	// SETTERS //
	
	public function setId($id)
	{
			$this->id = (string) $id;		
	}

	public function setTitre($titre)
	{		
			$this->titre = (string) $titre;	
	}

	public function setChapo($chapo)
	{
			$this->chapo = (string) $chapo;	
	}

	public function setContenu($contenu)
	{	
			$this->contenu = (string) $contenu;
	}

	public function setAuteur($auteur)
	{
			$this->auteur = (string) $auteur;
	}

	public function setDateModification($dateModification)
	{
		$this->dateModification = $dateModification;
	}

	public function setDateCreation($dateCreation)
	{
		$this->dateCreation = $dateCreation;
	}

}