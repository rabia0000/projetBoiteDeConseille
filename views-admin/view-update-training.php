<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une formation</title>
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

            <a class="navbar-brand fs-6 ms-2" href="../controllers-admin/controller-home-admin.php">Dashboard Administrateur de <?= $_SESSION['admin']['admin_name'] ?></a>
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
    <div class="nav-btns-container">

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
        <h1 class="text-center text-light my-5">Modifier une formation</h1>
        <form action="controller-update-training.php" method="POST">

            <input type="hidden" name="training_id" value="<?= $trainingInfos['training_id'] ?? '' ?>">

            <div class="form-group">
                <label for="trainingType">
                    <h4>Type de formation :</h4>
                </label>
                <select class="form-control transparent-input mb-2" name="training_type" id="trainingType" required>
                    <option value="">Sélectionner un type de formation</option>
                    <?php foreach ($trainingt as $type) { ?>
                        <option value="<?= htmlspecialchars($type['type_id']) ?>" <?= (isset($trainingType) && $trainingType == $type['type_id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($type['type_name']) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group row mt-4">
                <div class="col-md-6">
                    <label for="trainingName">
                        <h4>Nom de la formation:</h4>
                    </label>
                    <input type="text" class="form-control transparent-input mb-3" id="trainingName" name="training_name" value="<?= $trainingInfos['training_name'] ?? '' ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="trainingDate">
                        <h4>Date de formation</h4>
                    </label>
                    <input type="date" class="form-control transparent-input" id="trainingDate" name="training_date" value="<?= $trainingInfos['training_date'] ?? '' ?>" required>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="trainingDescription">
                    <h4>Description:</h4>
                </label>
                <textarea class="form-control transparent-input" id="trainingDescription" name="training_description" rows="3" required><?= $trainingInfos['training_description'] ?? '' ?></textarea>
            </div>

            <div class="form-group row mt-5">
                <div class="col-md-6">
                    <label for="trainingMax">
                        <h4>Nombre de participants maximum:</h4>
                    </label>
                    <input type="number" class="form-control transparent-input" id="trainingMax" name="training_max" value="<?= $trainingInfos['training_max'] ?? '' ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="trainingUrl">
                        <h4>URL de formation:</h4>
                    </label>
                    <input type="text" class="form-control transparent-input" id="trainingUrl" name="training_url" value="<?= $trainingInfos['training_name'] ?? '' ?>" required>
                </div>
            </div>

            <div class="form-group mt-5">
                <label for="trainingArchived">
                    <h4>Formation archivée ?</h4>
                </label>
                <select class="form-control transparent-input" id="trainingArchived" name="training_archived" required>
                    <option value="0" <?= isset($trainingInfos['training_archived']) && !$trainingInfos['training_archived'] ? 'selected' : '' ?>>Non</option>
                    <option value="1" <?= isset($trainingInfos['training_archived']) && $trainingInfos['training_archived'] ? 'selected' : '' ?>>Oui</option>
                </select>
            </div>

            <div class="text-center mt-4">
                <button type="submit" name="update" class="btn btn-custom fw-semibold btn-lg">Modifier</button>
            </div>
        </form>
        <a href="../controllers-admin/controller-home-admin.php">
            <button type="submit" class="btn btn-lg">Annuler</button>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Modal de Confirmation -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    La formation a été modifiée avec succès.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['ajoutReussi']) && $_SESSION['ajoutReussi']) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                confirmationModal.show();

                // Écouter l'événement de fermeture du modal
                document.getElementById('confirmationModal').addEventListener('hidden.bs.modal', function(event) {
                    window.location.href = 'controller-display-modify-training.php'; // Redirigez vers la page souhaitée ici
                });
            });
        </script>
        <?php
        // Réinitialiser ou supprimer la variable de session après l'affichage du modal
        unset($_SESSION['ajoutReussi']);
        ?>
    <?php endif; ?>


</body>

</html>