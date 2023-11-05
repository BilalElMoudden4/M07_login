<?php
// Incluye un archivo llamado "resultado.php". Puede contener funciones o código adicional necesario.
include("resultado.php");

// Define las constantes para la información de la base de datos.
define('DB_HOST', 'localhost');  // Host de la base de datos.
define('DB_NAME', 'users');     // Nombre de la base de datos.
define('DB_USER', 'root');      // Nombre de usuario de la base de datos.
define('DB_PSW', '');           // Contraseña de la base de datos.
define('DB_PORT', '3306');      // Puerto de la base de datos.

// Establece una conexión a la base de datos utilizando los datos definidos anteriormente.
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

// Verifica si la conexión a la base de datos se realizó con éxito.
if (!$connect) {
    echo "Error de conexión: " . mysqli_connect_error(); // Muestra un mensaje de error en caso de fallo en la conexión.
} else {
    // Realiza una consulta SQL para seleccionar todos los registros de la tabla "user".
    $query = "SELECT * FROM user";
    $products = mysqli_query($connect, $query);
}

// Recopila datos del formulario enviado a través del método POST.
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$password = $_POST['password'];
$email = $_POST['email'];
$rol = $_POST['rol'];

// Comprueba si la casilla de verificación "active" está marcada en el formulario.
if (isset($_POST['active'])) {
    $active = 1; // Establece $active en 1 si está marcada.
} else {
    $active = 0; // Establece $active en 0 si no está marcada.
}

// Prepara una consulta SQL para insertar datos en la tabla "user" utilizando una declaración preparada.
$query = "INSERT INTO user (user_id, name, surname, password, email, rol, active) VALUES (?, ?, ?, ?, ?, ?, ?)";
$statement = mysqli_prepare($connect, $query);

// Verifica si la declaración preparada se creó con éxito.
if ($statement) {
    // Enlaza las variables con la declaración preparada y ejecuta la inserción de datos.
    mysqli_stmt_bind_param($statement, 'isssssi', $user_id, $name, $surname, $password, $email, $rol, $active);
    mysqli_stmt_execute($statement);

    // Cierra la declaración preparada y la conexión a la base de datos.
    mysqli_stmt_close($statement);
    mysqli_close($connect);
} else {
    echo "Error en la consulta: " . mysqli_error($connect); // Muestra un mensaje de error si la preparación de la consulta falla.
}
?>
