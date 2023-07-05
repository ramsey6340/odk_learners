<?php 
// Recuperation de tous les apprenants de la base de données

    // Connexion à la base de donnée
    include('connection.php');

    $request = $db->query('SELECT * FROM apprenant JOIN promotion using(id_pro)');
    $apprenants = array();

    while($data = $request->fetch()){
        $apprenants[] = $data;
    }

    // fermeture de la requête
    $request->closeCursor();
?>