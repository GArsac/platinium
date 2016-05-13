<?php

class Humans
{

    static function randomKey ()
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

    public static function signIn($mail, $mdp, $db)
    {
        $mdp = $mdp . crypt($mdp, CRYPT_BLOWFISH);
        $mdp = hash('md5', $mdp);
        if (!empty($mail) && !empty($mdp)) {
            $result = Database::checkExistence($mail, $mdp, $db);
            if ($result == 1) {
                $result = Database::connexion($mail, $mdp, $db);
                if ($result->enabled == 1) {

                    $_SESSION['user'] = Human::findByCrendential($mail, $mdp, $db);
                   header('Location:../views/pages/home.php');
                } elseif ($result->enabled == 0) {
                    header('Location:../views/pages/checKey.php');
                }
            } elseif ($result == 0) {
                echo 'Erreur dans la connexion:Le mot de passe ou le login est incorrect.';
            }
        } else {
            echo 'Champs requis non rempli';
        }

    }

    public static function signUp($mail, $mdp, $confmdp, $nom, $prenom, $db)
    {
        /*On prépare la requête*/
        $date = date("d-m-Y");
        $statut = 'user';
        $confmdp = $confmdp . crypt($confmdp, CRYPT_BLOWFISH);
        $confmdp = hash('md5', $confmdp);
        $mdp = $mdp . crypt($mdp, CRYPT_BLOWFISH);
        $mdp = hash('md5', $mdp);
        if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mdp) && !empty($confmdp)) {
            /*Vérification du mail:*/
            $confmail = "@ynov.com";
            $piece = substr($mail, -9);
            /*On vérifie que l'email entré finit bien par @ynov.com*/
            if ($piece != $confmail) {
                echo '<div class="center">Echec de l\'inscription: Vous n\'avez pas entré un mail finissant par @ynov.com</div>';
                echo '<br>';
                header('../views/pages/signUp.php');
                return false;
            }
            /* On vérifie si il n'existe pas d'utilisateur possédant le même mail*/
            $result = Database::checkSignUp($mail, $db);
            if ($result == 1) {
                echo '<div class="center">Il existe déjà un utilisateur ayant cet email dans notre base de données</div>';
                echo '<br>';
                header('../views/pages/signUp.php');
            }
            if ($result == 0) {
                /*Vérifie si les champs confirmation mot de passe et mot de passe sont identiques*/
                if ($confmdp == $mdp) {
                    $key = self::randomKey();
                    /*On insère les valeurs dans la bdd*/
                    Database::signUp($db, $mail, $nom, $prenom, $mdp, $date, $statut,$key);
                    echo '<div class="center">Inscription réussite</div>';

                    header('../views/index.php');
                } else {
                    echo '<div class="center">Echec de l\'inscription:les champs Mot de passe et Confirmation mot de passe ne sont pas les mêmes.</div>';
                    echo '<br>';
                    header('../views/pages/signUp.php');
                }
            }
        } else {
            echo '<div class="center">Echec de l\'inscription: vous avez omis un ou plusieurs champs.</div>';
            echo '<br>';
            header('../views/pages/signUp.php');
        }
    }
}