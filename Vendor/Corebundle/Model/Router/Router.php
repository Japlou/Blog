<?php

namespace Models\Router;

class Router
{

	private $url;
	private $routes = [];

	public function __construct($url)
	{
		$this->url = $url;
	}

	public function get($path, $callable)
	{
		$routes = new Route($path, $callable);
		$this->routes['GET'][] = $routes;
	}

	public function post($path, $callable)
	{
		$routes = new Route($path, $callable);
		$this->routes['POST'][] = $routes;
	}

	public function run()
	{

		if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) 
		{ 
			throw new RouterException('REQUEST_METHOD does not exist'); 
		}
		foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $routes)
		{
			if ($routes->match($this->url)) 
			{
				return $routes->call();
			}
		}
		//echo "Error 404";
	}
	










}