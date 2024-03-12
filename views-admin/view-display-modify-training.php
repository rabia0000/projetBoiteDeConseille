<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style-home-dash.css">

    <style>
        .modal-content {
            background-color: rgba(255, 255, 255, 0.6);
            /* Transparence du modal */
            backdrop-filter: blur(30px);
            /* Effet de flou optionnel */
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand fs-4" href="../controllers-admin/controller-home-admin.php">Dashboard Administrateur de <?= $_SESSION['admin']['admin_name'] ?></a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light fs-6" aria-current="page" href="../controllers-admin/controller-display-modify-training.php">Afficher/modifier une formation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fs-6" aria-current="page" href="../controllers-admin/controller-create-training.php">Créer une formation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fs-6" href="../controllers-admin/controller-gestion-admin.php">Gérer les réservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fs-6" href="../controllers-admin/controller-completed-training.php">Gérer les validations de formation</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-danger fs-6" href="../controllers/controller-deconnexion.php">Déconnexion</a>
                    </li>

                    <li><button id="theme-toggle" class="btn btn-custom ms-2 my-2">Changer de thème</button><!-- Switch pour changer de thème -->
                    </li>
                    <!-- Ajouter plus de liens ici selon les besoins -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- TABLEAU DES COURS DISPONIBLE -->
    <div class="container-fluid my-3">
        <div class="table-one bgTitle text-dark rounded border border-secondary p-1">
            <h2 class="text-left ms-2 my-2 bgTitle p-1 rounded fs-4"><i class="bi bi-person-workspace fs-4 mx-2"></i>Vos Cours Disponibles</h2>
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-body">
                    <div class="table-responsive-lg">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Date du cours</th>
                                    <th scope="col">Nom du cours</th>
                                    <th scope="col" class="d-none d-md-table-cell">Description</th>
                                    <th scope="col">Participants max</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($afficherCours as $cour) : ?>
                                    <tr class="text-center">
                                        <td><?= date('d-m-Y', strtotime($cour['training_date'])) ?></td>
                                        <td><?= htmlspecialchars($cour['training_name']) ?></td>
                                        <td class="d-none d-md-table-cell"><?= htmlspecialchars($cour['training_description']) ?></td>
                                        <!-- <td><?= htmlspecialchars($cour['training_url']) ?></td> -->
                                        <td><?= htmlspecialchars($cour['training_max']) ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-wrap flex-md-nowrap">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmation -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center" id="modalLabel">Confirmation de Suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-danger">
                    Êtes-vous sûr de vouloir supprimer le cours : <span id="courseName" class="fw-bold text-danger"></span> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Annuler</button>
                    <form id="deleteForm" action="../controllers-admin/controller-confirmationDelete.php" method="POST">
                        <input type="hidden" name="trainingId" id="trainingId" value="">
                        <button type="submit" name="delete" class="btn btn-custom-cancel">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // modal de confirmation : 
        document.addEventListener('DOMContentLoaded', (event) => {
            var confirmationModal = document.getElementById('confirmationModal');
            confirmationModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Bouton qui a déclenché le modal
                var trainingId = button.getAttribute('data-training-id'); // Récupère l'ID du cours
                var courseName = button.getAttribute('data-course-name'); // Récupère le nom du cours
                var form = document.getElementById('deleteForm'); // Trouve le formulaire de suppression
                form.trainingId.value = trainingId; // Met à jour la valeur de l'input caché avec l'ID du cours
                document.getElementById('courseName').textContent = courseName; // Insère le nom du cours dans le modal
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>