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
            <source src="../assets/video/montain.mp4" type="video/mp4">
        </video>
    </div>



    <?php
    if ($showform) {
    ?>
        <form class="row" method="POST" action="../controllers/controller-signup.php" novalidate>
            <!-- header -->
            <header>
                <nav>
                    <div class="wrapper">
                        <div class="logo"><a href="#">Innovéo Conseil</a></div>
                        <input type="radio" name="slider" id="menu-btn">
                        <input type="radio" name="slider" id="close-btn">
                        <ul class="nav-links">
                            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">About</a></li>

                            <li>
                                <a href="#" class="desktop-item">Carrières</a>
                                <input type="checkbox" id="showMega">
                                <label for="showMega" class="mobile-item">Carrières</label>
                                <div class="mega-box">
                                    <div class="content">
                                        <div class="row">
                                            <img src="../assets/images/employer1.jpg" alt="">
                                        </div>
                                        <div class="row">
                                            <header>Rejoignez nous</header>
                                            <ul class="mega-links">
                                                <li><a href="#"></a></li>
                                                <li><a href="#">Pourquoi rejoindre Innovéo</a></li>
                                                <li><a href="#">Business cards</a></li>
                                                <li><a href="#">Custom logo</a></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <header>Cyber Sécurité</header>
                                            <ul class="mega-links">
                                                <li><a href="#">Personal Email</a></li>
                                                <li><a href="#">Business Email</a></li>
                                                <li><a href="#">Mobile Email</a></li>
                                                <li><a href="#">Web Marketing</a></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <header>Intelligence Artificielle</header>
                                            <ul class="mega-links">
                                                <li><a href="#">Site Seal</a></li>
                                                <li><a href="#">VPS Hosting</a></li>
                                                <li><a href="#">Privacy Seal</a></li>
                                                <li><a href="#">Website design</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- <li>
                    <a href="#" class="desktop-item">Dropdown Menu</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">Dropdown Menu</label>
                    <ul class="drop-menu">
                        <li><a href="#">Drop menu 1</a></li>
                        <li><a href="#">Drop menu 2</a></li>
                        <li><a href="#">Drop menu 3</a></li>
                        <li><a href="#">Drop menu 4</a></li>
                    </ul>
                </li> -->
                            <li>
                                <a href="#" class="desktop-item">Services</a>
                                <input type="checkbox" id="showMega2">
                                <label for="showMega2" class="mobile-item">Services</label>
                                <div class="mega-box">
                                    <div class="content">
                                        <div class="row">
                                            <img src="../assets/images/accueil.jpg" alt="">
                                        </div>
                                        <div class="row">
                                            <header>Cloud</header>
                                            <ul class="mega-links">
                                                <li><a href="#">Graphics</a></li>
                                                <li><a href="#">Vectors</a></li>
                                                <li><a href="#">Business cards</a></li>
                                                <li><a href="#">Custom logo</a></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <header>Cyber Sécurité</header>
                                            <ul class="mega-links">
                                                <li><a href="#">Personal Email</a></li>
                                                <li><a href="#">Business Email</a></li>
                                                <li><a href="#">Mobile Email</a></li>
                                                <li><a href="#">Web Marketing</a></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <header>Intelligence Artificielle</header>
                                            <ul class="mega-links">
                                                <li><a href="#">Site Seal</a></li>
                                                <li><a href="#">VPS Hosting</a></li>
                                                <li><a href="#">Privacy Seal</a></li>
                                                <li><a href="#">Website design</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="../controllers/controller-signin.php">Login</a></li>
                            <li><a href="#">Login admin</a></li>
                        </ul>
                        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
                    </div>
                </nav>

            </header>
            <!-- header -->
            <!-- <div class="container">
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
        <?php } ?> -->

            <div class="sign-up form-popup">
                <div class="form-box login">
                    <div class="form-details">
                        <h2>Creation de compte</h2>
                        <p>Inscrivez vous pour accéder à votre espace</p>
                    </div>
                    <div class="form-content">
                        <h2>LOGIN</h2>
                        <form action="controller-signup.php" method="POST" novalidate>
                            <div class="input-field">
                                <input type="text" required>
                                <label>Enter your email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" required>
                                <label>Create password</label>
                            </div>
                            <div class="input-field">
                                <input type="password" required>
                                <label>Confirm password</label>
                            </div>

                            <div class="policy-text">
                                <input type="checkbox" id="policy">
                                <label for="policy">
                                    I agree the
                                    <a href="#" class="option">Terms & Conditions</a>
                                </label>
                            </div>
                            <button type="submit">Sign Up</button>
                        </form>
                        <div class="bottom-link">
                            Vous avez deja un compte ?
                            <a href="../controllers/controller-signin.php" id="signup-link">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>









            <footer class="footerPage  pb-3 mt-5">
                <ul class=" nav justify-content-center border-bottom">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Conditions d'utilisation</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Contact</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Carrières</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Qui nous sommes ? </a></li>
                </ul>
                <p class="text-center text-dark  mb-2 pt-1">© 2024 Tout droit réservés.</p>
            </footer>




            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

</body>

</html>