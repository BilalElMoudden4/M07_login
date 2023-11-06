<?php

include "dbConf.php";

try {
    $connexion = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    if ($connexion) {
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$pwd'";

        $resultado = mysqli_query($connexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            header("Location: perfil.php?email=$email");
        } else {
            header("Location: http://localhost/M07-PHP/Practica4_M07_Login/");
            echo "Login incorrecte";
        }
    }
} catch (Exception $e) {
    echo "Error de connexió a la base de dades: " . $e->getMessage();
} finally {
    // Cerrar la conexión a la base de datos
    mysqli_close($connexion);
}


?>