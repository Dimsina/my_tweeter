<?php

require_once("Model/User.php");

$errors = array();

// Pour vérifier que le formulaire a été envoyé entièrement
if (isset($_POST['fullName'])
 && isset($_POST['displayName'])
 && isset($_POST['password'])
 && isset($_POST['mail'])) {
	
	if ($_POST['fullName'] == '' || !preg_match('/^[âäéèëêïîôöùüû\w-\s]+$/', $_POST['fullName']))
	{
		$errors['fullName'] = "Nom complet requis";
		echo "Nom complet requis";
		exit();
	}
	elseif ($_POST['displayName'] == '' || !preg_match('/^[\w-]+$/', $_POST['displayName']))
	{
		$errors['displayName'] = "Choisissez un pseudo";
		echo "Il vous faut choisir un pseudo.";
		exit();
	}

	elseif ($_POST['password'] == '')
	{
		$errors['password'] = "Aucun mot de passe";
		echo "Il manque le mot de passe";
		exit();
	}
	elseif ($_POST['mail'] == '')
	{
		$errors['mail'] = "Aucun email";
		echo "Il manque l'email";
		exit();	
	}

	else
	{
		if (isset($_POST))
		{
			if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
			{
				echo "Email incorrect!";
				exit();
			}
			$user = new User();
			$user->add_user($_POST);
			$_SESSION['log'] = true;
			$user->getInfos($_POST['mail']);
			header("Location: index.php?controller=home");
		}
		if (isset($_POST['logout'])) {
			session_unset();
			session_destroy();
			// header('Location: index.php?controller=connexion');
		}
	}
}