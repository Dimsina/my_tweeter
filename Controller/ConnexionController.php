<?php

require_once("Model/User.php");

// Pour vérifier que le formulaire a été envoyé entièrement
if (isset($_POST['password']) && isset($_POST['mail'])) {

	if ($_POST['password'] == '')
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
			$user->user_connection($_POST);
			$_SESSION['log'] = true;
			$user->getInfos($_POST['mail']);
			header("Location: index.php?controller=home");
		}
	}
}