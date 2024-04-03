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
                                    <li><a href="#">Qui sommes nous ?</a></li>
                                    <li><a href="#">Pourquoi rejoindre Innovéo</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                            <div class="row">
                                <header>Recrutement</header>
                                <ul class="mega-links">
                                    <li><a href="#">Nos offres d'emploi</a></li>

                                </ul>
                            </div>
                            <div class="row">
                                <header>Autre titre</header>
                                <ul class="mega-links">
                                    <li><a href="#">titre</a></li>
                                    <li><a href="#">titre</a></li>
                                    <li><a href="#">titre</a></li>
                                    <li><a href="#">titre</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
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
                                    <li><a href="#">Qu'est ce que le cloud</a></li>
                                    <li><a href="#">titre</a></li>
                                    <li><a href="#">titre</a></li>
                                    <li><a href="#">titre</a></li>
                                </ul>
                            </div>
                            <div class="row">
                                <header>Cyber Sécurité</header>
                                <ul class="mega-links">
                                    <li><a href="#">titre</a></li>
                                    <li><a href="#">titre</a></li>
                                    <li><a href="#">titre</a></li>
                                    <li><a href="#">titre</a></li>
                                </ul>
                            </div>
                            <div class="row">
                                <header>Intelligence Artificielle</header>
                                <ul class="mega-links">
                                    <li><a href="#">titre</a></li>
                                    <li><a href="#">titre</a></li>
                                    <li><a href="#">titre</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- <li><a href="../controllers/controller-signin.php">Login</a></li>
                <li><a href="../controllers-admin/controller-signin-admin.php">Login admin</a></li> -->
            </ul>
            <button class="login-btn">LOG IN</button>
            <button class="login-btn" onclick="location.href='../controllers-admin/controller-signin-admin.php';">ADMIN</button>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>

    </nav>

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
                <form class="row" method="POST" action="../controllers/controller-signin.php" novalidate>
                    <div class="input-field">
                        <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                        <label>Email</label>
                        <span class="error">
                            <?php if (isset($errors['email'])) {
                                echo $errors['email'];
                            } ?>
                        </span>
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
                    <a href="#" class="forgot-pass">Mots de passe oublié? </a>
                    <button type="submit">Log In</button>
                </form>
                <div class="buttom-link">
                    Vous n'avez pas de compte?
                    <a href="../controllers/controller-signup.php" id="signup-link">Signup</a>
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
                <form method="POST" action="controller-signup.php" novalidate>
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
                        <input type="checkbox" name="cgu" id="policy" required></label>
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
        </form>
    </div>



    <footer class="footerPage pb-3 mt-5">
        <ul class=" nav justify-content-center border-bottom">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-dark fw-bold">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-dark fw-bold">Conditions d'utilisation</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-dark fw-bold">Contact</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-dark fw-bold">Carrières</a></li>

        </ul>
        <p class="text-center text-dark fw-bold mb-2 pt-1">© 2024 Tout droit réservés.</p>
    </footer>



    <!-- Modal -->
    <div class="modal" tabindex="-1" id="signupSuccessModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Votre inscription à bien été pris en compte, vous pouvez maintenant vous connectez.</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary">Se connecter</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script defer>
        document.addEventListener("DOMContentLoaded", function() {
            //pop up de connection 

            const showPopupBtn = document.querySelector(".login-btn");
            const hidePopupBtn = document.querySelector(".form-popup .close-btn");
            const formPopup = document.querySelector(".form-popup");
            const signupLoginLink = document.querySelectorAll(".form-content a");


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




            // Création d'une variable JavaScript basée sur la présence d'erreurs
            var showLoginForm = <?php echo !empty($errors) ? 'true' : 'false'; ?>;


            if (showLoginForm) {
                // Ouvrir le formulaire de connexion si des erreurs sont présentes
                document.body.classList.add("show-popup");
            }


            const inputs = formPopup.querySelectorAll("input");
            const errorMessages = formPopup.querySelectorAll(".error");

            // Fermer la popup et vider les inputs
            hidePopupBtn.addEventListener("click", () => {
                document.body.classList.remove("show-popup");
                // Boucle sur tous les champs d'input pour les vider
                inputs.forEach(input => {
                    // Ne réinitialisez pas les champs de type 'checkbox' ou 'radio'
                    if (input.type !== "checkbox" && input.type !== "radio") {
                        input.value = "";
                    }
                });

                // Boucle sur tous les éléments d'erreur pour effacer les messages
                errorMessages.forEach(errorElement => {
                    errorElement.textContent = ""; // Efface le texte de l'élément d'erreur
                });


            });

            // Création d'une variable JavaScript basée sur la présence d'erreurs dans le formulaire d'inscription
            var showSignupForm = <?php echo !empty($errors) ? 'true' : 'false'; ?>;


            // Afficher la popup d'inscription si des erreurs sont présentes
            if (showSignupForm) {
                document.body.classList.add("show-popup");
                formPopup.classList.add('show-signup'); // S'assurer que le formulaire d'inscription est visible
            }

            // Fermer la popup et réinitialiser les champs d'input ainsi que les messages d'erreur
            hidePopupBtn.addEventListener("click", () => {
                document.body.classList.remove("show-popup");
                formPopup.classList.remove('show-signup'); // S'assurer que le formulaire d'inscription est masqué

                // Réinitialiser les champs d'input
                inputs.forEach(input => {
                    if (input.type !== "checkbox" && input.type !== "radio") {
                        input.value = "";
                    }
                });

                // Effacer les messages d'erreur
                errorMessages.forEach(errorElement => {
                    errorElement.textContent = "";
                });
            });

        });
    </script>
</body>

</html>