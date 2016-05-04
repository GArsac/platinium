<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("sendmail_path","C:/wamp/www/Projet_secu/platinium/models/mail.php");

/* Fonction permetant d'envoyer un email automatique de confirmation : mail_confirmation($mail_destinataire)*/
function mail_confirmation($mail_destinataire,$rando)
{
    /*Le mail de confirmation*/

    /* Saut de ligne pendant le mail*/
    $passage_ligne = "\n";


    /*Déclaration des messages au format texte et au format HTML*/
    $message_txt = "Bonjour, vpici votre code d'adctivation : $rando";
    $message_html = "<html><head></head><body><b>Bonjour,</b> Voici votre code d'activation : $rando.</body></html>";


    /*Création de la boundary*/
    $boundary = "-----=" . md5(rand());
    $boundary_alt = "-----=" . md5(rand());


    $sujet = "Confirmation d'inscription";


    /*Création du header de l'e-mail.*/
    $header = "From: \"Platinium\"<platinium@gmailcom>" . $passage_ligne;
    $header .= "Reply-to: \"Platinium\" <platinium@gmail.com>" . $passage_ligne;
    $header .= "MIME-Version: 1.0" . $passage_ligne;
    $header .= "X-priority = 3".$passage_ligne;
    $header .= "Content-Type: multipart/mixed;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;


    /*Création du message*/
    $message = $passage_ligne . "--" . $boundary . $passage_ligne;
    $message .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary_alt\"" . $passage_ligne;
    $message .= $passage_ligne . "--" . $boundary_alt . $passage_ligne;

    /*Ajout du message au format texte*/
    $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_txt . $passage_ligne;


    $message .= $passage_ligne . "--" . $boundary_alt . $passage_ligne;

    /*Ajout du message au format HTML*/
    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_html . $passage_ligne;


    /*On ferme la boundary alternative.*/
    $message .= $passage_ligne . "--" . $boundary_alt . "--" . $passage_ligne;


    /*Envoi de l'e-mail : mail($mail,$sujet,$message,$header) */
    mail($mail_destinataire,$sujet,$message,$header);
}



/*Fonction permetant d'envoyer un email automatique de confirmation : mail_confirmation($mail_destinataire)*/
function mail_reset($mail_destinataire)
{
    /*Le mail de reset mot de passe*/

    /* Saut de ligne pendant le mail*/
    $passage_ligne = "\n";


    /*Déclaration des messages au format texte et au format HTML*/
    $message_txt = "Bonjour, voici le liens pour réinitialiser votre mot de passe pour votre accès à la plateform Platinium : Reinitialiser";
    $message_html = "<html><head></head><body><b>Bonjour,</b>Voici le liens pour réinitialiser votre mot de passe pour votre accès à la plateform Platinium : <a href='mail.php'>Reinitialiser</a>.</body></html>";


    /*Création de la boundary*/
    $boundary = "-----=" . md5(rand());
    $boundary_alt = "-----=" . md5(rand());


    $sujet = "Reinitialisation de mot de passe";


    /*Création du header de l'e-mail.*/
    $header = "From: \"Platinium\"<platinium@gmail.com>" . $passage_ligne;
    $header .= "Reply-to: \"Platinium\" <platinium@gmail.com>" . $passage_ligne;
    $header .= "MIME-Version: 1.0" . $passage_ligne;
    $header .= "X-priority = 3".$passage_ligne;
    $header .= "Content-Type: multipart/mixed;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;


    /*Création du message*/
    $message = $passage_ligne . "--" . $boundary . $passage_ligne;
    $message .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary_alt\"" . $passage_ligne;
    $message .= $passage_ligne . "--" . $boundary_alt . $passage_ligne;

    /*Ajout du message au format texte*/
    $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_txt . $passage_ligne;


    $message .= $passage_ligne . "--" . $boundary_alt . $passage_ligne;

    /*Ajout du message au format HTML*/
    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_html . $passage_ligne;


    /*On ferme la boundary alternative.*/
    $message .= $passage_ligne . "--" . $boundary_alt . "--" . $passage_ligne;


    /*Envoi de l'e-mail : mail($mail,$sujet,$message,$header) */
    mail($mail_destinataire,$sujet,$message,$header);
}



$rando = 4070;
$mail = "julien.lapa@ynov.com";
mail_confirmation($mail,$rando);
mail_reset($mail);




