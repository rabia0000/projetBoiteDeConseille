<?php
class Admin
{
    /**
     * Methode permettant de crée un cours 
     * @param string $email Email de l'utilisateur
     * @param string $password Password de l'utilisateur
     * 
     * @return void
     */


    public static function create(string $email, string $password)
    {
        //connexion à la bdd
        //on crée un nouvelle objet $bdd selon la classe PDO qui prendra des données 

        //mettre le nom de la base de donnnées lors de la creation d'un utilisateur initialement crée sur phpMyAdmin
        // Dans dbname nom de la base de données, user = admin et password = admin 

        $bdd = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




        //  value (:value = marqueur nominatif)
        $sql = 'INSERT INTO `admin` (`admin_login`,`admin_password`) VALUES ( :email, :password)';
        //je prepare ma requete pour eviter les injection sql,  $bdd appelle la methode prepare 
        $query = $bdd->prepare($sql);
        //avec bindValue permet de mettre directement des valeurs sans crée de variable 


        $query->bindValue(':email', $email, PDO::PARAM_STR);

        $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

        try {
            $query->execute();
            echo 'Administrateur ajouté avec succès !';
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    /**
     * Methode permettant de vérifier le mail existe dans la base de données de la table Enterprise
     * 
     * @param string $mail de l'administrateur
     * 
     * @return bool
     */
    public static function checkMailExistsAdmin(string $mail): bool
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `admin` WHERE `admin_login` = :mail";

            // je prepare ma requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':mail', $mail, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
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
     * Methode permettant de récupérer les infos de l'administrateur avec son mail comme paramètre
     * 
     * @param string $mail Adresse mail de l'administrateur
     * 
     * @return array Tableau associatif contenant les infos de l'administrateyr
     */
    public static function getInfosAdmin(string $mail): array
    {
        try {
            // Création d'un objet $bdd selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `admin` WHERE `admin_login` = :mail";

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

    /**
     * Methode permettant l'affichage des cours sans parametres
     * 
     */

    public static function DisplayTraining()
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT `training_id`,`training_name`, `training_url`,`training_description`,`training_date`,`training_max`,
            `training_archived`, `type_id` 
            FROM `training`";

            $query = $bdd->prepare($sql);



            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }

    /**
     * Methode permettant de modifier un cours et de le mettre à jour 
     * @param STRING $trainingName nom du cours 
     * @param STRING $trainingUrl url du cours 
     * @param STRING $trainingDescription du cours 
     * @param STRING $trainingDate date du cours 
     * @param INT $trainingMax nombre de participant maximum
     * @param BOOL $trainingArchived indique si le cours est archivé ou non 
     * @param INT $trainingType indique le type de cours  
     * 
     */
    public static function updateTraining(
        int $trainingId, // Ajout de l'identifiant du cours à mettre à jour
        string $trainingName,
        string $trainingUrl,
        string $trainingDescription,
        string $trainingDate,
        int $trainingMax,
        bool $trainingArchived,
        int $trainingType
    ) {
        try {
            // Création d'un objet $bdd selon la classe PDO permet de se connecter à la bdd
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // Stockage de ma requête dans une variable
            $sql = "UPDATE `training` SET `training_name` = :trainingName, `training_url` = :trainingUrl, `training_description`= :trainingDescription, `training_date`= :trainingDate, `training_max` = :trainingMax, `training_archived`= :trainingArchived, `type_id`= :typeId WHERE `training_id` = :trainingId";

            // Je prépare ma requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // On relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':trainingId', $trainingId, PDO::PARAM_INT); // Lier l'ID du cours
            $query->bindValue(':trainingName', $trainingName, PDO::PARAM_STR);
            $query->bindValue(':trainingUrl', $trainingUrl, PDO::PARAM_STR);
            $query->bindValue(':trainingDescription', $trainingDescription, PDO::PARAM_STR);
            $query->bindValue(':trainingDate', $trainingDate, PDO::PARAM_STR);
            $query->bindValue(':trainingMax', $trainingMax, PDO::PARAM_INT);
            $query->bindValue(':trainingArchived', $trainingArchived, PDO::PARAM_BOOL);
            $query->bindValue(':typeId', $trainingType, PDO::PARAM_INT); // Correction ici

            // On exécute la requête
            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }


    /**
     * Methode permettant à l'administrateur de supprimer un cours 
     * @param INT $trainingId l'id du cours 
     * return void 
     */
    public static function deleteTraining(int $trainingId): void
    {
        try {

            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "DELETE FROM `training`  WHERE `training_id` = :trainingId";

            // je prepare ma requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':trainingId', $trainingId, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant d'afficher la date et le titre de la formation en récupérant le training_id en parametre 
     * @param INT $trainingId
     * 
     */
    public static function getNameAndDateTraining($trainingId)
    {
        try {

            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT `training_name`, `training_date` FROM `training` WHERE `training_id` = :trainingId";

            // je prepare ma requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':trainingId', $trainingId, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant d'afficher les utilisateurs qui ont pré-réservé un cours 
     * 
     * @return array
     * 
     */
    public static function displayReservationUsers()
    {
        try {

            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT user.user_id, user.user_lastname, user.user_firstname, training.training_name, training.training_date, to_register.authorized_training, training.training_max, training.training_id
            FROM user
            INNER JOIN to_register ON to_register.user_id = user.user_id
            INNER JOIN training ON training.training_id = to_register.training_id";

            // je prepare ma requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // on execute la requête
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }


    /**
     * Methode qui permet de trier les formations par type dans la select recherche
     * @param INT $trainingType variable qui récupère le type de formation et qui va les afficher par date
     * 
     * @return ARRAY
     * 
     */


    public static function typeTrainingSort(int $trainingType)
    {
        try {

            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT user.user_id, user.user_firstname, user.user_lastname, training.training_id, training.training_name, training.training_date, to_register.authorized_training 
            FROM user
            INNER JOIN to_register ON to_register.user_id = user.user_id
            INNER JOIN training ON training.training_id = to_register.training_id
            INNER JOIN type_training ON training.type_id = type_training.type_id
            WHERE type_training.type_id = :trainingType";

            // je prepare ma requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':trainingType', $trainingType, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }

    /**
     * Methode qui permet d'afficher les types de cours
     * @return ARRAY
     */

    public static function displayTypeTraining()
    {

        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "SELECT * from type_training";


            // je prepare ma requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // on execute la requête
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }



    /**
     * Méthode pour mettre à jour le statut authorized_training d'un utilisateur
     * @param int $userId L'identifiant de l'utilisateur
     * @param int $authorizedTraining Le nouveau statut de la formation (1 pour autorisé, 0 pour non autorisé)
     * @return bool Renvoie true si la mise à jour est réussi, sinon false
     */
    public static function updateAuthorizedTraining($userId, $authorizedTraining)
    {
        try {
            // Création d'un objet $bdd selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // Définition de la requête SQL pour mettre à jour authorized_training
            $sql = "UPDATE to_register SET authorized_training = :authorized_training WHERE user_id = :user_id";

            // Préparation de la requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // Liaison des paramètres
            $query->bindParam(':authorized_training', $authorizedTraining, PDO::PARAM_INT);
            $query->bindParam(':user_id', $userId, PDO::PARAM_INT);

            // Exécution de la requête
            $result = $query->execute();

            // Retourne true si la mise à jour a réussi
            return $result;
        } catch (PDOException $e) {
            // En cas d'erreur, affiche le message d'erreur et arrête le script
            echo 'Erreur : ' . $e->getMessage();
            die();
            return false;
        }
    }
    /**
     * Méthode pour mettre à jour le statut authorized_training d'un enregistrement spécifique
     * en fonction de user_id et training_id
     * @param int $userId L'identifiant de l'utilisateur
     * @param int $trainingId L'identifiant de la formation
     * @param int $authorizedTraining Le nouveau statut de la formation (1 pour autorisé, 0 pour non autorisé)
     * @return bool Renvoie true si la mise à jour est réussie, sinon false
     */
    public static function updateTrainingAuthorization($userId, $trainingId, $authorizedTraining)
    {
        try {
            // Assurez-vous d'avoir une instance de PDO pour se connecter à votre base de données
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // Définition de la requête SQL pour mettre à jour authorized_training
            $sql = "UPDATE to_register SET authorized_training = :authorized_training WHERE user_id = :user_id AND training_id = :training_id";

            // Préparation de la requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // Liaison des paramètres
            $query->bindParam(':authorized_training', $authorizedTraining, PDO::PARAM_INT);
            $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $query->bindParam(':training_id', $trainingId, PDO::PARAM_INT);

            // Exécution de la requête
            $result = $query->execute();

            // Retourne true si la mise à jour a réussi
            return $result;
        } catch (PDOException $e) {
            // En cas d'erreur, affiche le message d'erreur et arrête le script
            echo 'Erreur : ' . $e->getMessage();
            die();
            return false;
        }
    }
    /**
     * Methode qui permet de compter le nombre de stagiere inscrit a une même formation (affichera le nombre de place restant) 
     * @param INT 
     * @return Array 
     */
    public static function countRegister($trainingId)
    {
        try {
            // Création d'un objet PDO pour la connexion à la base de données
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête SQL pour récupérer les détails du cours
            $sql = "SELECT 
                    training.training_name,
                    training.training_description,
                    training.training_max, 
                    COUNT(to_register.training_id) AS 'Place restante'
                FROM 
                    to_register
                JOIN 
                    training ON to_register.training_id = training.training_id
                WHERE 
                    to_register.training_id = :trainingId
                AND to_register.authorized_training = 1
                GROUP BY 
                    training.training_name, training.training_description, training.training_max
                
                ";

            // Préparation de la requête
            $query = $bdd->prepare($sql);

            // Liaison du paramètre :trainingId à la valeur $trainingId
            $query->bindValue(':trainingId', $trainingId, PDO::PARAM_INT);

            // Exécution de la requête  
            $query->execute();

            // Récupération du résultat
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // Retourne les détails du cours si trouvé, sinon un tableau vide
            return $result;
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }
    /**
     * Méthode qui permet d'avoir le nombre de préinscription et de les regrouper par type (utiliser pour le diagramme)
     * @return array
     */
    public static function getNomberInscriptionsParTypeCours()
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT type_training.type_name AS Type_De_Cours, COUNT(DISTINCT to_register.user_id) AS Nombre_Utilisateurs
            FROM to_register
            JOIN training ON to_register.training_id = training.training_id
            JOIN type_training ON type_training.type_id = training.type_id
            GROUP BY type_training.type_name";

            $query = $bdd->prepare($sql);

            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }

    /**
     * Methode permettant de compter le nombre de demande de formation
     * 
     */
    public static function getNomberInscriptions()
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT COUNT(*) AS 'Nombre total de demande de formation'
            FROM to_register";

            $query = $bdd->prepare($sql);

            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }

    /**
     * Methode permettant de compter le nombre de demande de formation
     * 
     */
    public static function getNomberInscriptionsTraining()
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT training.training_name, COUNT(to_register.user_id) AS 'Nombre_de_demande'
            FROM training
            INNER JOIN to_register ON training.training_id = to_register.training_id
            INNER JOIN user ON user.user_id = to_register.user_id
            GROUP BY training.training_name";
            $query = $bdd->prepare($sql);

            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }
    /**
     * Methode permettant d'afficher la prochaine formation
     * @return array
     * 
     */
    public static function displayUpcommingTraining()
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT training_name, training_date
            FROM training
            WHERE training_date > CURRENT_DATE
            ORDER BY training_date ASC
            LIMIT 1";
            $query = $bdd->prepare($sql);

            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }
    /**
     * Methode permettant de compter le nombre de formation terminer
     * 
     */
    public static function countTrainingValidate()
    {


        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT COUNT(completed_training) AS 'training_finished'
                FROM to_register 
                WHERE completed_training = 1";
            $query = $bdd->prepare($sql);

            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }



    /**
     * Methode permettant d'afficher le nom, prenom et l'adresse email des stagière
     * @return array
     * 
     */
    public static function displayUsers()
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT `user_lastname`, `user_firstname`, `user_mail`
            FROM user";
            $query = $bdd->prepare($sql);

            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }
    /**
     * Methode permettant d'afficher tout les stagieres qui ont l'autorisation par l'admin de suivre une formation
     * 
     * @return array
     * 
     */
    public static function displayAuthorizedUsers()
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT user.user_id, training.training_id, user.user_lastname, user.user_firstname, training_name, training_date, to_register.completed_training
            From training
            INNER JOIN to_register ON to_register.training_id = training.training_id
            INNER JOIN user ON user.user_id = to_register.user_id
            WHERE  authorized_training = 1";

            $query = $bdd->prepare($sql);

            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }

    /**
     * Méthode permettant de valider une formation pour un utilisateur spécifique.
     *
     * @param int $userId L'ID de l'utilisateur.
     * @param int $trainingId L'ID de la formation.
     * @return bool Le résultat de l'opération.
     */
    public static function updateTrainingStatus($userId, $trainingId, $completedTraining)
    {
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "UPDATE to_register SET completed_training = :completedTraining WHERE user_id = :userId AND training_id = :trainingId";

            $query = $bdd->prepare($sql);
            $query->bindParam(':completedTraining', $completedTraining, PDO::PARAM_INT);
            $query->bindParam(':userId', $userId, PDO::PARAM_INT);
            $query->bindParam(':trainingId', $trainingId, PDO::PARAM_INT);

            return $query->execute();
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode qui permet de faire une recherche par formation 
     * @param INT $trainingType variable qui récupère l'id de formation
     * @return ARRAY
     * 
     */


    public static function TrainingSort(int $trainingId)
    {
        try {

            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT user.user_id, user.user_firstname, user.user_lastname, training.training_id, training.training_name, training.training_date, to_register.authorized_training, training.training_date, to_register.completed_training
             FROM user
             INNER JOIN to_register ON to_register.user_id = user.user_id
             INNER JOIN training ON training.training_id = to_register.training_id
             WHERE training.training_id = :trainingId and to_register.authorized_training = 1";

            // je prepare ma requête pour éviter les injections SQL
            $query = $bdd->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':trainingId', $trainingId, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }
}
