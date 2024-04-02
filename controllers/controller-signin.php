<?php
session_start();
// var_dump($_SESSION);


require_once '../config.php';
require_once '../models/userprofil.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Vérification du mot de passe de la page login


    if (empty($_POST["password"]) || strlen($_POST["password"]) < 8) {
        $errors['password'] = "Le mot de passe doit comporter au moins 8 caractères";
    }

    if (empty($_POST["email"])) {
        $errors['email'] = "Champs obligatoire.";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse email est invalide.";
    }


    if (empty($errors)) {

        if (!Userprofil::checkMailExists($_POST['email'])) {
            $errors['email'] = "utilisateur inconnu";
        } else {
            //je recupère toutes les infos via la méthode getInfos()
            $utilisateurInfos = Userprofil::getInfos($_POST['email']);
            // Utilisation de password_verify pour le mdp
            if (password_verify($_POST["password"], $utilisateurInfos['user_password'])) {
                //ajout de la super global $_SESSION
                $_SESSION['user'] = $utilisateurInfos;

                header('Location: controller-home.php');
            } else {
                $errors['password'] = 'Mauvais mots de passe';
            }
        }
    }
}



// var_dump($_POST);





// 1. Rechercher si mail present ds la bdd
// Première étape : à l'aide de PDO faire un select avec un WHERE mail = mail de l'input
// 2. **Si Oui** : récupérer les infos dont le mdp, pour pouvoir comparer  
// - si mdp de passe **Oui**, identification ok  
// - si mdp de passe **Non** : "*Erreur dans le mdp*"
// 3. **Si Non** : "*Identifiant incorrect*"





?>




<?php
include_once('../views/view-signin.php');
?>