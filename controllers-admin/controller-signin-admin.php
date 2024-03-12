<?php
session_start();
// var_dump($_SESSION);

require_once '../config.php';
require_once '../models/Admin.php';

$errors = []; // Définir $errors en dehors du bloc POST pour y avoir accès partout

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification du mot de passe
    if (empty($_POST["password"]) || strlen($_POST["password"]) < 8) {
        $errors['password'] = "Le mot de passe doit comporter au moins 8 caractères";
    }

    if (empty($_POST["email"])) {
        $errors['email'] = "Champs obligatoire.";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse email est invalide.";
    }

    // Vérifiez si $errors est vide AVANT de continuer
    if (empty($errors)) {
        $email = $_POST['email']; // On peut directement utiliser $_POST['email'] car on a déjà vérifié qu'il n'est pas vide
        if (!Admin::checkMailExistsAdmin($email)) {
            $errors['email'] = "utilisateur inconnu";
        } else {
            $utilisateurInfos = Admin::getInfosAdmin($email);
            if (password_verify($_POST["password"], $utilisateurInfos['admin_password'])) {
                $_SESSION['admin'] = $utilisateurInfos;
                header('Location: controller-home-admin.php');
                exit; // Important d'ajouter exit après une redirection
            } else {
                $errors['connexion'] = 'Mauvais mots de passe';
            }
        }
    }
}

include_once('../views-admin/view-signin-admin.php');
