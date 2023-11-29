<?php
include('../Conect.php');

session_start();

if(isset($_POST['Publicar'])) {
    $Contenido = $_POST['Contenido'];
    $Usuario_id = $_SESSION['id'];

    // Obtén el id_producto de la URL
    if (isset($_GET['id'])) {
        $id_producto = $_GET['id'];

        // Insertar el comentario en la base de datos con la fecha actual y el id_producto
        $Insertar_comentario = "INSERT INTO Comentarios (Contenido, Fecha, Usuario_id,  Productos_id) VALUES ('$Contenido', NOW(), '$Usuario_id',  '$id_producto')";

        if(mysqli_query($Conexion, $Insertar_comentario)) {
            echo "<script> alert('Comentario publicado con éxito'); window.location= '../Views_publicar/Vista_comentario.php'</script>";
        } else {
            echo "<script> alert('Hubo un error al publicar el comentario. Por favor, inténtelo de nuevo.'); window.location= 'comentario_form.php'</script>";
        }
    } else {
        echo "<script> alert('No se proporcionó el ID del producto. Por favor, vuelve a la página de detalles del producto.'); window.location= '../Views/Mercado.php'</script>";
    }
}

mysqli_close($Conexion);
?>