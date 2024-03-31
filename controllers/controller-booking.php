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
$mail = $_SESSION['user']['user_mail'];
$cours = Training::getAlltraining();
$confirmationMessage = '';


//  traitement de la pré-réservation
if (isset($_POST['training_id'])) {
    $trainingId = $_POST['training_id'];
    $success = Training::submitPreReservation($userId, $trainingId);


    $confirmationMessage = "Votre demande de pré-réservation a été pris en compte.";
}


require_once '../views/view-booking.php';
