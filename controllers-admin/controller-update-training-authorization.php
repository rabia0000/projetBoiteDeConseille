<?php
// Démarrage de la session
session_start();

// Inclusion des fichiers de configuration et de modèle nécessaires
require_once '../config.php'; // Ajustez le chemin selon votre structure de fichiers
require_once '../models/Admin.php'; // Ajustez le chemin selon votre structure de fichiers

// Vérification de l'authentification de l'administrateur
if (!isset($_SESSION['admin'])) {
    // Si l'administrateur n'est pas connecté, renvoie une erreur
    header('Content-Type: application/json');
    echo json_encode(['error' => true, 'message' => 'Accès non autorisé.']);
    exit;
}

// Définition du type de contenu attendu dans la réponse
header('Content-Type: application/json');

try {
    // Récupération des données envoyées par la méthode POST
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;
    $trainingId = isset($_POST['training_id']) ? $_POST['training_id'] : null;
    $authorizedTraining = isset($_POST['authorized_training']) ? $_POST['authorized_training'] : null;


    //  la classe Admin a une méthode statique pour mettre à jour l'autorisation de formation
    $result = Admin::updateTrainingAuthorization($userId, $trainingId, $authorizedTraining);

    // Vérification du résultat de la mise à jour
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Mise à jour réussie.']);
    } else {
        throw new Exception("Échec de la mise à jour de l'autorisation.");
    }
} catch (Exception $e) {
    // Gestion des exceptions et envoi d'une réponse d'erreur
    echo json_encode(['error' => true, 'message' => $e->getMessage()]);
    exit;
}
