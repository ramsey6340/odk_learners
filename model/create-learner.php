<?php
session_start();
// Ajout d'un nouveau apprenant dans la base de données

    // Recuperation et echapement des données
    //$avatar = htmlspecialchars($_POST['avatar']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $date_naissance = htmlspecialchars($_POST['date_naissance']);
    $promotion = htmlspecialchars($_POST['promotion']);
    $annee_cert = htmlspecialchars($_POST['annee_cert']);

    $error_message = array();
    // Vérification pour s'assurer qu'aucun champ n'est vide
    if(!isset($_FILES['avatar']) OR !isset($prenom) OR !isset($nom) OR !isset($email) OR !isset($telephone) OR !isset($date_naissance) OR !isset($promotion) OR !isset($annee_cert)){
        $error_message[] = "Une des champs obligatoire est vide";
    }
    else{
         // Calcule de l'age de l'apprenant
         $date = explode('-', $date_naissance);
         $age = 2023-$date[0];
         
 
         // Creation du matricule pour l'apprenant
         $code = str_shuffle('A1B2C3D4E5F6G7H8I9J0'); // On melange les caractères
         $fourth = substr($code, 0,4); // on extrait les 4 première caractere
         $matricule = $promotion.$fourth; // On concatène la promotion au 4 première caractère



        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['avatar']) AND $_FILES['avatar']['error']== 0) {
            // Testons si le fichier n'est pas trop gros (s'il n'est pas plus grand que 1Mo. NB: la taille est exprimé en octet)
            if ($_FILES['avatar']['size'] <= 1000000) {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['avatar']['name']);
                $extension_upload = $infosfichier['extension']; // recuperation de l'exension du fichier
                $extensions_autorisees = array('jpg', 'jpeg', 'png'); // un tableau des extensions accepté
                // Creation d'un nouveau nom pour l'image
                $photo = $matricule.'.'.$infosfichier['extension'];
                //rename(basename($_FILES['avatar']['name']), $photo);
                if (in_array($extension_upload, $extensions_autorisees)) {
                    // On peut valider le fichier et le stocker définitivement
                    // On deplace le fichier du dossier temporaire vers mon propre dossier
                    move_uploaded_file($_FILES['avatar']['tmp_name'], '../media/uploads/'.$photo);
                    $name = basename($_FILES['avatar']['name']);
                    $_SESSION['photo'] = $photo;

                    // Traitement de la promotion
                    $taille = strlen($promotion);
                    $var = (int)$promotion[1];
                    if($taille==2 AND $var!=0 AND $promotion[0]=='P'){
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
                            'photo'=>$photo, 
                            'promotion'=>$promotion, 
                            'annee_cert'=>$annee_cert
                        ));
                        
                        // fermeture de la requête
                        $request->closeCursor();
                    }
                    else{
                        $error_message[] = "Le format de la promotion est incorrecte. Il doit être de la forme PX avec X le numero de la promotion";
                    }

                }
                else{
                    $error_message[] = "Le type de fichier choisie n'est pas prie en charge, Veuillez recommencer";
                }
            }
            else{
                $error_message[] = "La taille du fichier est plus grand que 1Mo, Veuillez recommencer";
            }
        }
        else{
            $error_message[] = "Une erreur s'est pproduit lors de l'upload de l'image, Veuillez recommencer";
        }


        
        $_SESSION['error'] = $error_message;

        // Redirection vers une autre page
        header('Location: ../index.php?q=e');
    }
?>