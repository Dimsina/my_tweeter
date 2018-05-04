<?php

$image = basename($_POST['avatar']['name']);

$document = '/'.$dirName;
$extension = array('.png', '.jpeg', '.jpg');
$postExtension = strrchr($_POST['image']['name'],'.');

if ($extension != $postExtension)
{
	echo "Format de fichier non supporté";
	exit();
}


/*
require 'acces_BDD.php';
 
 
<?php
 
    $image = basename($_FILES['img_actualite']['name']);
    $dossier = '/images_actualite';
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['img_actualite']['name'], '.');
     
    if(!in_array($extension, $extensions))
        //Si l'extension n'est pas dans le tableau
    {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
    }
     
    //S'il n'y a pas d'erreur
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($_FILES['img_actualite']['tmp_name'], $dossier . $fichier))
            //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            //La tu insère le nom du fichier dans ta table
            $req = $bdd->prepare('INSERT INTO actualite(img_actualite) VALUES(:img_actualite)'); // Evidemment il faut mettre un WHERE .. = .. (car l'image est forcément liée à un utilisateur?)
            $req->execute(array($fichier));
            $req->closeCursor();
        }
        else
                //Sinon (la fonction renvoie FALSE.
            {
                  
                echo 'Echec de l\'upload !';
            }
    }
        else
        {
            echo $erreur;
        }
 

*/