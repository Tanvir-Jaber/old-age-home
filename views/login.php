<?php
if (!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Old Age Home Service</title>
    <link rel="stylesheet" href="../contents/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../contents/css/custom_style.css">
    <link rel="stylesheet" href="../contents/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../contents/css/custom.css">
    <link href="../contents/css/fontawesome-free-5.11.1-web/css/all.min.css" rel="stylesheet" />

</head>
<body>
    <div class="main">
        <section class="sign-in mb-0">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../contents/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <?php
                        if (isset($_SESSION["isErorMsg"])){
                            echo $_SESSION["isErorMsg"];
                            unset($_SESSION["isErorMsg"]);
                        }
                        ?>
                        <h2 class="form-title">Sign in</h2>
                        <form action="dataprocess/registration_process.php" method="post" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit btn w-100 bg-danger " value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="../contents/js/jquery-3.2.1.min.js"></script>
    <script src="../contents/plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../contents/js/jquery.magnific-popup.min.js"></script>
    <script src="../contents/plugins/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <script src="../contents/js/main_custom.js"></script>
</body>
</html>