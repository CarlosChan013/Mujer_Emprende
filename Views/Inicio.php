<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mujer Emprende</title>
</head>
<body>
<header>
    <?php include('../Include/Header.html'); ?>
</header>

<?php
// Inicia la sesión para acceder a la información del usuario
session_start();

// Verifica si el usuario tiene una sesión activa y si tiene un rol asignado
if(isset($_SESSION['Rol'])) {
    $rol = $_SESSION['Rol'];

    // Muestra un encabezado diferente según el rol del usuario
    if ($rol == 2) {
        echo "<h1>Bienvenido, Usuario</h1>";
    } elseif ($rol == 3) {
        echo "<h1>Bienvenido, Proveedor</h1>";
    } 
} else {
    // Si no hay sesión activa, muestra un mensaje predeterminado
    echo "<h1>Bienvenido</h1>";
}
?>

</body>
</html>
