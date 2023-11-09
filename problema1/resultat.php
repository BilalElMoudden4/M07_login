<?php

    session_start();

    //Controlar si el login és true o false.
    if (!isset($_SESSION['login'])) {
        header("Location: index.html");
        exit;
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat</title>
</head>
<body>

    <h1>Hola, nom_Sessio  </h1>    

    <?php
        
        $nomUsuari = $_SESSION['usuari'];
        $acceptaCondicions = $_SESSION['condicions'];
        
        echo "<h1>Hola, $nomUsuari</h1>";
        if ($acceptaCondicions) {
            echo "Has acceptat les condicions d'ús.";
        } else {
            echo "No has acceptat les condicions d'ús";
        }
        
    ?>

    <br>
    <br>
    <a href="index.html">Tornar</a>
</body>
</html>