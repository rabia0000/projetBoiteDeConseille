<?php
session_start();

require_once '../config.php';
require_once '../models/Userprofil.php';

$signupSuccess = isset($_SESSION['signupSuccess']) && $_SESSION['signupSuccess'];

$loginErrors = [];
$signupErrors = [];
$userEmail = ''; // Variable pour retenir l'email en cas de redirection
$formType = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['formType'])) {
    $formType = $_POST['formType']; // Récupère le type de formulaire soumis

    if ($formType == 'login') {
        if (empty($_POST["password"])) {
            $loginErrors['password'] = "Le mot de passe est obligatoire.";
        }

        if (empty($_POST["email"])) {
            $loginErrors['email'] = "L'email est obligatoire.";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $loginErrors['email'] = "L'adresse email est invalide.";
        } else {
            if (!Userprofil::checkMailExists($_POST['email'])) {
                $loginErrors['email'] = "Utilisateur inconnu ou email invalide.";
            } else {
                $utilisateurInfos = Userprofil::getInfos($_POST['email']);
                if (!password_verify($_POST["password"], $utilisateurInfos['user_password'])) {
                    $loginErrors['password'] = 'Mauvais mot de passe.';
                }
                if (empty($loginErrors)) {
                    // Si pas d'erreurs, procéder à l'authentification et la redirection
                    $_SESSION['user'] = $utilisateurInfos;
                    header('Location: controller-home.php');
                    exit;
                }
            }
        }
    } elseif ($formType == 'signup') {
        // Vérifications pour le signup...
        if (empty($_POST["name"]) || !preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $_POST["name"])) {
            $signupErrors['name'] = "Le nom est invalide ou absent.";
        }

        if (empty($_POST["prenom"]) || !preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $_POST["prenom"])) {
            $signupErrors['prenom'] = "Le prénom est invalide ou absent.";
        }

        if (empty($_POST["email"])) {
            $signupErrors['email'] = "L'email est obligatoire.";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $signupErrors['email'] = "L'adresse email est invalide.";
        } elseif (Userprofil::checkMailExists($_POST['email'])) {
            $signupErrors['email'] = 'Email déjà utilisé';
        }

        $password = $_POST["password"];
        if (empty($_POST["password"]) || strlen($_POST["password"]) < 8) {
            $signupErrors['password'] = "Le mot de passe doit comporter au moins 8 caractères.";
        } elseif ($_POST["password"] !== $_POST["confirm_password"]) {
            $signupErrors['password'] = "Les mots de passe ne correspondent pas.";
        }

        if (!isset($_POST["cgu"])) {
            $signupErrors['cgu'] = "Veuillez accepter les CGU pour continuer.";
        }


        if (empty($signupErrors)) {
            // Si pas d'erreurs, créer l'utilisateur et rediriger
            Userprofil::create($_POST['name'], $_POST['prenom'], $_POST['email'], $_POST["password"]);
            $_SESSION['signupSuccess'] = true;
            $userEmail = $_POST['email']; // Conserver l'email pour remplissage automatique après redirection
            header('Location: controller-signin.php?openLogin=true&email=' . urlencode($userEmail));
            exit;
        }
    }
}
// Nettoyage après affichage
if ($signupSuccess) {
    unset($_SESSION['signupSuccess']);
}


include_once('../views/view-signin.php');
