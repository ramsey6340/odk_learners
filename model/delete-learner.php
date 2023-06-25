<?php 
// Suppression d'un seul apprenant
    if(isset($_GET['lid'])){
        include('connection.php');
        $request = $db->prepare('DELETE FROM apprenant WHERE id_app = :id_app');
        $request->execute(array('id_app' => $_GET['lid']));

        // fermeture de la requête
        $request->closeCursor();

        // Redirection vers une autre page
        header('Location: ../index.php');
    }
?>