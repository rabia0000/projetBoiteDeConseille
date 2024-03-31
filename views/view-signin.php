<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/6c654ba7b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/style.css">
    <title>Sign in</title>


</head>


<body>
    <!-- video -->

    <div class="video-background">
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="../assets/video/art1.mp4" type="video/mp4">
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
                                <img src="img.jpg" alt="">
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
                    <input type="checkbox" id="showMega">
                    <label for="showMega" class="mobile-item">Services</label>
                    <div class="mega-box">
                        <div class="content">
                            <div class="row">
                                <img src="img.jpg" alt="">
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
                <li><a href="#">Login</a></li>
                <li><a href="#">Login admin</a></li>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>

    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">FBIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto gap-3 fs-6">
                    <li class="nav-item ">
                        <a class="nav-link text-light" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light dropdown-toggle-custom" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Expertises
                        </a>
                        <ul class="dropdown-menu dropdown-menu-expand " aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item text-light" href="#">Développement d'applications</a></li>
                            <li><a class="dropdown-item text-light" href="#">Gestion de bases de données</a></li>
                            <li><a class="dropdown-item text-light" href="#">Sécurité informatique</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light dropdown-toggle-custom" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Découvrez FBIA
                        </a>
                        <ul class="dropdown-menu dropdown-menu-expand " aria-labelledby="navbarDropdownMenuLink2">
                            <li><a class="dropdown-item text-light" href="#">Développement d'applications</a></li>
                            <li><a class="dropdown-item text-light" href="#">Gestion de bases de données</a></li>
                            <li><a class="dropdown-item text-light" href="#">Sécurité informatique</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Blog</a>
                    </li>
                </ul>
            </div>
            <div class="ms-auto">
                <button type="button" class="btn btn-outline-danger btn-sm">Connexion Admin</button>
            </div>
        </div>
    </nav> -->




    <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-6 ">
                <div class="card shadow-lg border-light p-3 border border-dark mt-5">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center text-light fs-3">Page de connexion</h2>
                        <form class="row" method="POST" action="../controllers/controller-signin.php" novalidate>
                            <!-- email  -->

                            <div class="text-center fs-5 text-light">
                                <label for="email">Login :</label><br>

                                <input class="col-12" type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                                <span class="error">
                                    <?php if (isset($errors['email'])) {
                                        echo $errors['email'];
                                    } ?>
                            </div>
                            </span>


                            <div class="text-center fs-5 text-light">
                                <label for="password">Mot de passe :</label><br>
                                <input class="col-12" type="password" id="password" name="password">
                                <span class="error text-danger">
                                    <?php if (isset($errors['password'])) {
                                        echo $errors['password'];
                                    } ?>
                                </span><br>
                                <br>
                            </div>


                            <div class=" text-center mt-1">
                                <input type="submit" value="Me connecter" class="btn btn-outline-light  ">
                            </div>

                            <div class='text-center mt-2'>
                                <a href="../controllers/controller-signup.php">
                                    <button type="button" class="btn btn-outline-light">Pas encore inscrit ?</button>
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <footer class="footerPage pb-3 mt-5">
        <ul class=" nav justify-content-center border-bottom">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Conditions d'utilisation</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Contact</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Carrières</a></li>

        </ul>
        <p class="text-center text-light  mb-2 pt-1">© 2024 Tout droit réservés.</p>
    </footer>



    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>