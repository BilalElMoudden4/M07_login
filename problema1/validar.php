<?php

    session_start();
    include "variables.php";

    // RECUPERAR INFORMACIÓ DEL FORMULARI
    $user = $_POST['usuari'] ?? null;
    $edat = $_POST['edat'] ?? null;
    $condicions = isset($_POST['condicions']);

    // Controlem que s'hagi informat l'usuari.
    if ($user !== null) {

        if (array_key_exists($user, $llistaUsuaris)) {

            $_SESSION['login'] = true;
            $_SESSION['usuari'] = $user;
            // Almacenar condicions com a cadena 'true' o 'false'
            $_SESSION['condicions'] = $condicions ? 'true' : 'false';
            
            header("Location: resultat.php");
            exit;

        } else {

            session_destroy();

            header("Location: index.html?error=Usuari no trobat");
            exit;
        }
        
    } else {

        header("Location: index.html?error=No has posat res");
        exit;
    }
?>
