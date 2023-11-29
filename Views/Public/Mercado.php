<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Styles.css">
    <title>Mercado</title>

    <style>
        /* Estilos para hacer la página más responsiva */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Estilos para el header */
        header {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
        }

        /* Estilos para las secciones */
        section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            max-width: 1200px;
        }

        /* Estilos para las tarjetas de productos */
        .card {
            border: 1px solid #000;
            border-radius: 10px;
            margin: 10px;
            padding: 10px;
            width: calc(30% - 20px); /* Ajuste del ancho según las preferencias */
            text-align: center;
            background-color: #fff;
        }

        .product-image {
            max-height: 100px;
            margin-bottom: 10px;
            width: 100%;
            object-fit: cover;
        }

        .buy-button {
            background-color: #E68989;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        /* Estilos para el footer */
        footer {
            background-color: #999BCC;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .footer-section {
            flex: 1;
            margin: 10px;
        }

        .footer-divider {
            border-left: 1px solid #fff;
            height: 40px;
            margin: 0 20px;
        }

        .footer-section h2 {
            font-size: 1.2em;
        }

        .footer-bottom {
            margin-top: 20px;
        }

        .conditions-link {
            color: #fff;
            text-decoration: none;
        }
    </style>
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

    <section>
        <?php
        $Consulta = "SELECT Codigo_producto, Titulo_producto, Contenido_producto, Precio_producto, Foto_producto FROM Productos";
        $Resultado = $Conexion->query($Consulta);

        while ($row = $Resultado->fetch_assoc()) { ?>
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
    <div style="text-align: center; margin-top: 20px;">
        <button type="button"><a href="../../Views_publicar/Vista_producto.php">Publicar producto</a></button>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h2>Dirección</h2>
                <p>Av Miguel Hidalgo ruta 5</p>
            </div>
            <div class="footer-divider"></div>
            <div class="footer-section">
                <h2>Número de teléfono</h2>
                <p>+52 9985547381</p>
            </div>
            <div class="footer-divider"></div>
            <div class="footer-section">
                <h2>EMAIL</h2>
                <p>tostaruydo@gufum.com</p>
            </div>
            <div class="footer-divider"></div>
            <div class="footer-section">
                <h2>Equipo de desarrollo:</h2>
                <p>TSU. Chan Lugo Carlos Manuel</p>
                <p>TSU. Perez Couoh Jose Angel</p>
                <p>TSU. García Hernandez Ricardo</p>
                <p>TSU. Ramirez Morales Kevin Rigoberto</p>
            </div>
        </div>
        <div class="footer-bottom">
            <a href="ruta-a-tu-pagina-de-condiciones.html" class="conditions-link">Copyrights@MujerEmprende2023</a>
        </div>
    </footer>
</body>

</html>
