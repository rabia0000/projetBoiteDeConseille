<?php
session_start();
require_once '../config.php';
require_once '../models/Admin.php';
require_once '../models/Training.php';
// var_dump($_POST);
$trainingt = Training::getAllTypetraining();
$errorMessage = '';
$trainingInfos = Training::getCoursById($_POST['training_id']);
// var_dump($trainingInfos);



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['update'])) {
        // Récupération des données soumises avec validation
        $trainingId = $_POST['training_id'] ?? null;
        $trainingName = $_POST['training_name'] ?? '';
        $trainingUrl = $_POST['training_url'] ?? '';
        $trainingDescription = $_POST['training_description'] ?? '';
        $trainingDate = $_POST['training_date'] ?? '';
        $trainingMax = $_POST['training_max'] ?? 0;
        $trainingArchived = isset($_POST['training_archived']) ? (bool)$_POST['training_archived'] : false;

        // Convertir $trainingType en entier, avec une valeur par défaut si null ou non défini
        $trainingType = isset($_POST['training_type']) ? intval($_POST['training_type']) : 0; // Assurez-vous que 0 est une valeur par défaut logique dans votre contexte
        // var_dump($trainingId);
        // Si les données sont valides, procéder à la mise à jour
        if ($trainingId !== null && is_numeric($trainingId)) {
            try {
                echo "ok";
                Admin::updateTraining($trainingId, $trainingName, $trainingUrl, $trainingDescription, $trainingDate, $trainingMax, $trainingArchived, $trainingType);

                header('location: controller-home-admin.php');
            } catch (Exception $e) {
                $errorMessage = "Erreur lors de la mise à jour de la formation : " . $e->getMessage();
            }
        } else {
            $errorMessage = "L'ID de formation est invalide.";
        }
    }
}

include_once('../views-admin/view-update-training.php');
