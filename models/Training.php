<?php
class Training
{

    /**
     * Methode qui permet à l'administrateur de crée un cours 
     * @param string $trainingName intitulé de la formation  
     * @param string $trainingUrl url de la formation 
     * @param string $trainingDescription description de la formation 
     * @param string $trainingDate date de la formation 
     * @param string $trainingMax nombre de participant maximum de la formation
     * @param string $trainingArchived formation passé 
     * @param string $trainingType type de formation
     *@return void
     */



    public static function create(string $trainingName, string $trainingUrl, string $trainingDescription, string $trainingDate, int $trainingMax, bool $trainingArchived, int $trainingType)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charsef=utf8', DBUSERNAME, DBPASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // REQUETE 
        $sql = 'INSERT INTO  `training` (`training_name`,`training_url`,`training_description`,`training_date`,`training_max`,`training_archived`,`type_id`) VALUES (:trainingName, :trainingUrl, :trainingDescription, :trainingDate, :trainingMax, :trainingArchived, :trainingType)';
        $query = $bdd->prepare($sql);

        $query->bindValue(':trainingName', htmlspecialchars($trainingName), PDO::PARAM_STR);
        $query->bindValue(':trainingUrl', htmlspecialchars($trainingUrl), PDO::PARAM_STR);
        $query->bindValue(':trainingDescription', htmlspecialchars($trainingDescription), PDO::PARAM_STR);
        $query->bindValue(':trainingDate', htmlspecialchars($trainingDate), PDO::PARAM_STR);
        $query->bindValue(':trainingMax', ($trainingMax), PDO::PARAM_INT);
        $query->bindValue(':trainingArchived', ($trainingArchived), PDO::PARAM_BOOL);
        $query->bindValue(':trainingType', ($trainingType), PDO::PARAM_INT);


