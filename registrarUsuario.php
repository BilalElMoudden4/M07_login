<?php

include 'dbConf.php';

$connexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

try {
    if ($connexion) {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $rol = $_POST['rol'];
        if (isset($_POST['active'])){
            $active = 1;
        }
        else{
            $active = 0;
        }
        $query = "INSERT INTO user (user_id, name, surname, password, email, rol, active) VALUES ('$user_id', '$name', '$surname', '$password', '$email', '$rol', '$active')";
        $resultado = mysqli_query($connexion, $query);
        if ($resultado) {
            header('Location: resultado.php');
        } else {
            header('Location: http://localhost/M07-PHP/Practica4_M07_Login/');
        }
    }
} catch (Exception $e) {
    echo "Error de connexió a la base de dades: " . $e->getMessage();
} finally {
    mysqli_close($connexion);
}