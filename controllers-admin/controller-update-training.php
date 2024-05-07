<?php
session_start();
require_once '../config.php';
require_once '../models/Admin.php';
require_once '../models/Training.php';
// var_dump($_POST);
$trainingt = Training::getAllTypetraining();
$errorMessage = '';





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trainingInfos = Training::getCoursById($_POST['training_id']);


    if (isset($_POST['update'])) {
        // Récupération des données soumises avec validation
        $trainingId = $_POST['training_id'] ?? null;
        $trainingName = $_POST['training_name'] ?? '';
        $trainingUrl = $_POST['training_url'] ?? '';
        $trainingDescription = $_POST['training_description'] ?? '';
        $trainingDate = $_POST['training_date'] ?? '';
        $trainingMax = $_POST['training_max'] ?? 0;
        $trainingArchived = isset($_POST['training_archived']) ? (bool)$_POST['training_archived'] : false;
        $trainingType = ($_POST['training_type']);

        // var_dump($trainingId);
        // Si les données sont valides, procéder à la mise à jour
        if ($trainingId !== null && is_numeric($trainingId)) {
            try {
                echo "ok";
                Admin::updateTraining($trainingId, $trainingName, $trainingUrl, $trainingDescription, $trainingDate, $trainingMax, $trainingArchived, $trainingType);
                $_SESSION['ajoutReussi'] = true;
                header('location: controller-update-training.php');
                exit;
            } catch (Exception $e) {
                $errorMessage = "Erreur lors de la mise à jour de la formation : " . $e->getMessage();
            }
        }
    }
}

include_once('../views-admin/view-update.php');
