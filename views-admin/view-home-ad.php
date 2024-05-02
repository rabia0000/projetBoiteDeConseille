<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../assets/style-ad.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">Innovéo</span>
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



            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard de <?= $_SESSION['admin']['admin_name'] ?></a></span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Nombre de formation réservées</span>
                        <span class="number"><?php if (!empty($nombreInscriptions)) : ?>
                                <span class="number"><?= $nombreInscriptions['Nombre_total_de_demande_de_formation']; ?></span>
                            <?php else : ?>
                                <p>0</p>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Prochaine formation à venir</span>
                        <span class="text-info"><?php if (!empty($displayUpcomingTraining)) : ?>
                                <span class="fs-4 my-3 p-2 "><?= date('d-m-Y', strtotime($displayUpcomingTraining[0]['training_date'])) . '    ' . $displayUpcomingTraining[0]['training_name']; ?></span>
                            <?php else : ?>
                                <p>Aucune demande de formation enregistrée.</p>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total des cours réussies</span>
                        <span class="number"><?php if (!empty($getNumberUserValidate)) : ?>
                                <span class="number"><?= $getNumberUserValidate[0]['training_finished'] ?></span>
                            <?php else : ?>
                                <span class="text">Aucune demande de formation enregistrée.</span>
                            <?php endif; ?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Analyse des activités</span>
                </div>
            </div>

            <div id="chartContainer" class="chart">
                <h3>Les cours les plus demandés</h3>
                <canvas id="myBarChart" class="mt-5"></canvas>
            </div>

            <!-- <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <span class="data-list">Prem Shahi</span>
                        <span class="data-list">Deepa Chand</span>
                        <span class="data-list">Manisha Chand</span>
                        <span class="data-list">Pratima Shahi</span>
                        <span class="data-list">Man Shahi</span>
                        <span class="data-list">Ganesh Chand</span>
                        <span class="data-list">Bikash Chand</span>
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <span class="data-list">premshahi@gmail.com</span>
                        <span class="data-list">deepachand@gmail.com</span>
                        <span class="data-list">prakashhai@gmail.com</span>
                        <span class="data-list">manishachand@gmail.com</span>
                        <span class="data-list">pratimashhai@gmail.com</span>
                        <span class="data-list">manshahi@gmail.com</span>
                        <span class="data-list">ganeshchand@gmail.com</span>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Joined</span>
                        <span class="data-list">2022-02-12</span>
                        <span class="data-list">2022-02-12</span>
                        <span class="data-list">2022-02-13</span>
                        <span class="data-list">2022-02-13</span>
                        <span class="data-list">2022-02-14</span>
                        <span class="data-list">2022-02-14</span>
                        <span class="data-list">2022-02-15</span>
                    </div>
                    <div class="data type">
                        <span class="data-title">Type</span>
                        <span class="data-list">New</span>
                        <span class="data-list">Member</span>
                        <span class="data-list">Member</span>
                        <span class="data-list">New</span>
                        <span class="data-list">Member</span>
                        <span class="data-list">New</span>
                        <span class="data-list">Member</span>
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                    </div>
                </div> -->

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../script-admin.js"></script>
    <script>
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
                responsive: true,
                maintainAspectRatio: false,
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
    </script>
</body>

</html>