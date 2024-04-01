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
                <!-- <li><a href="../controllers/controller-signin.php">Login</a></li>
                <li><a href="../controllers-admin/controller-signin-admin.php">Login admin</a></li> -->
            </ul>
            <button class="login-btn">LOG IN</button>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>

    </nav>



    <!-- <div class="form-popup">

        <div class="form-box login">
            <div class="form-details">
                <h2>Bienvenue</h2>
                <p>Veuillez vous connecter en utilisant vos informations personnelles.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form method="POST" action="../controllers/controller-signin.php" novalidate>
                    <div class="input-field">
                        <input type="email" id="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                        <span class="error text-danger">
                            <?php if (isset($errors['email'])) {
                                echo $errors['email'];
                            } ?>

                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <span class="error text-danger">
                            <?php if (isset($errors['password'])) {
                                echo $errors['password'];
                            } ?>
                        </span>

                    </div>
                    <a href="#" class="forgot-pass-link"></a>
                    <button type="submit">Log In</button>
                </form>
                <div class="bottom-link">
                    Pas de compte ?
                    <a href="../controllers/controller-signup.php" id="signup-link">Signup</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Create Account</h2>
                <p>To become a part of our community, please sign up using your personal information.</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="#">
                    <div class="input-field">
                        <input type="text" required>
                        <label>Enter your email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" required>
                        <label>Create password</label>
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
                    Already have an account?
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Pop up de LOGIN -->
    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">X</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Bienvenue</h2>
                <p>Entrer vos information personnelles pour vous connecter</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="#">
                    <div class="input-field">
                        <input type="text" required>
                        <label>Email</label>
                    </div>

                    <div class="input-field">
                        <input type="password" required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass">Mots de passe oublié? </a>
                    <button type="submit">Log In</button>
                </form>
                <div class="buttom-link">
                    Vous n'avez pas de compte?
                    <a href="#" id="signup-link">Signup</a>
                </div>

            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Crée un compte</h2>
                <p>Entrer vos information personnelles pour crée un compte</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="#">
                    <div class="input-field">
                        <input type="text" required>
                        <label>Entrer votre email</label>
                    </div>

                    <div class="input-field">
                        <input type="password" required>
                        <label>Crée un mot de passe</label>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy">
                        <label for="policy"></label>
                        J'accepte les
                        <a href="#">cgu</a>
                    </div>
                    <button type="submit">Sign Up</button>
                </form>
                <div class="buttom-link">
                    Vous avez un compte?
                    <a href="#" id="login-link">Login</a>
                </div>

            </div>
        </div>
    </div>











    <!-- <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-6 ">
                <div class="card shadow-lg border-light p-3 border border-dark mt-5">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center text-light fs-3">Page de connexion</h2>
                        <form class="row" method="POST" action="../controllers/controller-signin.php" novalidate>


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
    </div> -->





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

    <script defer>
        const showPopupBtn = document.querySelector(".login-btn");
        const hidePopupBtn = document.querySelector(".form-popup .close-btn");
        const formPopup = document.querySelector(".form-popup");
        const signupLoginLink = document.querySelectorAll(".form-content a");
        // body > div.form-popup > div.form-box.login > div.form-content > div > a

        // voir login popup
        showPopupBtn.addEventListener("click", () => {
            document.body.classList.toggle("show-popup");
        });
        //fermer la popup
        hidePopupBtn.addEventListener("click", () => showPopupBtn.click());


        signupLoginLink.forEach(link => {
            link.addEventListener("click", (e) => {
                e.preventDefault(); // Empêche le comportement par défaut du lien
                // console.log(link.id);

                //si le click est sur signup alors on ajoute la classe "show-signup" dans le formulaire popup (form popup)sinon on le retire
                formPopup.classList[link.id === "signup-link" ? 'add' : 'remove']('show-signup');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>