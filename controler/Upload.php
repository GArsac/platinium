<?php

/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 04/05/2016
 * Time: 09:31
 **/

$_dossier = 'upload/';
$_fichier = basename($_FILES['avatar']['name']);
$_taille_maxi = 10000000;
$_taille = filesize($_FILES['avatar']['tmp_name']);
$_extensions = array('.png', '.jpg', '.jpeg', '.mp3');
$_extension = strrchr($_FILES['avatar']['name'], '.');

if(mime_content_type($_FILES['avatar']['tmp_name']) == 'image/png' || mime_content_type($_FILES['avatar']['tmp_name']) == 'image/jpeg' || mime_content_type($_FILES['avatar']['tmp_name']) == 'audio/mpeg')
{
    echo 'tout vas bien !';
}
else
{
    $_erreur = "tentative d'arnaque du systeme";
}
if(!in_array($_extension, $_extensions))
{
    $erreur = 'fichier acceptés png, jpg, jpeg, mp3';
}

if($_taille>$_taille_maxi)
{
    $_erreur = 'Le fichier est trop gros...';
}

if(!isset($erreur))
{
    $_fichier = strtr($_fichier,
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $_fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $_fichier);
    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $_dossier . $_fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
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
    echo $_erreur;
}