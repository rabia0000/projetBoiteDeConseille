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



    <!-- TABLEAU DES COURS DISPONIBLE -->
    <div class="container-fluid my-5 pt-1">
        <div class="table-one bgTitle text-dark rounded border border-secondary p-1 border border-dark mt-5">
            <h2 class="text-left ms-2 my-2 bgTitle p-1 rounded fs-4"><i class="bi bi-card-list fw-bold  fs-4 mx-2"></i>Vos Formations</h2>
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
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>