<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-réservation de cours</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styleUser/style-home.css">

    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

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
                        <a href="../controllers/controller-completed-training" class="nav-link text-light fs-6">Formations Validées</a>
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


    <div class="contain">
        <div class="card-header text-dark text-center fs-1 ">Cours en présentiel :</div>
        <div class="card-body">
            <h3 class='text-center text-dark mb-5'>Liste des cours</h3>
            <div class="card-transparent">

                <?php if (!empty($cours)) : ?>
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Nom du cours</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Places maximales</th>
                                <th>Type</th>
                                <th>Archivé</th>
                                <th>Action</th> <!-- Colonne pour les actions comme réserver -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cours as $cour) : ?>
                                <tr class="text-center">
                                    <td><?= htmlspecialchars($cour['training_name']) ?></td>
                                    <td><?= htmlspecialchars($cour['training_description']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($cour['training_date'])) ?></td>
                                    <td><?= htmlspecialchars($cour['training_max']) ?></td>
                                    <td><?= htmlspecialchars($cour['type_id']) ?></td>
                                    <td><?= $cour['training_archived'] ? 'Oui' : 'Non' ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId); ?>">
                                            <input type="hidden" name="training_id" value="<?= htmlspecialchars($cour['training_id']); ?>">
                                            <button class="btn btn-outline-success ms-2" type="submit">Pré-réserver ce cours</button>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>Aucun cours trouvé.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class=" align-items-center justify-content-center">
            <?php if (!empty($confirmationMessage)) : ?>
                <p class='text-center text-danger fw-bolder fs-4'><?= $confirmationMessage; ?></p>
            <?php endif; ?>
        </div>
        <li class="d-flex nav-item justify-content-center">
            <a href="../controllers/controller-home.php" class="btn btn-dark mt-3 fw-semibold text-light text-center">Retour au Dashbord</a>
        </li>

    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>