<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../assets/style-ad.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
    <style>
        /* supprime les marges et paddings des éléments de la liste */
        ul.nav-links,
        ul.logout-mode,
        li {
            margin: 0;
            padding: 0;
            list-style-type: none;
            /* Supprime les puces des listes */
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">Innovéo Conseil</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../controllers/controller-home.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="../controllers/controller-booking.php">
                        <i class="bi bi-plus-lg"></i>
                        <span class="link-name">Réserver une formation</span>
                    </a></li>
                <li><a href="../controllers/controller-modify.php">
                        <i class="bi bi-pencil-square"></i>
                        <span class="link-name">Voir vos formations réservées</span>
                    </a></li>
                <li><a href="../controllers/controller-completed-training.php">
                        <i class="bi bi-mortarboard"></i>
                        <span class="link-name">Voir vos formations complétées</span>
                    </a></li>
                <li><a href="">
                        <i class="bi bi-book"></i>
                        <span class="link-name">Accéder au cours en ligne</span>
                    </a></li>
                <!-- <li><a href="#">
                        <i class="uil uil-share"></i>
                        <span class="link-name">Share</span>
                    </a></li> -->
            </ul>
            <ul class="logout-mode">
                <li><a href="#">
                        <i class="bi bi-gear"></i>
                        <span class="link-name">Réglages</span>
                    </a></li>

                <ul class="logout-mode">
                    <li><a href="../controllers/controller-deconnexion.php">
                            <i class="uil uil-signout"></i>
                            <span class="link-name">Logout</span>
                        </a></li>

                    <li class="mode">
                        <a href="#">
                            <i class="uil uil-moon"></i>
                            <span class="link-name">Dark Mode</span>
                        </a>

                        <div class="mode-toggle">
                            <span class="switch"></span>
                        </div>
                    </li>
                </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard de <?= $_SESSION['user']['user_firstname'] ?></a></span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Nombre de formation réservées</span>
                        <span class="number"><?php if (!empty($displayReservedTraining)) : ?>
                                <span class=""><?= $displayReservedTraining['nombre_de_reservation']; ?></span>
                            <?php else : ?>
                                <p>Aucune demande de formation enregistrée.</p>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Nombre de formation validée</span>
                        <span class="text-info"><?php if (!empty($countCompletedTraining)) : ?>
                                <span class="number"><?= $countCompletedTraining[0]['nombre_de_formation_validé']; ?></span>
                            <?php else : ?>
                                <p>Aucune demande de formation enregistrée.</p>
                            <?php endif; ?>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Prochaine formation à venir</span>
                        <span class="number"> <?php if (!empty($displayUpCommingTraining)) : ?></span>
                        <span class="fs-4 my-3 p-2 text-warning-emphasis"><?= date('d-m-Y', strtotime($displayUpCommingTraining[0]['training_date'])) . '    ' . $displayUpCommingTraining[0]['training_name']; ?></span>
                    <?php else : ?>
                        <p>Aucune demande de formation enregistrée.</p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Widget</span>
                </div>
            </div>

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



        </div>
    </section>

    <script src="../script-admin.js"></script>
    <!-- <script src="../scriptUser.js"></script> -->

</body>

</html>