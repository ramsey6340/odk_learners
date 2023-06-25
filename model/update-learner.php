<?php 
//Mise à jour des données d'un apprenant précis

    // Recuperation et echapement des données
    $avatar = htmlspecialchars($_POST['avatar']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $date_naissance = htmlspecialchars($_POST['date_naissance']);
    $promotion = htmlspecialchars($_POST['promotion']);
    $annee_cert = htmlspecialchars($_POST['annee_cert']);
    $id = (int)htmlspecialchars($_POST['id_app']);

    // Vérification pour s'assurer qu'aucun champ n'est vide
    if($id==0 OR !isset($avatar) OR !isset($prenom) OR !isset($nom) OR !isset($email) OR !isset($telephone) OR !isset($date_naissance) OR !isset($promotion) OR !isset($annee_cert)){
        echo 'erreur';
    }
    else{
        // Calcule de l'age de l'apprenant
        $date = explode('-', $date_naissance);
        $age = 2023-$date[0];

        // Connexion à la base de donnée
        include('connection.php');

        $request = $db->prepare('UPDATE apprenant 
            SET photo=:photo,
            prenom=:prenom,
            nom=:nom,  
            email=:email,  
            telephone=:telephone,
            age=:age,
            date_naissance=:date_naissance,  
            promotion=:promotion, 
            annee_cert=:annee_cert WHERE id_app=:id_app'
            );
        $request->execute(array(
            'id_app' =>$id,
            'photo' =>$avatar,
            'prenom' =>$prenom,
            'nom' =>$nom,
            'email' =>$email,
            'telephone' =>$telephone,
            'age'=>$age,
            'date_naissance' =>$date_naissance,
            'promotion' =>$promotion,
            'annee_cert' =>$annee_cert
        ));

        // fermeture de la requête
        $request->closeCursor();

        // Redirection vers une autre page
        header('Location: ../index.php');
    }
?>