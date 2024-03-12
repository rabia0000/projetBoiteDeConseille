<?php

class Userprofil
{
    /**
     * Methode qui permet de crée un utilisateur 
     * @param string $lastname nom de famille de l'employer
     * @param string firstname prenom de l'employer 
     * @param string $mail email de l'employer 
     * @param string $password mot de passe de l'employer 
     * 
     * @return void
     */

    public static function create(string $lastname, string $firstname, string $mail, string $password)
    {
        //Connexion à la base de données 
        //on crée un nouvelle objet $bdd selon la classe PDO qui prendra des données 
        //mettre le nom de la base de donnnées lors de la creation d'un utilisateur initialement crée sur phpMyAdmin
        // Dans dbname nom de la base de données, user = admin et password = admin 
        $bdd = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charsef=utf8', DBUSERNAME, DBPASSWORD);

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // REQUETE 
        $sql = 'INSERT INTO  `user` (`user_lastname`,`user_firstname`,`user_mail`,`user_password`) VALUES (:lastname, :firstname, :mail, :password)';

        //je prepare ma requete pour eviter les injection sql,  $bdd appelle la methode prepare 
        $query = $bdd->prepare($sql);
        // bindValue permet de mettre directement des valeurs sans crée de variable 
        $query->bindValue(':lastname', htmlspecialchars($lastname), PDO::PARAM_STR);
        $query->bindValue(':firstname', htmlspecialchars($firstname), PDO::PARAM_STR);
        $query->bindValue(':mail', htmlspecialchars($mail), PDO::PARAM_STR);
        $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

        try {
            $query->execute();
            echo 'Utilisateur ajouté avec succès !';
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Methode qui permet de vérifier si le mail existe déjà dans la base de donnée de la table user 
     * 
     * @param string $mail adresse mail de l'utilisateur
     * 
     * @return bool 
     */
    public static function checkMailExists($mail): bool
    {
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "SELECT * FROM `user` WHERE `user_mail` = :mail";

            $query = $bdd->prepare($sql);

            $query->bindValue('mail', $mail, PDO::PARAM_STR);

            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);
            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le mail n'existe pas
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }


    /**
     * Methode permettant de récupérer les infos d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $email Adresse mail de l'utilisateur
     * 
     * @return array Tableau associatif contenant les infos de l'utilisateur
     */
    public static function getInfos(string $mail): array
    {
        try {
            // Création d'un objet $bdd selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `user` WHERE `user_mail` = :mail";

            // je prepare ma requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':mail', $mail, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
