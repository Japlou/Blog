<?php

namespace Models\Router;

class Router
{

	private $url;
	private $routes = [];//tableau 

	public function __construct($url)//Le contructeur prend en parametre l'Url
	{
		$this->url = $url;
	}

//Methode get 

	public function get($path, $callable)//prend en parametre le chemin (path) et l'appelable (callable).
	{
		
		$routes = new Route($path, $callable);
		$this->routes['GET'][] = $routes;
	}

//Methode post

	public function post($path, $callable)
	{
		$routes = new Route($path, $callable);
		$this->routes['POST'][] = $routes;
	}

	public function run()
	{

		if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) //si ce tableau ne contiens pas cette index "REQUEST_METHOD" on renvois une exception
		{ 
			throw new RouterException('REQUEST_METHOD does not exist'); //voir class routerException.php
		}
		foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $routes) //parcourir les routes qui corespond 
		{
			if ($routes->match($this->url)) //voir class route.php
			{
				return $routes->call();
			}
		}
		echo "Error 404";
	}
	










}