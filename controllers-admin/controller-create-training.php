<?php
session_start();
// Assurez-vous d'inclure le fichier où la classe Training est définie
require_once '../config.php';
require_once '../models/Training.php';

// Récupérer tous les types de formation
$trainingOfType = Training::getAllTypetraining();

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // je créer un tableau d'erreur vide 
    $errors = [];

    // Vérification de 'trainingType'
    if (empty($_POST["trainingType"]) || $_POST["trainingType"] === "selected") {
        $errors['trainingType'] = "Veuillez sélectionner un type de formation."; // Vérifie si une option valide est sélectionnée
    }





    if (empty($_POST["trainingName"])) {
        $errors['trainingName'] = "Nom de la formation obligatoire.";
    } else if (!preg_match("/^[a-zA-ZÀ-ÿ\s\-]+$/", $_POST["trainingName"])) {
        $errors['trainingName'] = "Le nom est invalide.";
    }


    if (empty($_POST["trainingDate"])) {
        $errors["trainingDate"] = "La date de naissance est obligatoire.";
    } else {
        // Ajout de la date de naissance
        $date = $_POST["trainingDate"];
    }


    // Vérification de 'trainingDescription'
    if (empty($_POST["trainingDescription"])) {
        $errors["trainingDescription"] = "Ajouter une description";
    } else {


        $description = $_POST['trainingDescription'];
    }


    // Vérification de 'trainingMax'
    if (empty($_POST["trainingMax"])) {
        $errors['trainingMax'] = "Champs obligatoire."; // Vérifie si le champ est vide
    } else if (!is_numeric($_POST["trainingMax"])) {
        $errors['trainingMax'] = "La valeur doit être un nombre."; // Vérifie si la valeur est numérique
    } else if ((float)$_POST["trainingMax"] <= 0) {
        $errors['trainingMax'] = "Le nombre doit être positif."; // Vérifie si le nombre est positif
    }

    if (empty($_POST["trainingUrl"])) {
        $errors['trainingUrl'] = "url obligatoire."; // Vérifie si le champ est vide
    } else {
        // Ajout de http:// si aucun schéma n'est présent
        $trainingUrl = $_POST["trainingUrl"];
        if (!preg_match("~^(?:f|ht)tps?://~i", $trainingUrl)) {
            $trainingUrl = "http://" . $trainingUrl;
        }

        $trainingUrl = htmlspecialchars($trainingUrl, ENT_QUOTES, 'UTF-8');
        if (!filter_var($trainingUrl, FILTER_VALIDATE_URL)) {
            $errors['trainingUrl'] = "L'URL n'est pas valide."; // Vérifie si l'URL est valide
        }
    }


    // Vérification de 'trainingArchived'
    if (isset($_POST["trainingArchived"])) {
        $trainingArchived = $_POST["trainingArchived"];
        if (!in_array($trainingArchived, ["0", "1"])) {
            $errors['trainingArchived'] = "Sélection invalide."; // Vérifie si la valeur est l'une des options attendues
        }
    } else {
        // Dans le cas où pour une raison quelconque, aucune valeur n'est transmise
        $errors['trainingArchived'] = "Veuillez sélectionner une option.";
    }






    if (empty($errors)) {
        $type = $_POST['trainingType'];
        $name = $_POST['trainingName'];
        $url = $_POST['trainingUrl'];
        $date = $_POST['trainingDate'];
        $description = $_POST['trainingDescription'];
        $archived = $_POST['trainingArchived'];
        $nbPlace =  $_POST['trainingMax'];


        Training::create(
            $name,
            $url,
            $description,
            $date,
            $nbPlace,
            $archived,
            $type
        );
        $_SESSION['ajoutReussi'] = true;
    }
}



// Inclure la vue pour la création de formation
include_once('../views-admin/view-create.php');
