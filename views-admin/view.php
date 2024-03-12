<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style-gestion.css">
    <title>Gestion des formations et stagiaires</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Contenu de la navbar -->
    </nav>

    <div class="container mt-5">
        <div class="title text-center fs-1">Gérer les réservations</div>

        <!-- Section de filtrage des formations (si nécessaire) -->
        <div class="mt-3">
            <form action="" method="post">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="input-group">
                                <select name="type_id" class="form-control me-1">
                                    <option value="">Sélectionnez un type de formation</option>
                                    <!-- Options des types de formation -->
                                </select>
                                <button type="submit" class="btn btn-custom ms-2">Rechercher</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tableau de gestion des réservations -->
        <div class="card text-light text-dark mb-5">
            <div class="card-header text-center fs-3">Demande de pré-réservation de formation</div>
            <div class="card-body" style="overflow-y: auto; max-height: 350px;">
                <div class="table-responsive-lg">
                    <table class="table table-striped text-light">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Nom du stagiaire</th>
                                <th scope="col">Prénom du stagiaire</th>
                                <th scope="col">Titre de la formation</th>
                                <th scope="col">Date de la formation</th>
                                <th scope="col">Status de la demande</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Lignes des réservations -->
                            <?php foreach ($displayCoursReseved as $cour) : ?>
                                <tr class="text-center">
                                    <td><?= htmlspecialchars($cour['user_lastname']) ?></td>
                                    <td><?= htmlspecialchars($cour['user_firstname']) ?></td>
                                    <td><?= htmlspecialchars($cour['training_name']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($cour['training_date'])) ?></td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-3">En cours</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input toggle-training" type="checkbox" id="monSwitch-<?= $cour['user_id'] . '-' . $cour['training_id']; ?>" data-user-id="<?= $cour['user_id']; ?>" data-training-id="<?= $cour['training_id']; ?>" <?= $cour['authorized_training'] ? 'checked' : ''; ?>>
                                            </div>
                                            <span class="ms-2">Valider</span>
                                        </div>

                                    </td>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tableau des formations et nombre de places restantes -->
        <div class="card text-light text-dark">
            <div class="title text-center mt-4 fs-3">Formations et nombre de place restant</div>
            <div class="card-body" style="overflow-y: auto; max-height: 350px;">
                <div class="table-responsive-lg">
                    <table class="table table-striped text-light">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Nom de la formation</th>
                                <th scope="col">Description</th>
                                <th scope="col">Nombre de place</th>
                                <th scope="col">Nombre de place restante</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($trainingDetailsList as $trainingId => $details) : ?>
                                <?php foreach ($details as $detail) : ?>
                                    <?php
                                    // Calcul des places restantes pour chaque formation
                                    $placesRestantes = max(0, $detail['training_max'] - $detail['Place restante']);
                                    ?>
                                    <tr class="text-center">
                                        <td><?= htmlspecialchars($detail['training_name']) ?></td>
                                        <td><?= htmlspecialchars($detail['training_description']) ?></td>
                                        <td><?= htmlspecialchars($detail['training_max']) ?></td>
                                        <td>
                                            <?php if ($placesRestantes === 0) : ?>
                                                <span class="text-danger fw-bold"><?= $placesRestantes ?></span>
                                            <?php else : ?>
                                                <?= $placesRestantes ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>