<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/styleUser/style-home.css">
    <style>
        .modal-content {
            background-color: rgba(128, 128, 128, 0.5);
            /* Transparence du modal */
            backdrop-filter: blur(30px);
            /* Effet de flou optionnel */
        }

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
</head>

<body>

    <!-- nav  -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
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


                    <li><button id="theme-toggle" class="btn btn-custom ms-2 my-2">Changer de thème</button><!-- Switch pour changer de thème -->
                    </li>
                    <!-- Ajouter plus de liens ici selon les besoins -->
                </ul>
            </div>
        </div>
        <div class="nav-btns-container bg-dark">



            <a href="../controllers/controller-booking.php" class="btn btn-outline-light nav-btn ">
                <i class="bi bi-card-list fw-bold mx-1"></i>
                <span class="d-none d-md-inline">Réserver une formation en présentiel</span>
            </a>

            <a href="../controllers/controller-modify.php" class="btn btn-outline-light nav-btn ">
                <i class="bi bi-pencil-square fw-bold mx-1" title="Gérer les validations"></i>
                <span class="d-none d-md-inline">Modifier vos réservations</span>
            </a>
            <a href="../controllers/controller-completed-training.php" class="btn btn-outline-light nav-btn ">
                <i class="bi bi-calendar-check fw-bold mx-1"></i>
                <span class="d-none d-md-inline">Vos formations Validées</span>
            </a>
            <a href="../controllers/controller-deconnexion.php" class="btn btn-outline-danger nav-btn ">
                <i class="bi bi-power fw-bold mx-1" title="Se déconnecter"></i>
                <span class="d-none d-md-inline">Se déconnecter</span>
            </a>
        </div>
    </nav>
    <div class="container-fluid my-3">
        <div class="card bgTitle text-dark rounded border border-secondary p-1">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title text-center ms-1 my-2 fs-4">Suivie et annulation de vos demandes de formation</h2>
            </div>
            <!-- Suppression de la partie collapse pour rendre le tableau toujours visible -->
            <div class="card-body">
                <div class="table-responsive-lg">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Nom du cours</th>
                                <th scope="col" class="d-none d-md-table-cell">Description du cours</th>
                                <th scope="col">date du cours</th>
                                <th scope="col">Validation de l'inscription</th>
                                <th scope="col">Annuler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($afficherCours as $cour) : ?>
                                <tr class="text-center">
                                    <td><?= htmlspecialchars($cour['training_name']) ?></td>
                                    <td class="d-none d-md-table-cell"><?= htmlspecialchars($cour['training_description']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($cour['training_date'])) ?></td>
                                    <td><?= $cour['authorized_training'] ?  '<span class="text-success fw-bold fs-5"> Validée </span>'  : '<span class="text-danger fw-bold fs-5">En cours</span>' ?></td>
                                    <td>
                                        <?php if (!$cour['authorized_training'] && isset($cour['training_id'])) : ?>
                                            <form action="" method="post">
                                                <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId); ?>">
                                                <input type="hidden" name="training_id" value="<?= htmlspecialchars($cour['training_id']); ?>">
                                                <button class="btn btn-custom-cancel" type="submit" name="cancel">Annuler la pré-réservation</button>
                                            </form>
                                        <?php endif; ?>
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