<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/styleUser/style-home.css">

</head>

<body>

    <!-- nav  -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand fs-4" href="../controllers/controller-home.php">Dashboard Administrateur de <?= $_SESSION['user']['user_firstname'] ?></a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="../controllers/controller-booking.php" class="nav-link text-light fs-6">Réserver un cours en présentiel</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-light fs-6">Accèder au cours en ligne</a>
                    </li>
                    <li class="nav-item">
                        <a href="../controllers/controller-completed-training.php" class="nav-link text-light fs-6">Formations Validées</a>
                    </li>
                    <li class="nav-item ">
                        <a href="../controllers/controller-deconnexion.php" class="nav-link text-danger fs-6">Déconnexion</a>
                    </li>
                    <li><button id="theme-toggle" class="btn btn-custom ms-2 my-2">Changer de thème</button><!-- Switch pour changer de thème -->
                    </li>
                    <!-- Ajouter plus de liens ici selon les besoins -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid my-3">
        <div class="card bgTitle text-dark rounded border border-secondary p-1">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title text-center ms-1 my-2 fs-4">Suivie et annulation de vos demandes de formation</h2>
                <button class="btn btn-custom" type="button" data-bs-toggle="collapse" data-bs-target="#formationValidées" aria-expanded="false" aria-controls="formationValidées">
                    <i class="bi bi-chevron-down"></i>
                </button>
            </div>
            <div class="collapse" id="formationValidées">
                <div class="card-body">
                    <div class="table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Nom du cours</th>
                                    <th scope="col" class="d-none d-md-table-cell">Description du cours</th>
                                    <th scope="col">date du cours</th>
                                    <th scope="col">Validation de l'inscription</th>
                                    <th scope="col">Annuler</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($afficherCours as $cour) : ?>
                                    <tr class="text-center">
                                        <td><?= htmlspecialchars($cour['training_name']) ?></td>
                                        <td class="d-none d-md-table-cell"><?= htmlspecialchars($cour['training_description']) ?></td>
                                        <td><?= date('d-m-Y', strtotime($cour['training_date'])) ?></td>
                                        <td><?= $cour['authorized_training'] ?  '<span class="text-success fw-bold fs-5"> Validée </span>'  : '<span class="text-danger fw-bold fs-5">En cours</span>' ?></td>
                                        <td>
                                            <?php if (!$cour['authorized_training'] && isset($cour['training_id'])) : ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId); ?>">
                                                    <input type="hidden" name="training_id" value="<?= htmlspecialchars($cour['training_id']); ?>">
                                                    <button class="btn btn-custom-cancel" type="submit" name="cancel">Annuler la pré-réservation</button>
                                                </form>
                                            <?php endif; ?>
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

    <div class="container-fluid">
        <div class="row">
            <div class="nbFormation col-lg-4 col-md-6 col-12 mt-3 p-2">
                <div class="bgTitle colorReserved text-center fw-bold mx-4 border border-secondary rounded">
                    <h5 class="">
                        <i class="bi bi-easel fs-1 mx-3"></i>Nombre de formation réservées :
                    </h5>

                    <?php if (!empty($displayReservedTraining)) : ?>
                        <span class="fs-2 text-success my-3"><?= $displayReservedTraining['nombre_de_reservation']; ?></span>
                    <?php else : ?>
                        <p>Aucune demande de formation enregistrée.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="nbFormation col-lg-4 col-md-6 col-12 mt-3 p-2">
                <div class="bgTitle colorValidate text-center fw-bold mx-4 border border-secondary rounded">
                    <h5 class=""><i class="bi bi-mortarboard fs-1 mx-3"></i> Nombre de formation validée : </h5>
                    <?php if (!empty($countCompletedTraining)) : ?>
                        <span class="fs-2 text-primary my-3"><?= $countCompletedTraining[0]['nombre_de_formation_validé']; ?></span>
                    <?php else : ?>
                        <p>Aucune demande de formation enregistrée.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="nbFormation col-lg-4 col-md-6 col-12 mt-3 p-2">
                <div class="bgTitle colorTrain text-center fw-bold mx-4 border border-secondary rounded pb-3">
                    <h5 class=""><i class="bi bi-person-workspace fs-1 mx-3"></i>Prochaine formation à venir : </h5>
                    <?php if (!empty($displayUpCommingTraining)) : ?>
                        <span class="fs-4 my-3 p-2 text-warning-emphasis"><?= date('d-m-Y', strtotime($displayUpCommingTraining[0]['training_date'])) . '    ' . $displayUpCommingTraining[0]['training_name']; ?></span>
                    <?php else : ?>
                        <p>Aucune demande de formation enregistrée.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>






    <!-- Bloc Note -->
    <div class="container-fluid my-5">
        <div class="d-flex row justify-content-left">
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-md-0 ">
                <div id="noteContainer" class="bloc bgTitle text-center border border-secondary rounded justify-content-center mx-auto">
                    <h3 class="bgTitle fs-4 text-center mx-4 p-2 my-2">Mes notes</h3>
                    <textarea id="mesNotes" class="form-control my-3" rows="10">Contenu de votre bloc note...</textarea>
                    <button onclick="sauvegarderNote()" class="btn btn-custom my-3 align-self-center ">Sauvegarder la note</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableaux -->


    <script src="../scriptUser.js"></script>

    <!-- Bootstrap Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>