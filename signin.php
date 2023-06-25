<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="signin-main">
        <div class="section-left">
            <!-- Logo de ODK -->
            <div class="logo-signin">
                <p style="text-align: center;"><img src="media/images/odk.png" alt=""></p>
            </div>
        </div>
        <div class="form-login">
            <div><p style="font-weight: bold;">Connexion</p></div>
            <form action="./model/login.php" method="post">
                <div class="form-input">
                    <label for="login">Pseudo</label>
                    <input type="text" id="login" name="login">
                </div>

            <div class="form-input">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password">
            </div>

                <div class="submit-button">
                    <input type="submit" value="Connexion">
                </div>
                <br>
            </form>
        </div>
    </div>
</body>
</html>
