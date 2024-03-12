<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Premiere inscription administrateur</title>

</head>

<body class="bg-secondary">

    <?php
    if ($showform) {
    ?>
        <form class="row" method="POST" action="../controllers-admin/controller-signup-admin.php" novalidate>
            <header>

            </header>
            <div class="container ">
                <div class="row justify-content-center align-item-center vh-100">
                    <div class="col-lg-4">
                        <div class="card shadow-lg">
                            <div class="card-body  p-4">
                                <h2 class="card-title text-center mb-4 text-light">Inscription Administrateur</h2>






                                <label class="fs-5 text-light text-center" for="email">Email:</label><br>
                                <input class="col-12" type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                                <span class="error">
                                    <?php if (isset($errors['email'])) {
                                        echo $errors['email'];
                                    } ?>
                                </span><br>



                                <label class="fs-5 text-light text-center" for="password">Mot de passe:</label><br>
                                <input class="col-12" type="password" id="password" name="password">
                                <span class="error text-danger">
                                    <?php if (isset($errors['password'])) {
                                        echo $errors['password'];
                                    } ?>
                                </span><br>

                                <label class="fs-5 text-light text-center" for="confirm_password">Confirmer le mot de passe:</label><br>
                                <input class="col-12" type="password" id="confirm_password" name="confirm_password">
                                <span class="error ">
                                    <?php if (isset($errors['confirm_password'])) {
                                        echo $errors['confirm_password'];
                                    } ?>
                                </span><br><br>
                                <div class="row justify-content-center">
                                    <input type="submit" value="S'enregistrer" class="btn btn-dark mt-3 ">
                                    <a href="../controllers-admin/controller-signin-admin.php" class="btn btn-dark mt-3">Déjà inscrit</a>
                                </div>
                            <?php } else { ?>
                                <div class="container">
                                    <div class="d-flex justify-content-center align-items-center vh-100">
                                        <div class="col-lg-4">
                                            <div class="card shadow-lg">
                                                <div class="card-body text-center text-dark ">


                                                    <h2>Inscription réussie</h2>
                                                    <p><strong><em>Vous pouvez maintenant vous connecter.</em></strong></p>

                                                    <a href="../controllers-admin/controller-signin-admin.php" class="btn btn-success">
                                                        Connexion</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>



        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>