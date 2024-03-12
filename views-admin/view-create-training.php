<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un cours</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style-create.css">

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

    <div class="container text-center text-light mt-4">
        <h1 class="text-center text-light">Crée un cours</h1>
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
                    <option value="0">Non</option>
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
    <div class="text-center">
        <button type="submit" class="btn btn-custom fw-semibold my-5 btn-lg">Ajouter le cours</button>

    </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>