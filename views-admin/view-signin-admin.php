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

            <p class="text-danger fw-bold fs-5"> Partie réservée à l'administrateur</p>
        </div>
        <div class="form-content">
            <h2> Administrateur</h2>
            <form class="row" method="POST" action="../controllers-admin/controller-signin-admin.php" novalidate>
                <input type="hidden" name="formType" value="login">
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

                <button type="submit" class="my-2">Log In</button>
            </form>
            <div class="buttom-link">

                <a href="../controllers/controller-signin.php" id="signup-link">Retour au site</a> <!-- lien ne marche pas -->
            </div>

        </div>
    </div>
    </div>


    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>