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
<div class="main ">
    <section class="signup mb-0">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <?php
                    if (isset($_SESSION["isExistMsg"])){
                        echo $_SESSION["isExistMsg"];
                        unset($_SESSION["isExistMsg"]);
                    }
                    ?>
                    <h2 class="form-title">Sign up</h2>
                    <form action="dataprocess/registration_process.php" method="post" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="fullname" id="name" placeholder="Your Name" required autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" required autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <label><i class="zmdi zmdi-border-color"></i></label>
                            <select name="type" class="chng">
                                <option value="-"disabled selected>---------------Select your option-------------</option>
                                <option value="moderator">Moderator</option>
                                <option value="user">User</option>
                            </select>
                            <label class="relative"><i class="zmdi zmdi-chevron-down"></i></label>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" required autocomplete="off"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit btn btn-outline-light bg-danger" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="../contents/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="login.php" class="signup-image-link">I am already member</a>
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