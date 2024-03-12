<?php
session_start();
require_once '../config.php';
require_once '../models/Admin.php';

if (!isset($_SESSION['admin'])) {
    header('Location: controller-signin.php');
    exit;
}

//Permet de stocker l'affichage par type dans la variable $displayTrainingType
$displayTrainingType = Admin::displayTypeTraining();
// var_dump($displayTrainingType);

//afficher les utilisateurs qui ont pré-réservé un cours dans la variable $displayCoursReseved
$displayCoursReseved = Admin::displayReservationUsers();
// var_dump($displayCoursReseved);

// Après avoir récupéré $displayCoursReseved
$trainingDetailsList = []; // Initialisation d'un tableau pour stocker les détails de chaque formation


//permet de compter le nombre de places
foreach ($displayCoursReseved as $cour) {
    $trainingId = $cour['training_id']; // Récupération de l'ID de la formation
    $trainingDetails = Admin::countRegister($trainingId); // Appel de countRegister pour cette formation
    if (!empty($trainingDetails)) {
        $trainingDetailsList[$trainingId] = $trainingDetails; // Stockage des détails dans le tableau avec training_id comme clé
    }
}


//Permet d'afficher tout les utilisateur qui ont reservé un cours par type 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $displayCoursReseved = Admin::typeTrainingSort($_POST['type_id']);
    // var_dump($displayCoursReseved);
}


?>
<?php
require_once('../views-admin/view-gestion-admin.php');
?>