<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
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
            <div><p style="font-weight: bold;">Inscription</p></div>
            <form action="./model/signup.php" method="post">
                <div class="form-input">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom">
                </div>

                <div class="form-input">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom">
                </div>

                <div class="form-input">
                    <label for="login">Pseudo</label>
                    <input type="text" id="login" name="login">
                </div>

                <div class="form-input">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="submit-button">
                    <input type="submit" value="Valider">
                </div>
                <br>
            </form>
        </div>
    </div>
    <p  style="text-align: center;"><a href="signin.php"  style="color: black; ">Se connecté</a></p>
</body>
</html>
