<?php 
//Mise à jour des données d'un apprenant précis

    // Recuperation et echapement des données
    // $avatar = htmlspecialchars(basename($_FILES['avatar']['name']));
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $date_naissance = htmlspecialchars($_POST['date_naissance']);
    $promotion = htmlspecialchars($_POST['promotion']);
    $annee_cert = htmlspecialchars($_POST['annee_cert']);
    $id = (int)htmlspecialchars($_POST['id_app']);

    // Connexion à la base de donnée
    include('connection.php');
    $request = $db->query("SELECT matricule FROM apprenant WHERE id_app=$id");
    $apprenant = $request->fetch();
    // Vérification pour s'assurer qu'aucun champ n'est vide
    if($id==0 OR !isset($prenom) OR !isset($nom) OR !isset($email) OR !isset($telephone) OR !isset($date_naissance) OR !isset($promotion) OR !isset($annee_cert)){
        echo 'erreur';
    }
    else{
        // Calcule de l'age de l'apprenant
        $date = explode('-', $date_naissance);
        $age = 2023-$date[0];

        if (isset($_FILES['avatar']) AND $_FILES['avatar']['error']== 0){
            if ($_FILES['avatar']['size'] <= 1000000) {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['avatar']['name']);
                $extension_upload = $infosfichier['extension']; // recuperation de l'exension du fichier
                $extensions_autorisees = array('jpg', 'jpeg', 'png'); // un tableau des extensions accepté
                // Creation d'un nouveau nom pour l'image
                $matricule = $apprenant['matricule'];
                $photo = $matricule.'.'.$infosfichier['extension'];

                if (in_array($extension_upload, $extensions_autorisees)){
                    // On peut valider le fichier et le stocker définitivement
                    // On deplace le fichier du dossier temporaire vers mon propre dossier
                    move_uploaded_file($_FILES['avatar']['tmp_name'], '../media/uploads/'.$photo);
                    $name = basename($_FILES['avatar']['name']);
                    $_SESSION['photo'] = $photo;

                    $request = $db->prepare('UPDATE apprenant 
                        SET photo=:photo,
                        id_pro=:id_pro,
                        prenom=:prenom,
                        nom=:nom,  
                        email=:email,  
                        num_tel=:telephone,
                        age=:age,
                        date_naissance=:date_naissance,  
                        annee_cert=:annee_cert WHERE id_app=:id_app'
                        );
                    $request->execute(array(
                        'id_app' =>$id,
                        'photo' =>$photo,
                        'prenom' =>$prenom,
                        'nom' =>$nom,
                        'email' =>$email,
                        'telephone' =>$telephone,
                        'age'=>$age,
                        'date_naissance' =>$date_naissance,
                        'id_pro' =>$promotion,
                        'annee_cert' =>$annee_cert
                    ));

                    // fermeture de la requête
                    $request->closeCursor();

                }
            }
        }

        

        // Redirection vers une autre page
        header('Location: ../index.php');
    }
?>