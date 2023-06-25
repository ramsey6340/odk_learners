<?php 
// Creation d'une session pour l'administrateur
    $login = $_POST['login'];
    $password = $_POST['password'];

    if(isset($login) AND isset($password)){
        // connexion à la base de données
        include('connection.php');
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