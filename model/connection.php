<?php 
// Connexion à la base de données
     try{
        $db = new PDO('mysql:host=localhost; dbname=portail_odk', 'root', '',
         array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
?>