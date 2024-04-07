<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../assets/style-form.css">
    <!-- <link rel="stylesheet" href="../assets/style.css"> -->

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

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

        </div>
        <div class="dash-content">
            <div class="">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Ajouter une formation</a></span>
                </div>
                <div class="form-content">

                    <form method="POST" action="../controllers-admin/controller-create-training.php" novalidate>
                        <div class="input-form text">
                            <label for="trainingType">
                                <h6>Type de formation</h6>
                            </label>
                            <select class="" name="trainingType" id="trainingType" required>
                                <option value="selected" selected class='text-dark'>Selectionner un type de cours</option>
                                <?php foreach ($trainingOfType as $type) { ?>
                                    <option class="text-dark" value="<?= htmlspecialchars($type['type_id']) ?>"><?= htmlspecialchars($type['type_name']) ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-form text ">
                            <label for="trainingName">
                                <h6>Nom de la formation</h6>
                            </label>
                            <input type="text" class="form-control transparent-input" id="trainingName" name="trainingName" required>
                        </div>

                        <div class="input-form text">
                            <label for="trainingDate">
                                <h6>Date de la formation</h6>
                            </label>
                            <input type="date" class="form-control transparent-input" id="trainingDate" name="trainingDate" required>
                        </div>

                        <div class="input-form text">
                            <label>
                                <h6>Description</h6>
                            </label>
                            <textarea class="form-control transparent-input" id="trainingDescription" name="trainingDescription" value='' rows="3" required></textarea>
                        </div>

                        <div class="input-form  text">
                            <label>
                                <h6>Nombre de place</h6>
                            </label>
                            <input type="number" class="form-control transparent-input" id="trainingMax" name="trainingMax" value='' required>
                        </div>

                        <div class="input-form text">
                            <label for="trainingUrl">
                                <h6>URL</h6>
                            </label>
                            <input type="text" class="form-control transparent-input" id="trainingUrl" name="trainingUrl" value='' required>
                        </div>
                        <!-- <div class="input-form text">
                            <label for="trainingArchived">
                                <h6>Formation archivé ?</h6>
                            </label>
                            <select class="form-control transparent-input" id="trainingArchived" name="trainingArchived" value=''>
                                <option value="0" selected>Non</option>
                                <option value="1">Oui</option>
                            </select>
                        </div> -->

                        <button type="submit">Ajouter la formation</button>
                    </form>
                </div>
            </div>
            <?php if (isset($_SESSION['ajoutReussi']) && $_SESSION['ajoutReussi']) : ?>
                <script>
                    document.addEventListener('DOMContentLoaded', (event) => {
                        var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                        confirmationModal.show();
                    });
                </script>
                <?php
                // N'oubliez pas de réinitialiser ou supprimer la variable de session pour éviter que le modal s'affiche de nouveau après un rafraîchissement de la page.
                unset($_SESSION['ajoutReussi']);
                ?>
            <?php endif; ?>

    </section>

    <!-- 
    <script src="../script-admin.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Modal de Confirmation -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Cours ajouté</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Votre cours a bien été ajouté.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>