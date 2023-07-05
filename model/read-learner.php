<?php 
// Recuperation d'un seul apprenant
    if(isset($_GET['lid'])){
        include("connection.php");
        $request = $db->prepare('SELECT * FROM apprenant JOIN promotion using(id_pro) WHERE id_app = :id_app');
        $request->execute(array('id_app'=> $_GET['lid']));
        $apprenant = $request->fetch();

        // fermeture de la requête
        $request->closeCursor();
    }
?>