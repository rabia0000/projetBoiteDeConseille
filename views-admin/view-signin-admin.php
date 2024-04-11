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
    <link rel="stylesheet" href="../assets/style-admin-signin.css">
    <title>Sign in</title>
</head>

<body>

    <div class="video-background">
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="../assets/video/montain.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Pop up de LOGIN -->
    <!-- <div class="blur-bg-overlay"></div> -->

    <div class="form-box login">

        <div class="form-details">

            <p class="text-danger">Réserver a l'administeur</p>
        </div>
        <div class="form-content">
            <h2>Administrateur</h2>
            <form class="row" method="POST" action="../controllers-admin/controller-signin-admin.php" novalidate>
                <input type="hidden" name="formType" value="login">
                <div class="input-field">
                    <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                    <label>Email</label>
                    <span class="error">
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

                <button type="submit">Log In</button>
            </form>
            <div class="buttom-link">

                <a href="../controllers/controller-signin.php" id="signup-link">Retour au site</a> <!-- lien ne marche pas -->
            </div>

        </div>
    </div>


    </div>
    </div>

    <!-- <div class="container mt-5">
                <div class="d-flex justify-content-center align-items-center mt-5">
                    <div class="col-lg-6 ">
                        <div class="card shadow-lg border-light p-3 border border-dark mt-5">
                            <div class="card-body p-4">
                                <h2 class="card-title text-center text-dark fs-3"> Accés Administrateur</h2>
                                <!-- email -->
    <!-- <form class="row" method="POST" action="../controllers-admin/controller-signin-admin.php" novalidate>

                                    <div class="text-center fs-5 text-dark">
                                        <label for="email">Login :</label><br>
                                        <input class="col-12" type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                                        <span class="error text-danger">
                                            <?= isset($errors['email']) ? htmlspecialchars($errors['email']) : '' ?>
                                        </span>
                                    </div>
                                    <!-- MOT DE PASSE -->
    <!-- <div class="text-center fs-5 text-dark">
                                        <label for="password">Mot de passe :</label><br>
                                        <input class="col-12" type="password" id="password" name="password">
                                        <span class="error text-danger">
                                            <?= isset($errors['password']) ? htmlspecialchars($errors['password']) : '' ?>
                                        </span><br><br>
                                    </div>
                                    <div class='text-center mt-2'>
                                        <input type="submit" value="Me connecter" class=" col-4 btn btn-dark text-light">
                                    </div><br>
                                    <div class='text-center mt-2'> --> -->
    <!-- <a href="../controllers-admin/controller-signup-admin.php">
                                    <button type="button" class="btn btn-dark col-4">Pas encore inscrit ?</button>
                                </a> -->
    <!-- </div>
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
            </form> --> -->
    <script>
        const navbarMenu = document.querySelector(".navbar .links");
        const hamburgerBtn = document.querySelector(".hamburger-btn");
        const hideMenuBtn = navbarMenu.querySelector(".close-btn");
        const showPopupBtn = document.querySelector(".login-btn");
        const formPopup = document.querySelector(".form-popup");
        const hidePopupBtn = formPopup.querySelector(".close-btn");
        const signupLoginLink = formPopup.querySelectorAll(".bottom-link a");

        // Show mobile menu
        hamburgerBtn.addEventListener("click", () => {
            navbarMenu.classList.toggle("show-menu");
        });

        // Hide mobile menu
        hideMenuBtn.addEventListener("click", () => hamburgerBtn.click());

        // Show login popup
        showPopupBtn.addEventListener("click", () => {
            document.body.classList.toggle("show-popup");
        });

        // Hide login popup
        hidePopupBtn.addEventListener("click", () => showPopupBtn.click());

        // Show or hide signup form
        signupLoginLink.forEach(link => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                formPopup.classList[link.id === 'signup-link' ? 'add' : 'remove']("show-signup");
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>