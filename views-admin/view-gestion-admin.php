<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style-gestion.css">
    <title>Gestion des formations et stagières</title>

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


    <div class="title text-center fs-1 mt-3">Gérer les réservations</div>
    <div class="card text-light my-4 text-dark">
        <div class="title text-center mt-4 fs-3">Formations et nombre de place restant</div>
        <div class="card-body" style="overflow-y: auto; max-height: 350px;">
            <div class="table-responsive-lg">
                <table class="table table-striped text-light">
                    <thead>
                        <tr class="text-center">
                            <th scope="col-1">Nom de la formation</th>
                            <th scope="col-1">Description</th>
                            <th scope="col-1">Nombre de place</th>
                            <th scope="col-1">Nombre de place restante </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($trainingDetailsList as $trainingId => $details) : ?>
                            <?php foreach ($details as $detail) : ?>
                                <tr class="text-center">
                                    <td><?= htmlspecialchars($detail['training_name']) ?></td>
                                    <td><?= htmlspecialchars($detail['training_description']) ?></td>
                                    <td><?= htmlspecialchars($detail['training_max']) ?></td>
                                    <td>
                                        <?php
                                        $placesRestantes = max(0, $detail['training_max'] - $detail['Place restante']);
                                        if ($placesRestantes === 0) {
                                            echo '<span class="text-danger fw-bold fs-5">' . "FORMATION COMPLETE" . '</span>';
                                        } else {
                                            echo htmlspecialchars($placesRestantes);
                                        }
                                        ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <div class="card text-light mt-5 text-dark">
        <div class="mt-3">
            <form action="" method="post">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="input-group">
                                <select name="type_id" class="form-control me-1">
                                    <option value="">Sélectionnez un type de formation</option>
                                    <?php foreach ($displayTrainingType as $trainingType) {
                                        echo "<option value='" . $trainingType['type_id'] . "'>" . $trainingType['type_name'] . "</option>";
                                    } ?>
                                </select>
                                <button type="submit" class="btn btn-custom ms-2">Rechercher</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card text-light mt-2 text-dark">
            <div class="card-header text-center fs-3">Demande de pré-réservation de formation</div>

            <div class="card-body" style="overflow-y: auto; max-height: 350px;">
                <div class="table-responsive-lg">
                    <table class="table table-striped text-light">
                        <thead>
                            <tr class="text-center">
                                <th scope="col-1">Nom du stagière</th>
                                <th scope="col-1">Prénom du stagière</th>
                                <th scope="col-1">titre de la formation</th>
                                <th scope="col-1">date de la formation </th>
                                <th scope="col-1">status de la demande </th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($displayCoursReseved as $cour) : ?>
                                <tr class="text-center">
                                    <td><?= htmlspecialchars($cour['user_lastname']) ?></td>
                                    <td><?= htmlspecialchars($cour['user_firstname']) ?></td>
                                    <td><?= htmlspecialchars($cour['training_name']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($cour['training_date'])) ?></td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-3">En cours</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input toggle-training" type="checkbox" id="monSwitch-<?= $cour['user_id'] . '-' . $cour['training_id']; ?>" data-user-id="<?= $cour['user_id']; ?>" data-training-id="<?= $cour['training_id']; ?>" <?= $cour['authorized_training'] ? 'checked' : ''; ?>>
                                            </div>
                                            <span class="ms-2">Valider</span>
                                        </div>

                                    </td>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>