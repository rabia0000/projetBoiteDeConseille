<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations validées</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style-home-dash.css">


</head>
<style>
    .nav-btns-container {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;

        display: flex;
        justify-content: space-around;
        gap: 1rem;
        padding: 0.5rem 0;
    }

    .nav-btn .bi {
        font-size: 1.5rem;
    }

    @media (max-width: 768px) {
        .nav-btn .bi {
            font-size: 1.2rem;
        }

        .nav-btn span {
            display: none;
        }
    }

    .container-fluid {
        padding-top: 4rem;
    }
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <!-- Brand -->
            <a href="../controllers-admin/controller-home-admin.php" class="btn btn-outline-success nav-btn mx-2 ">
                <i class="bi bi-arrow-left fs-5"></i>
            </a>
            <a class="navbar-brand fs-6 " href="../controllers-admin/controller-home-admin.php">Dashboard Administrateur de <?= $_SESSION['admin']['admin_name'] ?></a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li><button id="theme-toggle" class="btn btn-custom">Changer de thème</button><!-- Switch pour changer de thème -->
                    </li>
                    <!-- Ajouter plus de liens ici selon les besoins -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="nav-btns-container bg-dark">

        <a href="../controllers-admin/controller-display-modify-training.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-card-list fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Gérer vos formations</span>
        </a>
        <a href="../controllers-admin/controller-gestion-admin.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-calendar-check fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Gérer vos réservations</span>
        </a>
        <a href="../controllers-admin/controller-create-training.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-plus-lg fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Créer Formation</span>
        </a>
        <a href="../controllers-admin/controller-completed-training.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-check-circle fw-bold mx-1" title="Gérer les validations"></i>
            <span class="d-none d-md-inline">Gérer la validations de formation</span>
        </a>

        <a href="../controllers/controller-deconnexion.php" class="btn btn-outline-danger nav-btn ">
            <i class="bi bi-power fw-bold mx-1" title="Se déconnecter"></i>
            <span class="d-none d-md-inline">Se déconnecter</span>
        </a>
    </div>



    <div class="card text-light mt-2 text-dark">
        <div class="card-header text-center mt-5 fs-3">Gestion des validations de formations</div>

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