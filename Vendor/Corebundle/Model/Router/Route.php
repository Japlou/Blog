<?php

namespace Models\Router;

class Route
{

	private $path;// stocke le chemim de l'url
	private $callable;//@string ou fonction qui determineras quoi faire.
	private $matches;//stocke les corespondance pour les parametres.

	//Enregistrememt des parametres.

	public function __construct($path, $callable)
	{
		$this->path = trim($path, '/');
		$this->callable = $callable;
	}
	//verifie si l'itinaire corespond a un parametre.
	public function match($url)
	{
		$url = trim($url, '/');//supprime '/' au debut et a la fin avant de la stocker
		$path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);// Regarde s'il y a un parametre dans l'url et le remplace (il supprime ':')
		$regex = "#^$path$#i";//Filtre sensible a la casse
		if (!preg_match($regex, $url, $matches)) //verifi si URL correspond au filtre.
		{
			return false;//Si non renvoie false
		}
		array_shift($matches);// Supprime la première entrée du tableau afin que seules les correspondances restent au lieu d'avoir l'URL complète sur l'index 0 du tableau.
		$this->matches = $matches;// stocke les parametres
		return true; 
	}
	//Appelle des Controllers
	public function call() 
	{
		if (is_string($this->callable)) //verifie si une chaine de caratere et passer.
		{
			$params = explode('#', $this->callable);
			$controller = "Controllers\\" . $params[0] . "Controller";//Selectionne le bon controllers.
			$controller = new $controller();
			$action = $params[1] . "Action";//selectionne la bonne methode du controller.
			return call_user_func_array([$controller, $params[1] . "Action"], $this->matches);//Exécute la méthode depuis le contrôleur et donne des paramètres
		} 
		else 
		{
			throw new RouterException('ceci n/est pas une string !'); 
		}
	}

}
