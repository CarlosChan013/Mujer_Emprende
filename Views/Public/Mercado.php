<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Styles.css">
    <title>Mercado</title>
</head>
<body>

<?php
include("../../Conect.php");
session_start();

// Verificar si el usuario está logeado
if (isset($_SESSION['id'])) {
    // Mostrar el header para usuarios logeados
    include('../../include/Login_header.html');
} else {
    // Mostrar el header normal para usuarios no logeados
    include('../../include/Header.html');
}
?>

<section>
    <img class="Fondo_mercado" src="../../Assets/Img/Fondo_mercado.png" alt="Fondo_mercado">
</section>

<!-- Aquí va un pequeño ordenador, por ejemplo, si aprieta a precio, lo puede seleccionar para que
aparezca de más caro a barato y viceversa, para ordenar los productos que se ofrecen -->
<style>
    .card {
        border: 1px solid #000;
        border-radius: 10px;
        margin: 10px;
        padding: 10px;
        width: 200px; /* Ajusta el ancho según tus preferencias */
        display: inline-block;
        text-align: center;
        background-color: #fff;
    }

    .product-image {
        max-height: 100px;
        margin-bottom: 10px;
    }

    .buy-button {
        background-color: #E68989;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<section>
    <?php
    $Consulta = "SELECT Codigo_producto, Titulo_producto, Contenido_producto, Precio_producto, Foto_producto FROM Productos";
    $Resultado = $Conexion->query($Consulta);

    while($row = $Resultado->fetch_assoc()) { ?>
        <div class="card">
            <img class="product-image" src="data:image/<?php echo pathinfo($row['Foto_producto'], PATHINFO_EXTENSION); ?>;base64, <?php echo base64_encode($row['Foto_producto']); ?>" alt="Producto">
            <h3><?php echo $row['Titulo_producto']; ?></h3>
            <p><?php echo $row['Contenido_producto']; ?></p>
            <p>Precio: <?php echo $row['Precio_producto']; ?></p>
            <a class="buy-button" href="./Producto_detalles.php?id=<?php echo $row['Codigo_producto']; ?>">Comprar</a>
        </div>
    <?php } ?>
</section>

<script>
    function addToCart(productTitle) {
        // Puedes agregar lógica adicional aquí para manejar la adición al carrito
        // Por ahora, simplemente redireccionamos a la página del carrito
        window.location.href = './Producto.php';
    }
</script>

<!-- Agregar un botón para que lo redirija al formulario para publicar una historia (solo si está logeado) -->
<div>
    <button type="button"><a href="../../Views_publicar/Vista_producto.php">Publicar producto</a></button>
</div>

<!-- Footer -->
<?php include('../../Include/Footer.html'); ?>
</body>
</html>