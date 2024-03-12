<?php
//models 
// var_dump($_POST);
require_once '../config.php';
require_once '../models/Admin.php';
$showform = true;

// permet de lancer controle au submit du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // je créer un tableau d'erreur vide 
    $errors = [];



    // Vérification de l'email
    if (empty($_POST["email"])) {
        $errors['email'] = "Champs obligatoire.";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse email est invalide.";
    } else if (Admin::checkMailExistsAdmin($_POST['email'])) {
        $errors['email'] = 'Email déjà utilisé';
    }



    // Vérification du mot de passe
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    if (empty($password) || strlen($password) < 8 || $password !== $confirm_password) {
        $errors['password'] = "Le mot de passe doit comporter au moins 8 caractères et correspondre.";
    }

    //verification du l'existance de l'enterprise  


    // verification s'il n'y pas d'erreur, nous allons inscrire l'utilisateur
    // var_dump($errors);
    if (empty($errors)) {

        $email = $_POST['email'];

        $password = $_POST['password'];
        Admin::create($email, $password);
        $showform = false;
    }
}




?>
<?php
// Contrôleur - Gestion de la logique métier

// Vérifications et traitements du formulaire ici

// Inclusion de la vue

include_once('../views-admin/view-signup-admin.php');


?>