<?php
session_start();

// Importation des configurations et des modèles nécessaires
require_once '../config.php';
include_once '../models/Admin.php';
include_once '../models/Training.php';
// var_dump($_POST);

if (!isset($_SESSION['admin'])) {
    header('Location: controller-signin.php');
    exit;
}


$afficherCours = Admin::DisplayTraining();


?>
<?php
include_once('../views-admin/view-display-modify-training.php');
?>