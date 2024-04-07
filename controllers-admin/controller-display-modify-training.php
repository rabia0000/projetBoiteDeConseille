<?php
session_start();

// Importation des configurations et des modèles nécessaires
require_once '../config.php';
include_once '../models/Admin.php';
include_once '../models/Training.php';


if (!isset($_SESSION['admin'])) {
    header('Location: controller-signin.php');
    exit;
}


$afficherCours = Admin::DisplayTraining();

if (isset($_POST['delete'])) {
    Admin::deleteTraining($_POST['trainingId']);


    header('Location: controller-display-modify-training.php ');

    exit;
}


?>
<?php
include_once('../views-admin/view-display-modify-training.php');
?>