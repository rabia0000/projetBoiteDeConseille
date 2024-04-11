<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">


    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../assets/style-admin-delete.css">

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
                <li><a href="../controllers-admin/controller-home-admin.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="../controllers-admin/controller-create-training.php">
                        <i class="bi bi-plus-lg"></i>
                        <span class="link-name">Ajouter une formation</span>
                    </a></li>
                <li><a href="../controllers-admin/controller-display-modify-training.php">
                        <i class="bi bi-pencil-square"></i>
                        <span class="link-name">Gestion des formations</span>
                    </a></li>
                <li><a href="../controllers-admin/controller-gestion-admin.php">
                        <i class="bi bi-calendar-check"></i>
                        <span class="link-name">Gérer les demandes de réservations</span>
                    </a></li>
                <li><a href="../controllers-admin/controller-completed-training.php">
                        <i class="bi bi-mortarboard"></i>
                        <span class="link-name">Certifier les formations</span>
                    </a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="../controllers/controller-deconnexion.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
                <li class="mode"><a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>
                    <div class="mode-toggle"><span class="switch"></span></div>
                </li>
            </ul>
        </div>
    </nav>

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
                    <span class="text">Dashboard de <?= $_SESSION['admin']['admin_name'] ?></span>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Gestion des formations</span>
                </div>
                <div class="table-container">
                    <div class="responsive-table">
                        <table class="bg-light">
                            <thead>
                                <tr>
                                    <th class="text-center">Date du cours</th>
                                    <th class="text-center">Nom du cours</th>
                                    <th class="none text-center">Description</th>
                                    <th class="text-center">Participants max</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($afficherCours as $cour) : ?>
                                    <tr>
                                        <td class="link-name text-center text-dark"><?= date('d-m-Y', strtotime($cour['training_date'])) ?></td>
                                        <td class="link-name text-center text-dark"><?= htmlspecialchars($cour['training_name']) ?></td>
                                        <td class="none link-name text-center text-dark"><?= htmlspecialchars($cour['training_description']) ?></td>
                                        <td class="link-name text-center text-dark"><?= htmlspecialchars($cour['training_max']) ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="../controllers-admin/controller-update-training.php?training_id=<?= $cour['training_id'] ?>" class="btn btn-outline-dark">Modifier</a>
                                                <!-- Bouton qui ouvre le modal de suppression spécifique -->
                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $cour['training_id'] ?>">Supprimer</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal de confirmation de suppression pour ce cours spécifique -->
                                    <div class="modal fade" id="modalDelete<?= $cour['training_id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $cour['training_id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirmation de Suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir supprimer le cours : <strong><?= htmlspecialchars($cour['training_name']) ?></strong> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="../controllers-admin/controller-display-modify-training.php" method="POST">
                                                        <input type="hidden" name="trainingId" value="<?= $cour['training_id'] ?>">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</body>

<script src="../script-admin.js"></script>
<!-- <script src="../script.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>