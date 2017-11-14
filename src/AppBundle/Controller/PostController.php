<?php

//Class enfant de controller va charger les infos du controller.php

namespace Controllers;

use Models\Controller;
use Entitys\Post;

class PostController extends Controller
{

	public function createAction()
	{
		if (!isset($_POST['titre']) &&  !isset($_POST['chapo']) && !isset($_POST['auteur']) && !isset($_POST['contenu'])) 
		{
			echo $this->twig->render('create.html');
		} else { // recuperation des infomations relatif a la function insert du fichier Database.php.
			$query = $this->db->insert('INSERT INTO post (titre, auteur, chapo, contenu, dateCreation, dateModification) VALUES (:titre, :auteur, :chapo, :contenu, now(), now())',
			[ // parametre $_POST.
				'titre' => $_POST['titre'],
				'auteur' => $_POST['auteur'],
				'chapo' => $_POST['chapo'],
				'contenu' => $_POST['contenu']

			]);
			$id = $this->db->max('SELECT MAX(id) FROM post');
			$this->showAction($id['MAX(id)']);


		}
	}
	//Message envoye lors de la suppretion d'un post.
	
	/*public function deleteAction($id)
	{
	
		if (!isset($_GET['delete'])) {
			if ($_GET['delete']) === 'yes') {
				$this->db->delete(
					[
						'id' => $id

					]);
				header('../posts/list');
			}
		}
		$query = $this->db->show(
			[
				'id' => $id
			]);
        $post= new Post($query[0]);
        echo $this->twig->render('post/delete.html',
            [
                "id" => $post->getid(),
                "titre" => $post->getTitre(),
                "chapo" => $post->getChapo(),
                "auteur" => $post->getAuteur(),
                "dateCreation" => $post->getDateCreation(),
                "dateModification" => $post->getDateModification(),
                "contenu" => $post->getContenu()
            ]
        );
	}*/

	public function listAction()
	{
		$list = $this->db->query('SELECT id, titre, chapo, auteur, DATE_FORMAT(dateCreation, \'%d/%m/%Y a %Hh%i\') AS dateCreation, DATE_FORMAT(dateModification, \'%d/%m/%Y a %Hh%i\') AS dateModification, contenu FROM post ORDER BY id DESC');
		echo $this->twig->render('listPost.html',
			[
				"list" => $list
			]

		);

	}

	public function showAction($id)
	{
		$query = $this->db->show('SELECT id, titre, chapo, auteur, DATE_FORMAT(dateCreation, \'%d/%m/%Y a %Hh%i\') AS dateCreation, DATE_FORMAT(dateModification, \'%d/%m/%Y a %Hh%i\') AS dateModification, contenu FROM post WHERE id = :id',

			[
				'id' => $id
			]);
		$post= new Post($query[0]);
        echo $this->twig->render('show.html',
            [
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

	public function updateAction($id)
	{
		echo "Vous êtes sur le point de faire une mise a jours du post " . $id;
	}

}