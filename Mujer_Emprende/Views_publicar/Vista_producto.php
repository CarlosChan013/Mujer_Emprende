<?php
// Inicia la sesión para acceder a la información del usuario
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Styles.css">
    <title>Mercado</title>
</head>
<header>
<!---------------------------- Header ----------------------------------->
     <?php include('../Include/Header.html'); ?>
     <form action="../cerrar_sesion.php" method="POST">
        <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
    </form>
</header>
<body>
<h1>Publicar productos</h1>
<form action="../Publicar/Publicar_producto.php" method="POST" enctype="multipart/form-data">
    <label for="Titulo">Nombre del producto:</label>
    <input type="text" name="Titulo_producto" id="Titulo" required>
    
    <label for="Contenido_producto">Descripcion:</label>
    <input type="text" name="Contenido_producto" id="Contenido" required>

    <label for="Contenido_producto">Cantidad:</label>
    <input type="text" name="Cantidad" id="Contenido" required>

    <label for="precio">Precio:</label>
    <input type="number" name="Precio" id="Precio" required>

    <label for="img">Imagen</label>
    <input type="file" name="Foto" id="Foto" required>
    
    <button type="submit" name="Guardar">Publicar producto</button>
</form>

</body>
</html> 