<?php

//Class enfant de controller va charger les infos du controller.php.

namespace Controllers;

use Models\Controller;

class IndexController extends Controller
{

	public function IndexAction(){

		 echo $this->twig->render('index.html');
	}


	public function ContactAction(){

		require '../Src/AppBundle/Form/Contact.php';

		 echo $this->twig->render('contact.html');
	}

}
