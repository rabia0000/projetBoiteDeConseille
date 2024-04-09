<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Sign in admin</title>
</head>

<body class="bg-secondary">

    <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-6 ">
                <div class="card shadow-lg border-light p-3 border border-dark mt-5">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center text-dark fs-3">Administrateur</h2>
                        <!-- email -->
                        <form class="row" method="POST" action="../controllers-admin/controller-signin-admin.php" novalidate>

                            <div class="text-center fs-5 text-dark">
                                <label for="email">Login :</label><br>
                                <input class="col-12" type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                                <span class="error text-danger">
                                    <?= isset($errors['email']) ? htmlspecialchars($errors['email']) : '' ?>
                                </span>
                            </div>
                            <!-- MOT DE PASSE -->
                            <div class="text-center fs-5 text-dark">
                                <label for="password">Mot de passe :</label><br>
                                <input class="col-12" type="password" id="password" name="password">
                                <span class="error text-danger">
                                    <?= isset($errors['password']) ? htmlspecialchars($errors['password']) : '' ?>
                                </span><br><br>
                            </div>
                            <div class='text-center mt-2'>
                                <input type="submit" value="Me connecter" class=" col-4 btn btn-dark text-light">
                            </div><br>
                            <div class='text-center mt-2'>
                                <!-- <a href="../controllers-admin/controller-signup-admin.php">
                                    <button type="button" class="btn btn-dark col-4">Pas encore inscrit ?</button>
                                </a> -->
                            </div>
                            <div class='text-center mt-2'>
                                <a href="../controllers/controller-signin.php">
                                    <button type="button" class="btn btn-dark col-4">Retour au site</button>
                                </a>
                            </div>
                            <div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>

</html>