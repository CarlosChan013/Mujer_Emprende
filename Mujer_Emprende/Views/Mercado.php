<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Styles.css">
    <title>Mercado</title>
</head>
<body>
<!---------------------------- Header ----------------------------------->
<?php include('../Include/Header.html'); ?>
<section>
<img class="Fondo_mercado" src="../Assets/Img/Fondo_mercado.png" alt="Fondo_mercado">
</section>
<section>
    <!-- Aqui va un pequeño ordenador por eejmplo si aprieta a precio lo puede seleccionar para que
aparezca de mas caro a barato y viceversa de mas barato al mas caro. para ordenar los productos que
se ofrecen -->
</section>
<section>
    <!--aqui van los productos que se suban acomodarlos en una card por una fila de 4 productos con una margen entre cada card y borde
del final del ancho de la pagina, si se hace mas chica la apgina hay que hacerlo responsibe y en el tamaño mas
pequeño de anchura solo apareceran 2 cards de productos. (los productos se guardan en cards
iniciando con una foto del producto, Nombre, Pequeña descripción, puntuación,
Precio, boton de comprar (si el usuario no esta registrado al apretar el 
boton le manda un mensaje de "primero te tienes que registrar y lo manda al registro.php
 y si esta logeado lo redirreciona al carrito.php) y ver comentarios, si aprite comentarios, el usuario puede ver los ultimos 3 comentarios
que han hecho lo usuarios, cada comentario tiene foto, nombre, fecha de comentario y
el comentario todo esto en una card rectangular. ademas que al final de los 3 comentarios
 hay una caja donde dice comentar si el usuario no esta registrado al aprear el boton de comentar
le manda un mensaje diciendo "registrate para poder realizar comentarios" y si esta
registrado podra comentar sin ningun problema-->
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
</head>
<body>

<section>
<?php
include("../Conect.php");

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
<!-- Agregar un boton para que lo rediriga al formulario para publicar una historia (solo si esta logeado) -->
<div>
    <button type="button"><a href="../Views_publicar/Vista_producto.php">Publicar producto</a></button>
</div>
<!-- Footer -->
<?php include('../Include/Footer.html'); ?>
</body>

</html>  