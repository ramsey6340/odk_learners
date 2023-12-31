<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>

    <script defer src="js/script.js"></script>
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <?php include("nav.php"); ?>
        <!-- Contenue de la page principale -->
        <?php 
                $query = 'l';
                if(isset($_GET['q'])){
                    $query = $_GET['q'];
                }
                
                if($query == 'l'){
                    include("list.php");
                }
                elseif($query == 'e'){
                    include("edit.php");
                }
                else{
                    include("add-promotion.php");
                }
            ?>
    </main>
</body>

</html>