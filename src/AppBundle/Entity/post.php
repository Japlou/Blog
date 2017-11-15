<?php

namespace Entitys;

/**
 * Une classe representent un Post.
 */

class Post {

			 private $_id, $_titre, $_auteur, $_chapo, $_contenu, $_dateCreation, $_dateModification;

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
		return $this->_id;
	}
	public function getAuteur()
	{
		return $this->_auteur;
	}
	public function getTitre()
	{
		return $this->_titre;
	}
	public function getChapo()
	{
		return $this->_chapo;
	}
	public function getContenu()
	{
		return $this->_contenu;
	}
	public function getDateModification()
	{
		return $this->_dateModification;
	}
	public function getDateCreation()
	{
		return $this->_dateCreation;
	}

	// SETTERS //
	
	public function setId($id)
	{
			$this->_id = (string) $id;		
	}

	public function setTitre($titre)
	{		
			$this->_titre = (string) $titre;	
	}

	public function setChapo($chapo)
	{
			$this->_chapo = (string) $chapo;	
	}

	public function setContenu($contenu)
	{	
			$this->_contenu = (string) $contenu;
	}

	public function setAuteur($auteur)
	{
			$this->_auteur = (string) $auteur;
	}

	public function setDateModification($dateModification)
	{
		$this->_dateModification = $dateModification;
	}

	public function setDateCreation($dateCreation)
	{
		$this->_dateCreation = $dateCreation;
	}

}