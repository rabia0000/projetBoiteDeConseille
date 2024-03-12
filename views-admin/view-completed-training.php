<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations validées</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style-home-dash.css">


</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand fs-4" href="../controllers-admin/controller-home-admin.php">Dashboard Administrateur de <?= $_SESSION['admin']['admin_name'] ?></a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light fs-6" aria-current="page" href="../controllers-admin/controller-display-modify-training.php">Afficher/modifier une formation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fs-6" aria-current="page" href="../controllers-admin/controller-create-training.php">Créer une formation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fs-6" href="../controllers-admin/controller-gestion-admin.php">Gérer les réservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fs-6" href="../controllers-admin/controller-completed-training.php">Gérer les validations de formation</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-danger fs-6" href="../controllers/controller-deconnexion.php">Déconnexion</a>
                    </li>

                    <li><button id="theme-toggle" class="btn btn-custom ms-2 my-2">Changer de thème</button><!-- Switch pour changer de thème -->
                    </li>
                    <!-- Ajouter plus de liens ici selon les besoins -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="card text-light mt-2 text-dark">
        <div class="card-header text-center fs-3">Gestion des validations de formations</div>

        <!-- recherche par formation -->
        <div class="card text-light mt-5 text-dark">
            <div class="mt-3">
                <form action="" method="post">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <div class="input-group">
                                    <select name="training_id" class="form-control me-1">
                                        <option value="">Sélectionnez une formation</option>
                                        <?php foreach ($DisplayAllTraining as $training) {
                                            echo "<option value='" . $training['training_id'] . "'>" . $training['training_name'] . "</option>";
                                        } ?>
                                    </select>
                                    <button type="submit" class="btn btn-custom ms-2">Rechercher</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="card-body" style="overflow-y: auto; max-height: 350px;">
                <div class="table-responsive-lg">
                    <table class="table table-striped text-light">
                        <thead>
                            <tr class="text-center">
                                <th scope="col-1">Nom du stagière</th>
                                <th scope="col-1">Prénom du stagière</th>
                                <th scope="col-1">titre de la formation</th>
                                <th scope="col-1">date de la formation </th>
                                <th scope="col-1">Validation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($displayAuthorizedUsers as $authorizedUsers) : ?>
                                <tr class="text-center">
                                    <td><?= htmlspecialchars($authorizedUsers['user_lastname']) ?></td>
                                    <td><?= htmlspecialchars($authorizedUsers['user_firstname']) ?></td>
                                    <td><?= htmlspecialchars($authorizedUsers['training_name']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($authorizedUsers['training_date'])) ?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="user_id" value="<?= $authorizedUsers['user_id'] ?>">
                                            <input type="hidden" name="training_id" value="<?= $authorizedUsers['training_id'] ?>">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="me-2">En cours</span>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="validateTraining<?= $authorizedUsers['user_id'] ?>" name="validate_training" onchange="this.form.submit()" <?= $authorizedUsers['completed_training'] ? 'checked' : '' ?>>
                                                </div>
                                                <span class="ms-2">Validé</span>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>