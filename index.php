<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulari d'Usuari</title>
</head>



<body>
    
    <h1>Formulari d'Usuari</h1>
    <form action="procesar.php" method="POST">

        <label for="user_id">User_id:</label>
        <input type="text" name="user_id" required><br><br>

        <label for="nom">Nom:</label>
        <input type="text" name="name" required><br><br>

        <label for="cognom">Cognom:</label>
        <input type="text" name="surname" required><br><br>

        <label for="pwd">Contrasenya:</label>
        <input type="password" name="password" required><br><br>

        <label for="email">Correu electrònic:</label>
        <input type="email" name="email" required><br><br>
        
        <label for="rol">Rol:</label>
        <select name="rol" required>
            <option value="alumnat">Alumnat</option>
            <option value="professorat">Professorat</option>
        </select><br><br>
        
        <label for="active">Actiu:</label>
        <input type="checkbox" name="active"><br><br>

        <input type="submit" value="Afegir Usuari">

    </form> 

    <?php
        $user_id = $_POST["user_id"] ?? $_GET["user_id"] ?? "";
        $name = $_POST["name"] ?? $_GET["name"] ?? "";
        $surname = $_POST["surname"] ?? $_GET["surname"] ?? "";
        $password = $_POST["password"] ?? $_GET["password"] ?? "";
        $email = $_POST["email"] ?? $_GET["email"] ?? "";
        $rol = $_POST["rol"] ?? $_GET["rol"] ?? "";
        $active = isset($_POST["active"]) || isset($_GET["active"]) ? 1 : 0;
    ?>



</body>



</html>

