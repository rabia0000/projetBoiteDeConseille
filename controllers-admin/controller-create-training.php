<?php
session_start();
// Assurez-vous d'inclure le fichier où la classe Training est définie
require_once '../config.php';
require_once '../models/Training.php';

// Récupérer tous les types de formation
$trainingOfType = Training::getAllTypetraining();

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $trainingName = $_POST['trainingName'];
    $trainingUrl = $_POST['trainingUrl'];
    $trainingDescription = $_POST['trainingDescription'];
    $trainingDate = $_POST['trainingDate'];
    // Convertir trainingMax en entier
    $trainingMax = intval($_POST['trainingMax']);
    $trainingArchived = isset($_POST['trainingArchived']) ? (bool)$_POST['trainingArchived'] : null;
    $trainingType = $_POST['trainingType'];

    // Vérifier si trainingMax est numérique et positif
    if (!is_numeric($_POST['trainingMax']) || $trainingMax <= 0) {
        echo "Veuillez entrer un nombre positif pour le nombre maximal de participants.";
    } elseif ($trainingName && $trainingUrl && $trainingDescription && $trainingDate && isset($trainingArchived) && ($trainingType)) {
        // Si toutes les données sont valides, y compris trainingMax positif
        try {
            // Appeler la méthode static create de la classe Training
            Training::create($trainingName, $trainingUrl, $trainingDescription, $trainingDate, $trainingMax, $trainingArchived, $trainingType);
            // Afficher un message de confirmation
            echo "Cours ajouté avec succès.";
        } catch (Exception $e) {
            // Gestion des erreurs
            echo "Erreur lors de l'ajout du cours : " . $e->getMessage();
        }
    } else {
        // Si des données obligatoires sont manquantes ou invalides
        echo "Veuillez remplir correctement tous les champs du formulaire.";
    }

    // Après que le cours a été ajouté avec succès
    $_SESSION['ajoutReussi'] = true;
}


// Inclure la vue pour la création de formation
include_once('../views-admin/view-create-training.php');
