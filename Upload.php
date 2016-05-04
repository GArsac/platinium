<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 04/05/2016
 * Time: 09:31
 */

$dossier = 'upload/';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 10000000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.jpg', '.jpeg', '.mp3');
$extension = strrchr($_FILES['avatar']['name'], '.');

//Début des vérifications de sécurité...
if(mime_content_type($_FILES['avatar']['tmp_name']) == 'image/png' || mime_content_type($_FILES['avatar']['tmp_name']) == 'image/jpeg' || mime_content_type($_FILES['avatar']['tmp_name']) == 'audio/mpeg')
{
    echo 'tout vas bien !';
}
else
{
    $erreur = "tentative d'arnaque du systeme";
}

if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, mp4, avi';
}

if($taille>$taille_maxi)
{
    $erreur = 'Le fichier est trop gros...';
}

if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
    //On formate le nom du fichier ici...
    $fichier = strtr($fichier,
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
        echo 'Upload effectué avec succès !';
    }
    else //Sinon (la fonction renvoie FALSE).
    {
        echo 'Echec de l\'upload !';
    }
}
else
{
    echo $erreur;
}