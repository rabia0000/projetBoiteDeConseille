<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../assets/style-admin-delete.css">

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
            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Vos formations complétées</span>
                </div>
            </div>
            <div class="table-container">
                <div class="responsive-table">
                    <table class="bg-light">
                        <thead>
                            <tr>
                                <th class="text-center">Nom de la formation</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Date de la formation</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($displayCompletedTraining as $train) : ?>
                                <tr>
                                    <td class="link-name text-dark text-center"><?= htmlspecialchars($train['training_name']) ?></td>
                                    <td class="link-name text-dark text-center"><?= htmlspecialchars($train['training_description']) ?></td>
                                    <td class="link-name text-dark text-center"><?= date('d-m-Y', strtotime($train['training_date'])) ?></td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../script-admin.js"></script>
    <!-- <script src="../scriptUser.js"></script> -->

</body>

</html>