<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <?php include("nav.php"); ?>
        <!-- Contenue de la page principale -->
        <?php 
                $query = $_GET['q'];
                if($query == 'l'){
                    include("list.php");
                }
                else{
                    include("edit.php");
                }
            ?>
    </main>
</body>

</html>