<?php


//models 

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

    var_dump($errors);

    if (empty($errors)) {

        $lastname = $_POST['name'];
        $firstname = $_POST['prenom'];
        $mail = $_POST['email'];
        $password = $_POST['password'];


        Userprofil::create($lastname, $firstname, $mail, $password);
    }
}


// // La réponse du CAPTCHA
// $captcha_response = $_POST['g-recaptcha-response'];

// // Vérifiez la réponse du CAPTCHA en utilisant l'API de Google
// $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=votre_clé_secrète&response=" . $captcha_response);
// $response_keys = json_decode($response, true);
// if (empty($_POST['g-recaptcha-response'])) {
//     $errors['g-recaptcha-response'] = "Cochez je ne suis pas un robot";
// } else if ($response_keys["success"]) {
//     // Le CAPTCHA est valide. Traitez le formulaire.
// }
// verification s'il n'y pas d'erreur, nous allons inscrire l'utilisateur
// var_dump($errors);



?>

<?php
// Contrôleur - Gestion de la logique métier

// Vérifications et traitements du formulaire ici

// Inclusion de la vue

include_once('../views/view-signin.php');


?>
