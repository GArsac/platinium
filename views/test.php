<?php

# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
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

# Instantiate the client.
$mgClient = new Mailgun('key-c5817cae6b6a9bd7154788d5c2222cef');
$domain = "sandboxebc36bb345f9422b8c5b1310d0119cae.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
    array('from'    => 'Mailgun Sandbox <postmaster@sandboxebc36bb345f9422b8c5b1310d0119cae.mailgun.org>',
        'to'      => 'Moustanir <moustanir.souleali@gmail.com>',
        'subject' => 'Hello Moustanir',
        'text'    => 'Congratulations Moustanir, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));


if ($result->enabled == 1) {
    session_start();
    if ($result->statut == 'admin') {
        $user = new Admin();
        $_SESSION['email'] =  $user->setMail($mail);
        $_SESSION['prenom'] = $user->setPrenom($result->prenom);
        $_SESSION['nom'] = $user->setNom($result->nom);
        $_SESSION['statut'] = $user->setStatut($result->statut);
    }
    echo $_SESSION['statut'];
}elseif ($result->enabled == 0) {
    echo 'Vous n\'êtes pas autorisé à accéder au service';
}
/*Fonction générant des clés aléatoires*/
