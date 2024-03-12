<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Sign in</title>



</head>


<body>
    <!-- video -->

    <div class="video-background">
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="../assets/video/IA.mp4" type="video/mp4">
        </video>
    </div>



    <!-- header -->
    <header class=" mb-5">

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
                    <<div class="d-lg-flex col-lg-3 justify-content-lg-end">
                        <a href="../controllers-admin/controller-signin-admin.php">
                            <button type="button" class="btn btn-outline-danger">Admin</button>
                        </a>
                </div>
            </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-6 ">
                <div class="card shadow-lg border-light p-3 border border-dark mt-5">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center text-dark fs-3">Page de connexion</h2>
                        <form class="row" method="POST" action="../controllers/controller-signin.php" novalidate>
                            <!-- email  -->

                            <div class="text-center fs-5 text-dark">
                                <label for="email">Login :</label><br>

                                <input class="col-12" type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                                <span class="error">
                                    <?php if (isset($errors['email'])) {
                                        echo $errors['email'];
                                    } ?>
                            </div>
                            </span>


                            <div class="text-center fs-5 text-dark">
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
                                <input type="submit" value="Me connecter" class="btn btn-outline-dark  ">
                            </div>

                            <div class='text-center mt-2'>
                                <a href="../controllers/controller-signup.php">
                                    <button type="button" class="btn btn-outline-dark">Pas encore inscrit ?</button>
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

</body>

</html>