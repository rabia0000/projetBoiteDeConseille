<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-réservation de cours</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styleUser/style-home.css">

    <link rel="stylesheet" href="../assets/style.css">
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
</head>

<body>

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
                    <li><button id="theme-toggle" class="btn btn-custom ms-2 my-2">Changer de thème</button><!-- Switch pour changer de thème -->
                    </li>
                    <!-- Ajouter plus de liens ici selon les besoins -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="nav-btns-container bg-dark">
        <a href="../controllers/controller-modify.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-pencil-square fw-bold mx-1" title="Gérer les validations"></i>
            <span class="d-none d-md-inline">Modifier vos réservations</span>
        </a>
        <a href="../controllers/controller-booking.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-plus-lg fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Réserver une formation en présentiel</span>
        </a>
        <a href="../controllers/controller-completed-training.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-calendar-check fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Vos formations Validées</span>
        </a>
        <a href="" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-mortarboard fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Accéder au cours en ligne</span>
        </a>
        <a href="../controllers/controller-deconnexion.php" class="btn btn-outline-danger nav-btn ">
            <i class="bi bi-power fw-bold mx-1" title="Se déconnecter"></i>
            <span class="d-none d-md-inline">Se déconnecter</span>
        </a>
    </div>

    <div class="container-fluid">
        <div class="card-header text-dark text-center fs-1 ">Cours en présentiel :</div>
        <div class="card-body">
            <h3 class='text-center text-dark'>Liste des cours</h3>
            <div class="card-transparent">
                <div class="table-responsive-lg" style="max-height: 400px; overflow-y: auto;">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Nom du cours</th>
                                <th class="d-none d-md-table-cell">Description</th>
                                <th>Date</th>
                                <th>Places maximales</th>
                                <th class="d-none d-md-table-cell">Type</th>
                                <th>Archivé</th>
                                <th>Action</th> <!-- Colonne pour les actions comme réserver -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cours as $cour) : ?>
                                <tr class="text-center">
                                    <td><?= htmlspecialchars($cour['training_name']) ?></td>
                                    <td class="d-none d-md-table-cell"><?= htmlspecialchars($cour['training_description']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($cour['training_date'])) ?></td>
                                    <td><?= htmlspecialchars($cour['training_max']) ?></td>
                                    <td class="d-none d-md-table-cell"><?= htmlspecialchars($cour['type_de_cours']) ?></td>
                                    <td><?= $cour['training_archived'] ? 'Oui' : 'Non' ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId); ?>">
                                            <input type="hidden" name="training_id" value="<?= htmlspecialchars($cour['training_id']); ?>">
                                            <button class="btn btn-outline-success ms-2 btn-sm" type="submit">Pré-réserver ce cours</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class=" align-items-center justify-content-center">
        <?php if (!empty($confirmationMessage)) : ?>
            <p class='text-center text-danger fw-bolder fs-4'><?= $confirmationMessage; ?></p>
        <?php endif; ?>
    </div>



    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>