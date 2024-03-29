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
                    <li><button id="theme-toggle" class="btn btn-custom ms-2 my-2">Changer de thème</button><!-- Switch pour changer de thème -->
                    </li>
                    <!-- Ajouter plus de liens ici selon les besoins -->
                </ul>
            </div>
        </div>
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
    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="nbFormation col-lg-4 col-md-6 col-12 mt-3 p-2">
                <div class="bgTitle colorReserved text-center fw-bold mx-4 border border-secondary rounded">
                    <h5 class="">
                        <i class="bi bi-easel fs-1 mx-3"></i>Nombre de formation réservées :
                    </h5>

                    <?php if (!empty($displayReservedTraining)) : ?>
                        <span class="fs-2 text-success my-3"><?= $displayReservedTraining['nombre_de_reservation']; ?></span>
                    <?php else : ?>
                        <p>Aucune demande de formation enregistrée.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="nbFormation col-lg-4 col-md-6 col-12 mt-3 p-2">
                <div class="bgTitle colorValidate text-center fw-bold mx-4 border border-secondary rounded">
                    <h5 class=""><i class="bi bi-mortarboard fs-1 mx-3"></i> Nombre de formation validée : </h5>
                    <?php if (!empty($countCompletedTraining)) : ?>
                        <span class="fs-2 text-primary my-3"><?= $countCompletedTraining[0]['nombre_de_formation_validé']; ?></span>
                    <?php else : ?>
                        <p>Aucune demande de formation enregistrée.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="nbFormation col-lg-4 col-md-6 col-12 mt-3 p-2">
                <div class="bgTitle colorTrain text-center fw-bold mx-4 border border-secondary rounded pb-3">
                    <h5 class=""><i class="bi bi-person-workspace fs-1 mx-3"></i>Prochaine formation à venir : </h5>
                    <?php if (!empty($displayUpCommingTraining)) : ?>
                        <span class="fs-4 my-3 p-2 text-warning-emphasis"><?= date('d-m-Y', strtotime($displayUpCommingTraining[0]['training_date'])) . '    ' . $displayUpCommingTraining[0]['training_name']; ?></span>
                    <?php else : ?>
                        <p>Aucune demande de formation enregistrée.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>






    <!-- Bloc Note -->
    <div class="container-fluid mb-2 ">
        <div class="d-flex row justify-content-left">
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-md-0">
                <div id="noteContainer" class="bloc bgTitle text-center border border-secondary rounded justify-content-center mx-auto">
                    <h3 class="bgTitle fs-4 text-center mx-4 p-2 my-2">Mes notes</h3>
                    <textarea id="mesNotes" class="form-control my-3" rows="10">Contenu de votre bloc note...</textarea>
                    <button onclick="sauvegarderNote()" class="btn btn-custom my-3 align-self-center ">Sauvegarder la note</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableaux -->


    <script src="../scriptUser.js"></script>

    <!-- Bootstrap Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>