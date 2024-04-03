<?php
require_once '../config.php';
require_once '../models/Userprofil.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // je créer un tableau d'erreur vide 
    $errors = [];

    //Vérification du nom :
    if (empty($_POST["name"])) {
        $errors['name'] = "Le nom est obligatoire.";
    } else if (!preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $_POST["name"])) {
        $errors['name'] = "Le nom est invalide.";
    }

    // Vérification du prénom
    if (empty($_POST["prenom"])) {
        $errors['prenom'] = "Le prénom est obligatoire.";
        //si ça ne match pas !preg_match alors tableau d'erreur
    } else if (!preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $_POST["prenom"])) {
        $errors['prenom'] = "Le prénom est invalide.";
    }



    // Vérification de l'email
    if (empty($_POST["email"])) {
        $errors['email'] = "Champs obligatoire.";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse email est invalide.";
    } else if (Userprofil::checkMailExists($_POST['email'])) {
        $errors['email'] = 'Email déjà utilisé';
    }

    // Vérification du mot de passe
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    if (empty($password) || strlen($password) < 8 || $password !== $confirm_password) {
        $errors['password'] = "Le mot de passe doit comporter au moins 8 caractères et correspondre.";
    }


    // Vérification si la case CGU a bien été cocher 

    if (!isset($_POST["cgu"])) {
        $errors['cgu'] = "Veuillez accepter les CGU pour continuer.";
    }



    // Si aucune erreur, procéder à l'inscription
    if (empty($errors)) {
        $lastname = $_POST['name'];
        $firstname = $_POST['prenom'];
        $mail = $_POST['email'];
        $password = $_POST['password'];

        // Création de l'utilisateur
        Userprofil::create($lastname, $firstname, $mail, $password);

        // Script pour afficher le modal directement
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    var myModal = new bootstrap.Modal(document.getElementById('signupSuccessModal'), {});
                    myModal.show();
                });
              </script>";
    }
}
?>



<?php

include_once('../views/view-signin.php');


?>