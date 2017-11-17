<?php

require '../Vendor/autoload.php';

$router = new Models\Router\Router($_GET['url']);

/**
 * Routage de la page d'Acceuil (index.html) qui correspons a la class 'IndexController'.
 */

$router->get('/', 'Index#Index');
$router->get('/home', 'Index#Index');

/**
 * Routage de la page creation d'un post (creat.html) qui correspons a la class 'PostController'.
 */

$router->get('/posts/create', 'Post#Create');
$router->post('/posts/create', 'Post#Create');

 /**
  * Chargememt de la fonction delete de la class PostController qui prend en parametre id-delet, se qui correspont a supprimer l'article avec son identifiant (ID).
 */

$router->get('/posts/delete-:id', "Post#Delete");

/**
 * Chargememt de la fonction 'list' de la class PostController, se qui correspont a afficher tout les articles de la BDD.
 */

$router->get('/posts', "Post#List");

/**
 * Chargememt de la fonction 'show' de la class PostController qui prend en parametre id-show, se qui correspont a afficher un article avec son identifiant (ID).
 */

$router->get('/posts/show-:id', 'Post#Show');

/**
 * Chargement de la fonction 'update' de la class postController, qui prend en parametre update-:id, se qui correspont a mettre a jours l'article avec son identifiant (ID).
 */

$router->get('/posts/update-:id', "Post#Update");
$router->post('/posts/update-:id', "Post#Update");

/**
 * Routage de la section Contact de la page d'accueil.
 */


$router->run();