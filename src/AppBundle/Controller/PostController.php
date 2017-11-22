<?php

//Class enfant de controller va charger les infos du controller.php

namespace Controllers;

use Models\Controller;
use Entitys\Post;

class PostController extends Controller
{
	//Methode de la fonction cree un post

	public function createAction()
	{
		if (!isset($_POST['titre']) &&  !isset($_POST['chapo']) && !isset($_POST['auteur']) && !isset($_POST['contenu'])) 
		{
			echo $this->twig->render('create.html');
		} else { 
			$query = $this->db->insert(// recuperation des infomations relatif a la function insert du fichier Database.php.
			[ // parametre $_POST.
				'titre' => $_POST['titre'],
				'auteur' => $_POST['auteur'],
				'chapo' => $_POST['chapo'],
				'contenu' => $_POST['contenu']

			]);
			$id = $this->db->max();
			$this->showAction($id['MAX(id)']);
		}
	}
	//Methode de la fonction Delete.
	
	public function deleteAction($id)
	{
		if (isset($_GET['delete'])) {
			if ($_GET['delete'] === 'yes') {
				$this->db->delete(// recuperation les infomations relatif a la function delete du fichier Database.php.
					[
						'id' => $id 

					]);
				header('Location:../posts');
			}
		}
		$query = $this->db->show(
			[
				'id' => $id 
			]);
        $post= new Post($query[0]);
        echo $this->twig->render('delete.html',
            [
            	//Va charger les fonctions get de la class Post.php
                "id" => $post->getid(),
                "titre" => $post->getTitre(),
                "chapo" => $post->getChapo(),
                "auteur" => $post->getAuteur(),
                "contenu" => $post->getContenu()
            ]
        );
	}

	//Methode de la fonction list des posts
	
	public function listAction()
	{
		$list = $this->db->select();// recuperation les infomations relatif a la function Select du fichier Database.php.
		echo $this->twig->render('listPost.html',
			[
				"list" => $list
			]
		);
	}
	//Methode de la fonction Post
	
	public function showAction($id)
	{
		$query = $this->db->show(// recuperation les infomations relatif a la function Show du fichier Database.php.
			[
				'id' => $id 
			]);
		$post= new Post($query[0]);
        echo $this->twig->render('show.html',
            [
            	//Va charger les fonctions get de la class Post.php
                "id" => $post->getid(),
                "titre" => $post->getTitre(),
                "chapo" => $post->getChapo(),
                "auteur" => $post->getAuteur(),
                "dateCreation" => $post->getDateCreation(),
                "dateModification" => $post->getDateModification(),
                "contenu" => $post->getContenu()
            ]
        );
	}

	//Methode de la fonction update du post
	
	public function updateAction($id)
	{
		if (!isset($_POST['titre']) && !isset($_POST['chapo']) && !isset($_POST['auteur']) && !isset($_POST['contenu']))
		{
			$query = $this->db->show(// recuperation les infomations relatif a la function Show du fichier Database.php.
			[
				'id' => $id //recupere l'identifiant du Post
			]);
		$post= new Post($query[0]);
        echo $this->twig->render('modifPost.html',
            [
            	//Va charger les fonctions get de la class Post.php
                "id" => $post->getid(),
                "titre" => $post->getTitre(),
                "chapo" => $post->getChapo(),
                "auteur" => $post->getAuteur(),
                "dateCreation" => $post->getDateCreation(),
                "dateModification" => $post->getDateModification(),
                "contenu" => $post->getContenu()
            ]
        );

		}else {

			$query = $this->db->update(// recuperation les infomations relatif a la function Update du fichier Database.php.
			[ // parametre $_POST.
				'id' => $id,
				'titre' => $_POST['titre'],
				'auteur' => $_POST['auteur'],
				'chapo' => $_POST['chapo'],
				'contenu' => $_POST['contenu']

			]);
			$this->showAction($id);
		}	
	}

}