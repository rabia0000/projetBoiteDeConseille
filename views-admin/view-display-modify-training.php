<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">


    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../assets/style-admin-delete.css">


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
                <li><a href="../controllers-admin/controller-home-admin.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <li><a href="../controllers-admin/controller-create-training.php">
                        <i class="bi bi-plus-lg"></i>
                        <span class="link-name">Ajouter une formation</span>
                    </a></li>
                <li><a href="../controllers-admin/controller-display-modify-training.php">
                        <i class="bi bi-pencil-square"></i>
                        <span class="link-name">Modifier ou supprimer une formation</span>
                    </a></li>
                <li><a href="../controllers-admin/controller-gestion-admin.php">
                        <i class="bi bi-calendar-check"></i>
                        <span class="link-name">Gérer les demandes de réservations</span>
                    </a></li>
                <li><a href="../controllers-admin/controller-completed-training.php">
                        <i class="bi bi-mortarboard"></i>
                        <span class="link-name">Certifier les formations</span>
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
    <!-- <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard de <?= $_SESSION['admin']['admin_name'] ?></a></span>
                </div>
            </div>

        </div>
        <div class="table-container">
            <div class="responsive-table">
          
    </div>
    </div>
    </section> -->

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard de <?= $_SESSION['admin']['admin_name'] ?></a></span>
                </div>


            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>
                <div class="table-container">
                    <div class="responsive-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Date du cours</th>
                                    <th>Nom du cours</th>
                                    <th class="d-none">Description</th>
                                    <th>Participants max</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($afficherCours as $cour) : ?>
                                    <tr>
                                        <td class="link-name"><?= date('d-m-Y', strtotime($cour['training_date'])) ?></td>
                                        <td class="link-name"><?= htmlspecialchars($cour['training_name']) ?></td>
                                        <td class="link-name d-none"><?= htmlspecialchars($cour['training_description']) ?></td>
                                        <td class="link-name"><?= htmlspecialchars($cour['training_max']) ?></td>
                                        <td>
                                            <div>
                                                <form action="../controllers-admin/controller-update-training.php" method="POST" class="mb-2 mb-md-0 me-md-2">
                                                    <input type="hidden" name="training_id" value="<?= $cour['training_id'] ?>">
                                                    <button type="submit" class="btn btn-custom">Modifier</button>
                                                </form>
                                                <form action="../controllers-admin/controller-confirmationDelete.php" method="POST">
                                                    <input type="hidden" name="training_id" value="<?= $cour['training_id'] ?>">
                                                    <button type="button" class="btn btn-custom-cancel" data-bs-toggle="modal" data-bs-target="#confirmationModal" data-training-id="<?= $cour['training_id'] ?>" data-course-name="<?= htmlspecialchars($cour['training_name']) ?>">Supprimer</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tr>
                                <!-- Additional rows as needed -->
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
    </section>
    <script src="../script-admin.js"></script>
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>