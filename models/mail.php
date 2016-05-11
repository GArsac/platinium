<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

# Include the Autoloader
require '../mailgun-php/vendor/autoload.php';
use Mailgun\Mailgun;

/*fonction générant des clés aléatoires*/
function randomKey ()
{
    for ($i=0;$i<7;$i++)
    {
        $nbr = rand(0,1);

        if($nbr = 1)
        {
            $nbr = rand(65,90);
            $key[$i] = chr($nbr);
        }

        if($nbr = 0)
        {
            $key[$i] = rand(0,9);
        }
    }
    $key = $key[0].$key[1].$key[2].$key[3].$key[4].$key[5].$key[6];
    return $key;
}

/* Fonction permetant d'envoyer un email automatique de confirmation : mail_confirmation($mail_destinataire, $rando)*/
function mail_confirmation($mail_destinataire,$rando)
{
    # Instantiate the client.
    $mgClient = new Mailgun('key-fa3b9e1fd2e1960d0a2dcd692da25dfe');
    $domain = "sandbox7f620232dabc4da0b0bf9d7bee0a2e10.mailgun.org";

    #Envoie de message
    $result = $mgClient->sendMessage("$domain",
    array('from'    => 'Platinium <julien@sandbox7f620232dabc4da0b0bf9d7bee0a2e10.mailgun.org>',
        'to'      => "$mail_destinataire <$mail_destinataire>",
        'subject' => 'Confirmation d\'inscription',
        'text'    => "Bonjour,
        
    Bienvenue sur la plateforme Platinum. Voici votre clé d'activation : $rando"));
}



/*Fonction permetant d'envoyer un email automatique de confirmation : mail_confirmation($mail_destinataire, $rando)*/
function mail_reset($mail_destinataire,$rando)
{
    # Instantiate the client.
    $mgClient = new Mailgun('key-fa3b9e1fd2e1960d0a2dcd692da25dfe');
    $domain = "sandbox7f620232dabc4da0b0bf9d7bee0a2e10.mailgun.org";

    # Envoie du message
    $result = $mgClient->sendMessage("$domain",
    array('from'    => 'Platinuim <julien@sandbox7f620232dabc4da0b0bf9d7bee0a2e10.mailgun.org>',
        'to'      => "$mail_destinataire <$mail_destinataire>",
        'subject' => 'Réintialisation de mot de passe',
        'text'    => "Bonjour,
        
    Voici votre clé pour réinitialiser votre mot de passe : $rando"));
}


/*Fonction permetant d'avertir qu'un message a été posté par rapport a un article : mail_article($mail_destinataire, $nom_article)*/
function mail_article($mail_destinataire,$nom_article, $texte )
{
    # Instantiate the client.
    $mgClient = new Mailgun('key-fa3b9e1fd2e1960d0a2dcd692da25dfe');
    $domain = "sandbox7f620232dabc4da0b0bf9d7bee0a2e10.mailgun.org";

    # Envoie du message
    $result = $mgClient->sendMessage("$domain",
        array('from'    => 'Platinuim <julien@sandbox7f620232dabc4da0b0bf9d7bee0a2e10.mailgun.org>',
            'to'      => "$mail_destinataire <$mail_destinataire>",
            'subject' => "Votre article $nom_article a reçu un message",
            'text'    => "$texte"));
}

