<?php
include("../Conect.php");
session_start();
// Verificar si se proporcionó un ID de producto
if(isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Consultar detalles del producto
    $ConsultaProducto = "SELECT * FROM Productos WHERE Codigo_producto = '$id_producto'";
    $ResultadoProducto = $Conexion->query($ConsultaProducto);

    // Verificar si se encontró el producto
    if($rowProducto = $ResultadoProducto->fetch_assoc()) {
        $titulo = $rowProducto['Titulo_producto'];
        $contenido = $rowProducto['Contenido_producto'];
        $precio = $rowProducto['Precio_producto'];
        $foto = base64_encode($rowProducto['Foto_producto']);
        // Puedes agregar más información según sea necesario
    } else {
        // Manejar el caso en que no se encuentre el producto
        echo "Producto no encontrado";
    }
} else {
    // Manejar el caso en que no se proporcionó un ID de producto
    echo "<br>Error MySQL: " . $Conexion->error;
    echo "Código de producto no especificado";
}
echo "ID del Producto: " . $id_producto;
echo "ID de Usuario (sesión): " . $_SESSION['id'];
?>
<!---------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Styles.css">
    <title>Detalles del Producto</title>
</head>
<!---------------------------- Header ----------------------------------->
<?php include('../Include/Login_header.html'); ?>
<body>

<section class="product-details">
    <div class="product-card">
        <img class="product-image" src="data:image/<?php echo pathinfo($foto, PATHINFO_EXTENSION); ?>;base64, <?php echo $foto; ?>" alt="Producto">
        <h3><?php echo $titulo; ?></h3>
        <p><?php echo $contenido; ?></p>
        <p>Precio: <?php echo $precio; ?></p>
        <button class="buy-button" onclick="comprarProducto()">Comprar</button>
        <button class="buy-button" onclick="añadirAlCarrito()">Añadir al Carrito</button>
    </div>
</section>
<!-- Visualizar comentarios -->
<section class="comments-section">
    <h2>Comentarios (<?php echo obtenerContadorComentarios($Conexion, $id_producto); ?>)</h2>

    <?php
    // Consulta para obtener comentarios asociados a este producto con información de usuario
    $ConsultaComentarios = "SELECT Comentarios.Codigo_comentario, Cuenta.Usuario, Comentarios.Contenido, Comentarios.Fecha 
                            FROM Comentarios 
                            INNER JOIN Cuenta ON Comentarios.Usuario_id = Codigo
                            WHERE Comentarios.Productos_id = '$id_producto'";
    $ResultadoComentarios = $Conexion->query($ConsultaComentarios);

    // Verificar si hay comentarios
    if ($ResultadoComentarios) {
        if ($ResultadoComentarios->num_rows > 0) {
            echo '<ul>';
            while ($rowComentario = $ResultadoComentarios->fetch_assoc()) {
                echo '<li class="comment-card">';
                echo '<div class="comment-card-content">';
                echo '<strong>' . $rowComentario['Usuario'] . '</strong> - ' . date('F j, Y g:i a', strtotime($rowComentario['Fecha'])) . '<br>';
                echo $rowComentario['Contenido'];
                echo '</div>';
                echo '<div class="comment-options">';
                echo '<button class="like-button" onclick="likeComentario(' . $rowComentario['Codigo_comentario'] . ')">Like</button>';
                echo '<button class="reply-button" onclick="responderComentario(' . $rowComentario['Codigo_comentario'] . ')">Responder</button>';
                echo '</div>';
                echo '</li>';
                // Puedes mostrar más información del comentario si es necesario
            }
            echo '</ul>';
        } else {
            echo '<p>No hay comentarios aún.</p>';
        }
    } else {
        echo "Error en la consulta de comentarios: " . $Conexion->error;
    }

    function obtenerContadorComentarios($conexion, $id_producto) {
        $consultaContador = "SELECT COUNT(*) as total FROM Comentarios WHERE Productos_id = '$id_producto'";
        $resultadoContador = $conexion->query($consultaContador);
        $contador = $resultadoContador->fetch_assoc()['total'];
        return $contador;
    }
    ?>
</section>

<section class="comment-box">
    <h3>Deja un comentario:</h3>
    <form action="../Publicar/Publicar_comentario.php" method="POST">
        <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
        <textarea name="Contenido" id="Contenido" rows="4" cols="50" required></textarea>
        <br>
        <button type="submit" name="Publicar">Comentar</button>
    </form>
</section>

<script src="../javascript/Script.js"></script>
<!-- Aquí puedes agregar scripts adicionales si es necesario -->

</body>
</html>