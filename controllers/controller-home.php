<?php
session_start();

// Importation des configurations et des modèles nécessaires
require_once '../config.php';
include_once '../models/Training.php';

if (!isset($_SESSION['user'])) {
    header('Location: controller-signin.php');
    exit;
}

$userId = $_SESSION['user']['user_id'];
$afficherCours = Training::DisplayReservation($userId);

if (isset($_POST['cancel']) && isset($_POST['training_id'])) {
    $trainingId = $_POST['training_id'];
    $success = Training::cancelPreReservation($userId, $trainingId);

    if ($success) {
        $_SESSION['success'] = true; // Stocker la réussite dans la session
        $confirmationMessage = "Votre pré-réservation a été annulée avec succès.";
        $afficherCours = Training::DisplayReservation($userId); // Rafraîchir les cours affichés
    } else {
        $_SESSION['success'] = false; // Stocker l'échec dans la session
        $confirmationMessage = "Erreur lors de l'annulation de la pré-réservation.";
    }
}

//afficher le nombre total de formations réservées
$displayReservedTraining = Training::countReservationTraining($userId);

// Affiche le nombre de formation validée
$countCompletedTraining = Training::countTrainingValidate($userId);

//Afficher la prochaine date de formation 

$displayUpCommingTraining = Training::displayUpcommingTraining($userId);

// Inclusion de la vue du dashboard
include_once '../views/view-home.php';
