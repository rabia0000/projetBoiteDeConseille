<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styleUser/style-home.css">

</head>

<body>

    <!-- nav  -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand fs-4" href="../controllers/controller-home.php">Dashboard Administrateur de <?= $_SESSION['user']['user_firstname'] ?></a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="../controllers/controller-booking.php" class="nav-link text-light fs-6">Réserver un cours en présentiel</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-light fs-6">Accèder au cours en ligne</a>
                    </li>
                    <li class="nav-item">
                        <a href="../controllers/controller-completed-training" class="nav-link text-light fs-6">Formations Validées</a>
                    </li>
                    <li class="nav-item ">
                        <a href="../controllers/controller-deconnexion.php" class="nav-link text-danger fs-6">Déconnexion</a>
                    </li>
                    <li><button id="theme-toggle" class="btn btn-custom ms-2 my-2">Changer de thème</button><!-- Switch pour changer de thème -->
                    </li>
                    <!-- Ajouter plus de liens ici selon les besoins -->
                </ul>
            </div>
        </div>
    </nav>


    <div class="card bgTitle text-dark rounded border border-secondary p-1 mt-3">
        <div class="card-header bg-light text-center">
            <h2 class="ms-1 my-2">Vos formations passées et validées</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive-lg">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Nom de la formation</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date de la formation</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($displayCompletedTraining as $train) : ?>
                            <tr class="text-center">
                                <td><?= htmlspecialchars($train['training_name']) ?></td>
                                <td><?= htmlspecialchars($train['training_description']) ?></td>
                                <td><?= date('d-m-Y', strtotime($train['training_date'])) ?></td>
                                <td>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
    <script src="../scriptUser.js"></script>

    <!-- Bootstrap Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>