<?php
require_once ('DB.php');

class ClassName extends BD{
	function printMessage($message) {
		print
		'<div class="message">'
		.	'<span class="author">'.$message->author.'</span>'
		.	'<p class="body">'.nl2br($message->body).'</p>'
		.'</div>';
// Si un message est envoyé au script PHP en post, on l'ajoute dans la base de donnée.
// On retourne simplement le html du message au client qui sera traité par le javascript
		if (isset($_POST['author']) && isset($_POST['body']) && !empty($_POST['author']) && !empty($_POST['body'])) {
			$message = new stdClass();
			$message->author = $_POST['author'];
			$message->body = $_POST['body'];
			$query = "INSERT INTO `messages` (author, body, posted) VALUES ('"
			.mysqli_real_escape_string($mysqli, $message->author)
			."', '"
			.mysqli_real_escape_string($mysqli, $message->body)
			."', ".time().")";
			mysqli_query($mysqli, $query);

			printMessage($message);
			exit;
		}
// Sinon, il s'agit uniquement d'une consultation de page, et on affiche la liste.
// Il vaut mieux séparer ces deux tâches en modifiant la cible de l'attribut action du formulaire
		else
		{
			$messages = array();
	// On boucle sur les 30 derniers messages et on les ajoute au tableau
			$result = mysqli_query($mysqli, "SELECT * FROM messages ORDER BY posted DESC LIMIT 30");
			if($result) {
				while($message = mysqli_fetch_object($result)) {
					$messages[] = $message;
				}
			}
		}
			
	}

}
?>	

