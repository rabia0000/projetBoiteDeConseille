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


<body class="<?= !empty($signupErrors) || !empty($loginErrors) ? "show-popup" : "" ?>" data-form-type="<?php echo $formType; ?>" data-login-errors='<?php echo json_encode($loginErrors); ?>' data-signup-errors='<?php echo json_encode($signupErrors); ?>'>
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
            <button class="login-btn" id="open-login-btn">LOG IN</button>
            <button class="login-btn" onclick="location.href='../controllers-admin/controller-signin-admin.php';">ADMIN</button>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>

    </nav>

    <!-- Pop up de LOGIN -->
    <div class="blur-bg-overlay"></div>
    <div class="form-popup <?= !empty($signupErrors) ? "show-signup" : "" ?>">
        <span class="close-btn material-symbols-rounded">X</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Bienvenue</h2>
                <p>Entrer vos information personnelles pour vous connecter</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form class="row" method="POST" action="../controllers/controller-signin.php" novalidate>
                    <input type="hidden" name="formType" value="login">
                    <div class="input-field">
                        <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                        <label>Email</label>
                        <span class="error text-danger">
                            <?php if (isset($loginErrors['email'])) {
                                echo $loginErrors['email'];
                            } ?>
                        </span>
                    </div>

                    <div class="input-field">
                        <input type="password" id="password" name="password" required>
                        <label>Password</label>
                        <span class="error text-danger">
                            <?php if (isset($loginErrors['password'])) {
                                echo $loginErrors['password'];
                            } ?>
                        </span>

                    </div>
                    <a href="#" class="forgot-pass">Mots de passe oublié? </a>
                    <button type="submit">Log In</button>
                </form>
                <div class="buttom-link">
                    Vous n'avez pas de compte?
                    <a href="../controllers/controller-signup.php" id="signup-link">Signup</a> <!-- lien ne marche pas -->
                </div>

            </div>
        </div>

        <div class="form-box signup">
            <div class="form-details">
                <h2>Crée un compte</h2>
                <p>Entrez vos informations personnelles pour créer un compte</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form method="POST" action="../controllers/controller-signin.php" novalidate>
                    <input type="hidden" name="formType" value="signup">

                    <div class="input-field">
                        <input type="text" id="name" name="name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" required>
                        <label>Nom</label>
                        <?php if (isset($signupErrors['name'])) : ?>
                            <span class="error"><?= htmlspecialchars($signupErrors['name']); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="input-field">
                        <input type="text" id="prenom" name="prenom" value="<?= isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '' ?>" required>
                        <label>Prénom</label>
                        <?php if (isset($signupErrors['prenom'])) : ?>
                            <span class="error"><?= htmlspecialchars($signupErrors['prenom']); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="input-field">
                        <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                        <span class="error text-danger">
                            <?php if (isset($signupErrors['email'])) {
                                echo $signupErrors['email'];
                            } ?>
                        </span>
                        <label>Entrer votre email</label>
                    </div>

                    <div class="input-field">
                        <input type="password" id="password" name="password" required>
                        <label>Password</label>
                        <span class="error text-danger">
                            <?php if (isset($signupErrors['password'])) {
                                echo $signupErrors['password'];
                            } ?>
                        </span>
                    </div>
                    <div class="input-field">
                        <input type="password" id="confirm_password" name="confirm_password" required>
                        <label>Confirm Password</label>
                        <span class="error ">
                            <?php if (isset($signupErrors['confirm_password'])) {
                                echo $signupErrors['confirm_password'];
                            } ?>
                        </span><br><br>
                    </div>
                    <div class="policy">
                        <input type="checkbox" name="cgu" id="policy" required>
                        <label for="policy">J'accepte les <a href="#">CGU</a></label>
                        <br>
                        <span class="error">
                            <?php if (isset($signupErrors['cgu'])) : ?>
                                <?= htmlspecialchars($signupErrors['cgu']); ?>
                            <?php endif; ?>
                        </span>
                        <br>
                    </div>
                    <button type="submit">Sign Up</button>
                </form>
                <div class="buttom-link">
                    Vous avez un compte?
                    <a href="" id="login-link">Login</a>
                </div>

            </div>
        </div>
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


    <div class="modal" tabindex="-1" id="signupSuccessModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inscription réussie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Vous pouvez maintenant vous connectez</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script defer>
        document.addEventListener("DOMContentLoaded", function() {
            const formType = document.body.getAttribute('data-form-type');

            // const loginErrors = JSON.parse(document.body.getAttribute('data-login-errors') || '{}');
            // const signupErrors = JSON.parse(document.body.getAttribute('data-signup-errors') || '{}');

            const showPopupBtn = document.querySelector(".login-btn");
            const hidePopupBtn = document.querySelector(".form-popup .close-btn");
            const formPopup = document.querySelector(".form-popup");
            const signupLoginLink = document.querySelectorAll(".form-content a");

            // Gestion de l'affichage des popups basée sur le type de formulaire et les erreurs
            // if ((formType === 'login' && Object.keys(loginErrors).length > 0) || (formType === 'signup' && Object.keys(signupErrors).length > 0)) {
            //     document.body.classList.add("show-popup");
            //     formPopup.classList.toggle('show-signup', formType === 'signup');
            // }

            showPopupBtn.addEventListener("click", () => {
                document.body.classList.toggle("show-popup");
            });

            hidePopupBtn.addEventListener("click", () => {
                console.log('click')
                document.body.classList.remove("show-popup");
                // Reset des champs input à déplacer si nécessaire, basé sur votre logique d'UI
            });

            signupLoginLink.forEach(link => {
                link.addEventListener("click", (e) => {
                    e.preventDefault(); // Empêche le comportement par défaut du lien
                    formPopup.classList.toggle('show-signup', link.id === "signup-link");
                });
            });

            // Lire les paramètres de l'URL
            const params = new URLSearchParams(window.location.search);
            const openLogin = params.get('openLogin');
            const email = params.get('email');

            // Si openLogin est vrai, simuler un clic sur le bouton d'ouverture de formulaire et remplir l'email
            if (openLogin && email) {
                const loginButton = document.getElementById('open-login-btn');
                const emailInput = document.querySelector('input[type=email]');

                // Simuler un clic sur le bouton pour ouvrir le formulaire
                if (loginButton) loginButton.click();

                // Remplir le champ email
                if (emailInput) emailInput.value = decodeURIComponent(email);
            }

            //modal
            const parame = new URLSearchParams(window.location.search);
            const signupSuccess = parame.get('signupSuccess');

            if (signupSuccess) {
                $('#signupSuccessModal').modal('show');
            }

        });
    </script>
</body>

</html>