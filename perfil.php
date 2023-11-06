<?php

include 'dbConf.php';

try {
    $connexion = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    if ($connexion) {
        $email = $_GET['email'];
        $query = "SELECT * FROM user WHERE email = '$email'";
        $resultado = mysqli_query($connexion, $query); // Use $connexion here instead of $conn
    }
} catch (Exception $e) {
    echo "Error en la conexión a la base de datos: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Perfil d'Usuari</title>
</head>

<body>
    <h1>Perfil d'Usuari</h1>
    <?php
    if (isset($resultado) && mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_array($resultado);
        $name = $row['name'];
        $email = $row['email'];
        $surname = $row['surname'];
        $rol = $row['rol'];

        if (isset($rol)) {
            if ($rol === 'alumnat') {
                echo "<p>Soc un $rol</p>";
                echo "<p>Nom: $name</p>";
                echo "<p>Cognom: $surname</p>";
                echo "<p>Email: $email</p>";
            } else if ($rol === 'professorat') {
                echo "<p>Hola $name , ets $rol !!</p>";
                echo "<p>Nom: $name</p>";
                echo "<p>Cognom: $surname</p>";
                echo "<p>Email: $email</p>";
                echo "<h2>Llista d'usuaris en la base de dades:</h2>";
                $query = "SELECT * FROM user";
                $allUsers = mysqli_query($connexion, $query); // Use $connexion here

                if (mysqli_num_rows($allUsers) > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>Nom</th><th>Cognom</th></tr>";

                    foreach ($allUsers as $user) {
                        echo "<tr><td>{$user['name']}</td><td>{$user['surname']}</td></tr>";
                    }

                    echo "</table>";
                }
            }
        }
    }
    ?>
</body>

</html>
