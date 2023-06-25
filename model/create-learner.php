<?php
session_start();
// Ajout d'un nouveau apprenant dans la base de données

    // Recuperation et echapement des données
    $avatar = htmlspecialchars($_POST['avatar']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $date_naissance = htmlspecialchars($_POST['date_naissance']);
    $promotion = htmlspecialchars($_POST['promotion']);
    $annee_cert = htmlspecialchars($_POST['annee_cert']);


    // Vérification pour s'assurer qu'aucun champ n'est vide
    if(!isset($avatar) OR !isset($prenom) OR !isset($nom) OR !isset($email) OR !isset($telephone) OR !isset($date_naissance) OR !isset($promotion) OR !isset($annee_cert)){
        echo 'erreur';
    }
    else{
        // Calcule de l'age de l'apprenant
        $date = explode('-', $date_naissance);
        $age = 2023-$date[0];
        

        // Creation du matricule pour l'apprenant
        $code = str_shuffle('A1B2C3D4E5F6G7H8I9J0'); // On melange les caractères
        $fourth = substr($code, 0,4); // on extrait les 4 première caractere
        $matricule = $promotion.$fourth; // On concatène la promotion au 4 première caractère

        // Connexion à la base de donnée
        include('connection.php');

        $request = $db->prepare('INSERT INTO apprenant(id_adm, matricule, nom, prenom, age, date_naissance, email, telephone, photo, promotion, annee_cert) VALUES(:id_adm, :matricule, :nom, :prenom, :age, :date_naissance, :email, :telephone, :photo, :promotion, :annee_cert)');
        $request->execute(array(
            'id_adm'=>$_SESSION['admin']['id_adm'],
            'matricule'=>$matricule,
            'nom'=>$nom, 
            'prenom'=>$prenom, 
            'age'=>$age, 
            'date_naissance'=>$date_naissance, 
            'email'=>$email, 
            'telephone'=>$telephone, 
            'photo'=>$avatar, 
            'promotion'=>$promotion, 
            'annee_cert'=>$annee_cert
        ));

        // fermeture de la requête
        $request->closeCursor();

        // Redirection vers une autre page
        header('Location: ../index.php?q=e');
    }
?>