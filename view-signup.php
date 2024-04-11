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

    <?php
    if ($showform) {
    ?>
        <form class="row" method="POST" action="../controllers/controller-signup.php" novalidate>
            <!-- header -->
            <!-- Formulaire signup -->
            <div class="form-box signup">
                <div class="form-details">
                    <h2>Crée un compte</h2>
                    <p>Entrer vos information personnelles pour crée un compte</p>
                </div>
                <div class="form-content">
                    <h2>SIGNUP</h2>
                    <form method="POST" action="../controllers/controller-signup.php" novalidate>
                        <div class="input-field">
                            <input type="text" id="name" name="name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" required>
                            <label>Nom</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="prenom" name="prenom" value="<?= isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '' ?>" required>
                            <label>Prénom</label>
                        </div>
                        <div class="input-field">
                            <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                            <?php if (isset($errors['email'])) {
                                echo $errors['email'];
                            } ?>
                            </span>
                            <label>Entrer votre email</label>
                        </div>

                        <div class="input-field">
                            <input type="password" id="password" name="password" required>
                            <label>Password</label>
                            <span class="error text-danger">
                                <?php if (isset($errors['password'])) {
                                    echo $errors['password'];
                                } ?>
                            </span>
                        </div>
                        <div class="input-field">
                            <input type="password" id="confirm_password" name="confirm_password" required>
                            <label>Confirm Password</label>
                            <span class="error ">
                                <?php if (isset($errors['confirm_password'])) {
                                    echo $errors['confirm_password'];
                                } ?>
                            </span><br><br>
                        </div>
                        <div class="policy-text">
                            <input type="checkbox" id="policy">
                            <label for="policy"></label>
                            J'accepte les
                            <a href="#"> cgu</a>
                        </div>
                        <button type="submit">Sign Up</button>
                    </form>
                    <div class="buttom-link">
                        Vous avez un compte?
                        <a href="#" id="login-link">Login</a>
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
        <script>

        </script>
</body>

</html>