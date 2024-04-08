<?php
session_start();

// Importation des configurations et des modèles nécessaires
require_once '../config.php';
include_once '../models/Training.php';

// Redirection si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user'])) {
    header('Location: controller-signin.php');
    exit;
}

$userId = $_SESSION['user']['user_id'];

//afficher les formations validées : 
$displayCompletedTraining = Training::displayTrainingValidate($userId);



include_once '../views/view-completed.php';
