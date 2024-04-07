<?php
session_start();
require_once '../config.php';
require_once '../models/Admin.php';

var_dump($_POST);

if (isset($_POST['delete'])) {
    Admin::deleteTraining($_POST['trainingId']);


    header('Location: controller-display-modify-training.php ');

    exit;
} else if (!isset($_POST['training_id'])) {

    header('Location: controller-home-admin.php ');
    exit;
}



include_once '../views-admin/view-confirmationDelete.php';

// include_once '../views-admin/view-display-modify-training.php';
