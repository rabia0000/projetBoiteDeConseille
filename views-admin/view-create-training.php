<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un cours</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style-create.css">

</head>
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

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <!-- Brand -->
            <a href="../controllers-admin/controller-home-admin.php" class="btn btn-outline-success nav-btn mx-2 ">
                <i class="bi bi-arrow-left fs-5"></i>

            </a>
            <a class="navbar-brand fs-6 " href="../controllers-admin/controller-home-admin.php">Dashboard Administrateur de <?= $_SESSION['admin']['admin_name'] ?></a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li><button id="theme-toggle" class="btn btn-custom">Changer de thème</button><!-- Switch pour changer de thème -->
                    </li>
                    <!-- Ajouter plus de liens ici selon les besoins -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="nav-btns-container bg-dark">

        <a href="../controllers-admin/controller-display-modify-training.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-card-list fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Gérer vos formations</span>
        </a>
        <a href="../controllers-admin/controller-gestion-admin.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-calendar-check fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Gérer vos réservations</span>
        </a>
        <a href="../controllers-admin/controller-create-training.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-plus-lg fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Ajouter une formation</span>
        </a>
        <a href="../controllers-admin/controller-completed-training.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-check-circle fw-bold mx-1" title="Gérer les validations"></i>
            <span class="d-none d-md-inline">Gérer les validations de formation</span>
        </a>

        <a href="../controllers/controller-deconnexion.php" class="btn btn-outline-danger nav-btn ">
            <i class="bi bi-power fw-bold mx-1" title="Se déconnecter"></i>
            <span class="d-none d-md-inline">Se déconnecter</span>
        </a>
    </div>



    <div class="container text-center text-light">
        <h1 class="text-center text-light mt-5">Crée un cours</h1>
        <form action="../controllers-admin/controller-create-training.php" method="POST">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="form-group mt-4">
                        <label for="trainingType">
                            <h4>Type de formation</h4>
                        </label>
                        <select class="form-select fs-4 text-center transparent-input" name="trainingType" id="trainingType" required>
                            <option value="selected" selected class='text-dark'>Selectionner un type de cours</option>
                            <?php foreach ($trainingOfType as $type) { ?>
                                <option class="text-dark" value="<?= htmlspecialchars($type['type_id']) ?>"><?= htmlspecialchars($type['type_name']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>



            <div class="form-group row mt-4">
                <div class=col-md-6>
                    <label for="trainingName">
                        <h4>Nom de la formation</h4>
                    </label>
                    <input type="text" class="form-control transparent-input" id="trainingName" name="trainingName" value='' required>
                </div>

                <div class=col-md-6>
                    <label for="trainingDate">
                        <h4>Date du formation</h4>
                    </label>
                    <input type="date" class="form-control transparent-input" id="trainingDate" name="trainingDate" value='' required>
                </div>

            </div>

            <div class="form-group mt-4">
                <label for="trainingDescription">
                    <h4>Description de la formation</h4>
                </label>
                <textarea class="form-control transparent-input" id="trainingDescription" name="trainingDescription" value='' rows="3" required></textarea>
            </div>


            <div class="form-group row mt-4">
                <div class="col-md-6">
                    <label for="trainingMax">
                        <h4>Nombre maximum de participant </h4>
                    </label>
                    <input type="number" class="form-control transparent-input" id="trainingMax" name="trainingMax" value='' required>
                </div>
                <div class="col-md-6">
                    <label for="trainingUrl">
                        <h4>URL</h4>
                    </label>
                    <input type="text" class="form-control transparent-input" id="trainingUrl" name="trainingUrl" value='' required>
                </div>
            </div>

    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">

            <div class="form-group text-center text-light mt-4">
                <label for="trainingArchived">
                    <h4>Formation archivé ?</h4>
                </label>
                <select class="form-control transparent-input" id="trainingArchived" name="trainingArchived" value=''>
                    <option value="0" selected class='text-dark'>Non</option>
                    <option value="1">Oui</option>
                </select>
            </div>
        </div>
    </div>
    <?php if (isset($messageConfirmation)) : ?>
        <div class="alert alert-success" role="alert">
            <?= htmlspecialchars($messageConfirmation) ?>
        </div>
    <?php endif; ?>

    <?php if (isset($messageErreur)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($messageErreur) ?>
        </div>
    <?php endif; ?>

    </div>

    <div class="text-center mb-5">
        <button type="submit" class="btn btn-custom fw-semibold my-5 btn-lg">Ajouter le cours</button>

    </div>

    </form>
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


</body>

</html>