        try {
            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Methode permettant d'afficher tout les cours et le nom du type de cours 
     *@return Array
     */

    public static function getAlltraining(): array
    {

        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql = "SELECT training.training_id, training.training_name, training.training_description, training.training_date, training.training_max, training.training_archived, 
            type_training.type_name AS type_de_cours 
            FROM training
            INNER JOIN type_training ON training.type_id = type_training.type_id;";

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
     * Methode permettant de pré-réserver un cours
     * @param integer $userId récupération du l'id de l'utilisateur
     * @param integer $trainingId récupération de l'id du cours a réserver 
     * @return void
     */

    public static function submitPreReservation($userId, $trainingId)
    {
        try {
            // Création d'un objet $bdd selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Optionnel: Active le rapport d'erreurs

            $sql = "INSERT INTO to_register (`user_id`, `training_id`, `authorized_training`, `completed_training`) VALUES (:user_id, :training_id, 0, 0)";

            $query = $bdd->prepare($sql);

            // BindParam lie les variables aux marqueurs nominatifs dans la requête SQL
            $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $query->bindParam(':training_id', $trainingId, PDO::PARAM_INT);

            // Exécution de la requête
            $query->execute();

            // Vérification de la réussite de l'insertion
            // if ($query->rowCount() > 0) {
            //     return true; // Retourne vrai si l'insertion a réussi
            // } else {
            //     return false; // Retourne faux si aucune ligne n'a été insérée
            // }
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo 'Erreur : ' . $e->getMessage();
            return false; // Retourne faux en cas d'erreur
        }
    }

    /**
     * Methode permettant d'afficher les cours pré-enregistrer dans le dashbord avec attente de validation de formation par l'admin
     * @param integer $userId récuperation de l'id de utilisateur
     * 
     */

    public static function DisplayReservation($userId)
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT t.training_id, t.training_name, t.training_description, t.training_date, tr.authorized_training 
            FROM training t
            INNER JOIN to_register tr ON tr.training_id = t.training_id
            INNER JOIN user u ON u.user_id = tr.user_id
            WHERE u.user_id = :user_id";

            $query = $bdd->prepare($sql);

            $query->bindParam(':user_id', $userId, PDO::PARAM_INT);

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
     * Méthode permettant d'annuler une pré-réservation d'un cours
     * @param integer $userId ID de l'utilisateur qui souhaite annuler la pré-réservation
     * @param integer $trainingId ID du cours dont la pré-réservation doit être annulée
     * @return bool Retourne true si l'annulation a réussi, false en cas d'échec ou d'erreur
     */
    public static function cancelPreReservation($userId, $trainingId)
    {
        try {
            // Création d'un objet $bdd selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Optionnel: Active le rapport d'erreurs

            // Préparation de la requête SQL pour supprimer la pré-réservation
            $sql = "DELETE FROM to_register WHERE user_id = :user_id AND training_id = :training_id";

            $query = $bdd->prepare($sql);

            // Liaison des paramètres
            $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $query->bindParam(':training_id', $trainingId, PDO::PARAM_INT);

            // Exécution de la requête
            $query->execute();

            // Vérification que la requête a bien supprimé une ligne
            if ($query->rowCount() > 0) {
                return true; // Retourne vrai si la suppression a réussi
            } else {
                return false; // Retourne faux si aucune ligne n'a été supprimée (peut-être qu'il n'y avait pas de pré-réservation correspondante)
            }
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo 'Erreur : ' . $e->getMessage();
            return false; // Retourne faux en cas d'erreur
        }
    }


    /**
     * Methode permettant d'afficher tout les types cours 
     *@return void
     */

    public static function getAllTypetraining(): array
    {

        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql = "SELECT DISTINCT (type_training.type_id), type_training.type_name  FROM type_training LEFT JOIN training ON training.type_id = type_training.type_id";

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
     * Récupère les détails d'un cours spécifique par son ID.
     * 
     * @param int $trainingId L'identifiant du cours.
     * @return array Les détails du cours ou un tableau vide si non trouvé.
     */
    public static function getCoursById($trainingId)
    {
        // Assurez-vous que $trainingId est un entier pour éviter les injections SQL
        $trainingId = (int)$trainingId;

        try {
            // Création d'un objet PDO pour la connexion à la base de données
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête SQL pour récupérer les détails du cours
            $sql = "SELECT `training_id`, `training_name`, `training_url`, `training_description`, `training_date`, `training_max`, `training_archived`, `type_id` FROM `training` WHERE `training_id` = :trainingId";

            // Préparation de la requête
            $query = $bdd->prepare($sql);

            // Liaison du paramètre :trainingId à la valeur $trainingId
            $query->bindValue(':trainingId', $trainingId, PDO::PARAM_INT);

            // Exécution de la requête  
            $query->execute();

            // Récupération du résultat
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Retourne les détails du cours si trouvé, sinon un tableau vide
            return $result ? $result : [];
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }


    /**
     * Methode qui permet de compter le nombre de stagiere inscrit a une même formation (affichera le nombre de place restant) 
     * @param INT 
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
                    to_register.training_id = :taining_id
                AND to_register.authorized_training = 1
                GROUP BY 
                    training.training_name, training.training_url, training.training_description, training.training_max
                
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
            return $result ? $result : [];
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    /**
     * Methode qui permet de compter le nombre total d'inscription aux formations d'un stagière 
     * @param INT $userId on récupère l'id du stagière
     * @return Array 
     */
    public static function countReservationTraining($userId)
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT COUNT(t.training_id) AS nombre_de_reservation
            FROM training t
            INNER JOIN to_register tr ON tr.training_id = t.training_id
            INNER JOIN user u ON u.user_id = tr.user_id
            WHERE u.user_id = :user_id";

            $query = $bdd->prepare($sql);

            $query->bindParam(':user_id', $userId, PDO::PARAM_INT);

            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }
    /**
     * Methode qui permet d'afficher les formations validées par l'utilisateur et les trier par date 
     * @param INT $userId on récupère l'id du stagière
     * @return Array 
     */
    public static function displayTrainingValidate($userId)
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql = "SELECT  (training.training_name), training.training_description, training.training_date 
            FROM training
            INNER JOIN to_register ON to_register.training_id = training.training_id
            INNER JOIN user ON user.user_id = to_register.user_id
            WHERE to_register.completed_training = 1 AND user.user_id = :user_id
            ORDER BY training.training_date DESC";

            $query = $bdd->prepare($sql);
            $query->bindParam(':user_id', $userId, PDO::PARAM_INT);

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
     * Methode qui permet de compterle nombre de formation validée 
     * @param INT $userId on récupère l'id du stagière
     * @return Array 
     */
    public static function countTrainingValidate($userId)
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql = "SELECT COUNT(training_id) AS nombre_de_formation_valide
            FROM to_register
            WHERE completed_training = 1 AND user_id = :user_id";




            // $sql = "SELECT COUNT(training.training_id) AS nombre_de_formation_validé
            // FROM training
            // INNER JOIN to_register ON to_register.training_id = training.training_id
            // INNER JOIN user ON user.user_id = :user_id
            // WHERE to_register.completed_training = 1";


            $query = $bdd->prepare($sql);
            $query->bindParam(':user_id', $userId, PDO::PARAM_INT);

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
     * Methode permettant d'afficher les prochaines formations à venir 
     * 
     */
    public static function displayUpcommingTraining($userId)
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql = "SELECT `training_date`, `training_name`
            FROM boite_de_conseille.to_register
            INNER JOIN training ON to_register.training_id = training.training_id
            INNER JOIN user ON user.user_id = to_register.user_id
            WHERE user.user_id = :user_id AND training_date > CURRENT_DATE AND authorized_training = 1
             ORDER BY training_date ASC
            LIMIT 1";

            $query = $bdd->prepare($sql);
            $query->bindParam(':user_id', $userId, PDO::PARAM_INT);



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
     * Methode qui permet de compter le nombre total d'inscription à une formation
     * @param INT $trainingId
     * @return Array 
     */
    public static function countTrainingReservation($trainingId)
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT COUNT(authorized_training) AS total
            FROM to_register
            WHERE training_id = :trainingId and authorized_training = 1;";

            $query = $bdd->prepare($sql);

            $query->bindParam(':trainingId', $trainingId, PDO::PARAM_INT);

            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['total'];
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }

    /**
     * Methode qui permet savoir si une reservation est déjà présente
     * @param INT $trainingId
     * @param INT $userId
     * @return Array 
     */
    public static function checkTrainingRegister($trainingId, $userId)
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $bdd = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // stockage de ma requete dans une variable
            $sql =  "SELECT COUNT(training_id) AS total
            FROM to_register
            WHERE user_id = :userId AND training_id = :trainingId;";

            $query = $bdd->prepare($sql);

            $query->bindParam(':trainingId', $trainingId, PDO::PARAM_INT);
            $query->bindParam(':userId', $userId, PDO::PARAM_INT);

            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['total'];
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
            return [];
        }
    }
}
