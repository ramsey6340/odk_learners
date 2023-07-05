<?php 
session_start();
// Creation d'une session pour l'administrateur
    $titre = htmlspecialchars($_POST['titre']);
    $nbApprenant = htmlspecialchars($_POST['nbApprenant']);
    $dateDebut = htmlspecialchars($_POST['dateDebut']);
    $dateFin = htmlspecialchars($_POST['dateFin']);

    // connexion à la base de données
    include('connection.php');

    // Creation d'une variable d'erreur
    $error_message = array();
    $isExist = false;
    if(isset($titre) AND isset($nbApprenant) AND isset($dateDebut) AND isset($dateFin)){
        $request = $db->query('SELECT DISTINCT titre FROM promotion');
        while($v = $request->fetch()){
            if($titre == $v['titre']){
                $isExist = true;
                break;
            }
        }

        if(!$isExist){
            if($nbApprenant>0){

                // Creation d'un nouveau administrateur
                $request = $db->prepare('INSERT INTO promotion(titre, nb_app, date_debut, date_fin) VALUES(:titre, :nbApprenant, :nbApprenant, :dateFin)');
                $request->execute(array(
                    'titre'=>$titre,
                    'nbApprenant'=>$nbApprenant,
                    'nbApprenant'=>$dateDebut,
                    'dateFin'=>$dateFin
                ));
                $_SESSION['success'] = 'success';
                // fermeture de la requête
                $request->closeCursor();
                header('Location: ../index.php?q=p');
            }
            else{
                $error_message[] = "Le nombre d'apprenant est incorrect";
            }
        }
        else{
            echo $isExist;
            $error_message[] = "Le nom de cette promotion existe déjà";
       }

        $_SESSION['error'] = $error_message;
        header('Location: ../index.php?q=p');
    }
?>