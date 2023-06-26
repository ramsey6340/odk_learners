<?php 
// Creation d'une session pour l'administrateur
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if(isset($prenom) AND isset($nom) AND isset($login) AND isset($password)){
        // connexion à la base de données
        include('connection.php');

        // Creation d'un nouveau administrateur
        $request = $db->prepare('INSERT INTO administrateur(nom, prenom, login, password) VALUES(:nom, :prenom, :login, :password)');
        $request->execute(array(
            'prenom'=>$prenom,
            'nom'=>$nom,
            'login'=>$login,
            'password'=>$password
        ));

        // Recuperation de l'administrateur pour créer une session
        $request = $db->prepare('SELECT * FROM administrateur WHERE login=:login AND password=:password');
        $request->execute(array(
            'login'=>$login,
            'password'=>$password
        ));

        $admin = $request->fetch();

        if($admin['nom']==''){
            // Redirection vers une autre page
            header('Location: ../signin.php');
        }
        else{
            // initialisation de la session
            session_start();
            // creation des variables de session
            $_SESSION['admin'] = $admin;
        
            // fermeture de la requête
            $request->closeCursor();

            // Redirection vers une autre page
            header('Location: ../index.php');
        }
    }
?>