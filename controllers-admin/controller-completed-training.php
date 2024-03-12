<?php
session_start();
require_once '../config.php';
require_once '../models/Admin.php';

if (!isset($_SESSION['admin'])) {
    header('Location: controller-signin.php');
    exit;
}

// Validation d'une formation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'], $_POST['training_id'])) {
    $userId = $_POST['user_id'];
    $trainingId = $_POST['training_id'];
    // On suppose que 'validate_training' est un champ de type checkbox, donc il sera présent dans $_POST uniquement si coché.
    $completedTraining = isset($_POST['validate_training']) ? 1 : 0;

    // Mise à jour du statut de formation
    $result = Admin::updateTrainingStatus($userId, $trainingId, $completedTraining);

    // Après traitement, redirection pour éviter la soumission multiple du formulaire
    // Vous pouvez ajouter une query string pour passer des messages ou des indicateurs de succès
    header('Location: ' . $_SERVER['PHP_SELF'] . '?success=1');
    exit;
}
// Affichage du tableau : 
// Il est important que cette partie soit exécutée après le traitement du formulaire et la redirection,
// ainsi les données affichées seront toujours à jour.
$displayAuthorizedUsers = Admin::displayAuthorizedUsers();
// var_dump($displayAuthorizedUsers);

//triage par formation : 

//Permet de stocker l'affichage par formation dans la variable $displayTrainingType
$DisplayAllTraining = Admin::displayTraining();

//Permet d'afficher tout les utilisateur qui ont reservé un cours par type 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $displayAuthorizedUsers  = Admin::TrainingSort($_POST['training_id']);
}

require_once('../views-admin/view-completed-training.php');
