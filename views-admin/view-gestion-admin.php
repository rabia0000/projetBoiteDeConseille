<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard gestion</title>
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


<body>

    <!-- Navbar -->

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
                    <span class="text">Nombre de place restante par formation</a></span>
                </div>

                <table>
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

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Rechercher par type</span>
                </div>

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

                <div class="activity">
                    <div class="title">
                        <i class="uil uil-clock-three"></i>
                        <span class="text">Rechercher par type</span>
                    </div>
                    <table class="table ">
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
                    <!-- <div class="table-container">
                    <div class="responsive-table">
                        <table>
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
                                        <td class="link-name text-center"><?= date('d-m-Y', strtotime($cour['training_date'])) ?></td>
                                        <td class="link-name text-center"><?= htmlspecialchars($cour['training_name']) ?></td>
                                        <td class="none link-name  text-center"><?= htmlspecialchars($cour['training_description']) ?></td>
                                        <td class="link-name text-center"><?= htmlspecialchars($cour['training_max']) ?></td>
                                        <td class="">
                                            <div class="btn-group">
                                                <form action="../controllers-admin/controller-update-training.php" method="POST" class="button-form">
                                                    <input type="hidden" name="training_id" value="<?= $cour['training_id'] ?>">
                                                    <button type="submit" class="btn btn-custom">Modifier</button>
                                                </form>

                                                <form action="../controllers-admin/controller-display-modify-training.php" method="POST" class="button-form">
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



    <!-- <div class="container-fluid">

        <div class="card text-light mb-3 p-3 text-dark">
            <div class="title fs-4"><i class="bi bi-calendar-check ms-3 me-3"></i>Gérer les réservations</div>
            <div class="title mt-4 fs-3 text-center">Formations, nombre de place restant</div>
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
        </div> -->

    <!-- <div class="card text-light mb-5 text-dark">
            <div class="pt-2">
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
            </div> -->

    <!-- <div class="card text-light text-dark">
                <div class="card-header text-center fs-3">Demande de formation</div>

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
    </div> -->
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>