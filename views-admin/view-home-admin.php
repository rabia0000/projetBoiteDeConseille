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
            background-color: rgba(128, 128, 128, 0.5);
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
    <div class="nav-btns-container bg-dark">

        <a href="../controllers-admin/controller-display-modify-training.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-card-list fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Vos formations</span>
        </a>
        <a href="../controllers-admin/controller-gestion-admin.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-calendar-check fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Gérer Réservations</span>
        </a>
        <a href="../controllers-admin/controller-create-training.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-plus-lg fw-bold mx-1"></i>
            <span class="d-none d-md-inline">Ajouter une formation</span>
        </a>
        <a href="../controllers-admin/controller-completed-training.php" class="btn btn-outline-light nav-btn ">
            <i class="bi bi-check-circle fw-bold mx-1" title="Gérer les validations"></i>
            <span class="d-none d-md-inline">Gérer Validations</span>
        </a>

        <a href="../controllers/controller-deconnexion.php" class="btn btn-outline-danger nav-btn ">
            <i class="bi bi-power fw-bold mx-1" title="Se déconnecter"></i>
            <span class="d-none d-md-inline">Se déconnecter</span>
        </a>
    </div>





    <!-- Nouvelle colonne pour le nombre de demandes de formation -->
    <div class="container-fluid">
        <div class="row">
            <div class="nbFormation col-lg-4 col-md-6 col-12 mt-3 p-2">
                <div class="Card-one bgTitle text-center fw-bold mx-4 border border-secondary rounded">
                    <h5 class="fw-bold">Demande de Formation</h5>
                    <?php if (!empty($nombreInscriptions)) : ?>
                        <span class="fs-2 my-3"><?= $nombreInscriptions[0]['Nombre total de demande de formation']; ?></span>
                    <?php else : ?>
                        <p>Aucune demande de formation enregistrée.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="nbFormation col-lg-4 col-md-6 col-12 mt-3 p-2">
                <div class="Card-two bgTitle text-center fw-bold mx-4 border border-secondary rounded pb-3">
                    <h5 class="fw-bold">Prochaine formation à venir : </h5>
                    <?php if (!empty($displayUpcomingTraining)) : ?>
                        <span class="fs-4 my-3 p-2 "><?= date('d-m-Y', strtotime($displayUpcomingTraining[0]['training_date'])) . '    ' . $displayUpcomingTraining[0]['training_name']; ?></span>
                    <?php else : ?>
                        <p>Aucune demande de formation enregistrée.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="nbFormation col-lg-4 col-md-6 col-12 mt-3 p-2">
                <div class="Card-three bgTitle text-center fw-bold mx-4 border border-secondary rounded">
                    <h5 class="fw-bold">Nombre total de formation Validée : </h5>
                    <?php if (!empty($getNumberUserValidate)) : ?>
                        <span class="fs-2  my-3"><?= $getNumberUserValidate[0]['training_finished'] ?></span>
                    <?php else : ?>
                        <p>Aucune demande de formation enregistrée.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>


    <div class="container-fluid pb-3 mb-3">
        <div class="d-flex row justify-content-center">


            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-md-0">
                <div id="chartContainer" class="text-center border border-secondary custom-height justify-content-center mx-auto">
                    <h3 class="bgTitle fs-4 text-center fw-bold p-2 mt-3 rounded">Nombre de Réservation par type de cours</h3>
                    <canvas id="myDoughnutChart"></canvas>
                </div>
            </div>

            <!-- BLOC NOTE -->
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-md-0">
                <div id="noteContainer" class="bloc text-center border border-secondary justify-content-center mx-auto">
                    <h3 class="bgTitle fs-4 text-center fw-bold p-2 my-2 rounded">Bloc Note</h3>
                    <textarea id="mesNotes" class="form-control my-3" rows="10">Contenu de votre bloc note...</textarea>
                    <button onclick="sauvegarderNote()" class="btn btn-custom mt-2 align-self-center">Sauvegarder la note</button>
                </div>
            </div>



            <!-- graphique en bar sur les cours les plus demandé  -->
            <div class="col-lg-4 col-md-6 col-12 mb-md-0 ">

                <div id="chartContainer" class="text-center border border-secondary justify-content-center mx-auto">
                    <h3 class="bgTitle fs-4 text-center fw-bold p-2 mt-3 rounded">Les cours les plus demandé</h3>
                    <canvas id="myBarChart" class="mt-5"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLEAU DES COURS DISPONIBLE -->
    <!-- <div class="container-fluid mb-3">
        <div class="bgTitle text-dark rounded border border-secondary p-1">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="bgTitle text-left mx-2 my-2 p-1 fs-4 rounded"><i class="bi bi-person-lines-fill fs-2 mx-3"></i> Liste des employés</h2>
                <button class="btn btn-custom me-2" type="button" data-bs-toggle="collapse" data-bs-target="#listeCours" aria-expanded="false" aria-controls="listeCours">
                    <i class="bi bi-chevron-down"></i>
                </button>
            </div>
            <div class="collapse" id="listeCours">
                <div class="card-body">
                    <div class="table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">nom de l'employer</th>
                                    <th scope="col">Prenom de l'employe</th>
                                    <th scope="col">Email de l'employer</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($displayUsers as $user) : ?>
                                    <tr class="text-center">
                                        <td><?= htmlspecialchars($user['user_lastname']) ?></td>
                                        <td><?= htmlspecialchars($user['user_firstname']) ?></td>
                                        <td><?= htmlspecialchars($user['user_mail']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

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


    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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




        //theme dark and light 
        const themeToggle = document.getElementById('theme-toggle');
        const currentTheme = localStorage.getItem('theme');

        if (currentTheme) {
            document.documentElement.setAttribute('data-theme', currentTheme);

            if (currentTheme === 'dark') {
                themeToggle.textContent = "Passer au mode clair";
            }
        }

        themeToggle.addEventListener('click', function() {
            let theme = document.documentElement.getAttribute('data-theme');

            if (theme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
                themeToggle.textContent = "Passer au mode sombre";
            } else {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
                themeToggle.textContent = "Passer au mode clair";
            }
        });




        //graphique : 
        var labels = <?php echo json_encode($typesDeCours); ?>;
        var data = <?php echo json_encode($nombreDePreInscriptions); ?>;

        var ctx = document.getElementById('myDoughnutChart').getContext('2d');
        var myDoughnutChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de pré-inscription par type de cours',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(193, 153, 247)',
                        'rgb(205, 245, 242)'

                    ],

                    borderColor: 'rgba(0, 0, 0, 1)', // Couleur noire pour les bordures
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right', // Place la légende à droite
                        labels: {
                            color: 'black',
                            font: {
                                weight: 'bold',
                                size: 15,

                            },
                            boxWidth: 40, // Largeur de la boîte de couleur de la légende
                            padding: 40, // Espacement autour de chaque label
                        }

                    }


                },
            }
        });
        //  chart bar
        var labels = <?php echo json_encode($nameTraining); ?>;
        var data = <?php echo json_encode($nomberInscrption); ?>;

        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de demande de formation',
                    data: data,
                    // Configurations de couleurs, bordures, etc.
                    backgroundColor: [
                        'rgba(153, 102, 255)',
                        'rgba(54, 162, 235, )',
                        'rgba(255, 206, 86, )',
                        'rgba(255, 99, 132)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'black' // Définit la couleur des labels des ticks sur l'axe Y en noir
                        },
                        grid: {
                            color: 'black' // Définit la couleur des lignes de la grille de l'axe Y en noir
                        }
                    },
                    x: {
                        ticks: {
                            color: 'black' // Définit la couleur des labels des ticks sur l'axe X en noir
                        },
                        grid: {
                            color: 'black' // Définit la couleur des lignes de la grille de l'axe X en noir
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'black' // Définit la couleur des labels de la légende en noir
                        }
                    }
                }
            }

        });

        // Charger la note sauvegardée lorsque la page est chargée
        window.onload = function() {
            if (localStorage.getItem("note")) {
                document.getElementById("mesNotes").value = localStorage.getItem("note");
            }
        };

        // Fonction pour sauvegarder la note
        function sauvegarderNote() {
            var note = document.getElementById("mesNotes").value;
            localStorage.setItem("note", note);
            alert("Note sauvegardée !");
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>