

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

$userId = $_SESSION['admin']['admin_login'];


$afficherCours = Admin::DisplayTraining();
// var_dump($afficherCours);
$afficherCoursPre = Admin::displayReservationUsers();
// var_dump($afficherCoursPre);

//Diagramme
//j'appelle ma methode
$inscriptionsParType = Admin::getNomberInscriptionsParTypeCours();
// Convertir les résultats pour les passer à la vue
$typesDeCours = [];
$nombreDePreInscriptions = [];

foreach ($inscriptionsParType as $inscription) {
    $typesDeCours[] = $inscription['Type_De_Cours'];
    $nombreDePreInscriptions[] = $inscription['Nombre_Utilisateurs'];
}

//Affichage du nb de demande de stage : 

$nombreInscriptions = Admin::getNomberInscriptions();

//second bar chart : 

// Appel de la méthode pour obtenir les données
$inscriptionData = Admin::getNomberInscriptionsTraining();

$nameTraining = [];
$nomberInscrption = [];

// Utilisation de foreach pour traiter chaque enregistrement
foreach ($inscriptionData as $inscription) {
    $nameTraining[] = $inscription['training_name']; // Ajout du nom de la formation au tableau des labels
    $nomberInscrption[] = $inscription['Nombre_de_demande']; // Ajout du nombre de demandes au tableau des données
}

//Afficher les prochains cours a venir
$displayUpcomingTraining = Admin::displayUpcommingTraining();

//methode permettant d'afficher tout les stagieres de l'entreprise 
$displayUsers = Admin::displayUsers();

//afficher le nombre de stagieres qui ont valider leurs formation
$getNumberUserValidate = Admin::countTrainingValidate();


?>

<?php
include_once('../views-admin/view-home-ad.php');
?>