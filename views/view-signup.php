<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/style.css">
    <title>Crée un compte</title>
</head>

<body class="">
    <div class="video-background">
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="../assets/video/IA.mp4" type="video/mp4">
        </video>
    </div>



    <?php
    if ($showform) {
    ?>
        <form class="row" method="POST" action="../controllers/controller-signup.php" novalidate>
            <!-- header -->
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong" aria-label="Thirteenth navbar example">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
                            <a class="navbar-brand col-lg-3 me-0 text-primary" href="#">LOGO</a>
                            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                                <li class="nav-item">
                                    <a class="nav-link active text-dark fs-4 me-1 fw-semibold" aria-current="page" href="#">Page d'Accueil</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link text-dark fs-3 me-1" href="#">Link</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled text-dark fs-3 me-1" aria-disabled="true">Disabled</a>
                                </li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark fs-4 me-1 fw-semibold" href="#" data-bs-toggle="dropdown" aria-expanded="false">Expertises</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark fs-4 me-1 fw-semibold" href="#" data-bs-toggle="dropdown" aria-expanded="false">Découvrir l'entreprise</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                                <a href="../controllers-admin/controller-signin-admin.php">
                                    <button type="button" class="btn btn-outline-danger">Admin</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>

            </header>
            <!-- header -->
            <div class="container">
                <div class="d-flex justify-content-center align-items-center ">
                    <div class="col-lg-4 ">
                        <div class="card shadow-lg p-3 mb-5 border-light mt-5">
                            <div class="card-body p-4">
                                <h2 class="card-title text-center mb-4 text-primary fs-4 fw-semibold">INSCRIPTION RESERVE POUR LES PROFESSIONNELS DE L'ENTREPRISE</h2>

                                <form action="controller-signup.php" method="POST" novalidate>

                                    <label class="fs-5 text-dark" for="nom">Nom :</label><br>
                                    <input class="col-12" type="text" id="nom" name="name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                                    <span class="error">
                                        <?php if (isset($errors['name'])) {
                                            echo $errors['name'];
                                        } ?>
                                    </span><br>

                                    <label class="fs-5 text-dark" for="prenom">Prénom :</label><br>
                                    <input class="col-12" type="text" id="prenom" name="prenom" value="<?= isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '' ?>">
                                    <span class="error">
                                        <?php if (isset($errors['prenom'])) {
                                            echo $errors['prenom'];
                                        } ?>
                                    </span><br>

                                    <label class="fs-5 text-dark" for="email">Email :</label><br>
                                    <input class="col-12" type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                                    <span class="error">
                                        <?php if (isset($errors['email'])) {
                                            echo $errors['email'];
                                        } ?>
                                    </span><br>



                                    <label class="fs-5 text-dark" for="password">Mot de passe :</label><br>
                                    <input class="col-12" type="password" id="password" name="password">
                                    <span class="error text-danger">
                                        <?php if (isset($errors['password'])) {
                                            echo $errors['password'];
                                        } ?>
                                    </span><br>

                                    <label class="fs-5 text-dark" for="confirm_password">Confirmer le mot de passe:</label><br>
                                    <input class="col-12" type="password" id="confirm_password" name="confirm_password">
                                    <span class="error ">
                                        <?php if (isset($errors['confirm_password'])) {
                                            echo $errors['confirm_password'];
                                        } ?>
                                    </span><br><br>

                                    <div class="row text-center">
                                        <label for="cgu" class="fs-5 text-dark fw-semibold">J'accepte les CGU : <input type="checkbox" name="cgu" id="cgu" required></label>
                                        <span class="error ">
                                            <?php if (isset($errors['cgu'])) {
                                                echo $errors['cgu'];
                                            } ?>
                                        </span>
                                    </div>

                                    <div class="row justify-content-center">
                                        <input type="submit" value="S'enregistrer" class="btn btn-outline-dark mt-3 fw-semibold text-primary">
                                        <a href="../controllers/controller-signin.php" class="btn btn-outline-dark mt-3 fw-semibold text-primary">Déjà inscrit ?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container">
                <div class="d-flex justify-content-center align-items-center vh-100">
                    <div class="col-lg-4">
                        <div class="card shadow-lg">
                            <div class="card-body text-center text-dark ">
                                <h2>Inscription réussie</h2>
                                <p><strong><em>Vous pouvez vous connecter à votre espace</em></strong>
                                <div>
                                    <a href="../controllers/controller-signin.php" class="btn btn-success mt-3 text-dark">Connexion</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <footer class="footerPage bg-dark pb-3 mt-5">
            <ul class=" nav justify-content-center border-bottom">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Conditions d'utilisation</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Contact</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Carrières</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Qui nous sommes ? </a></li>
            </ul>
            <p class="text-center text-light  mb-2 pt-1">© 2024 Tout droit réservés.</p>
        </footer>




        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

</body>

</html>