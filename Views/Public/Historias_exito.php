<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/Styles.css">
    <title>Historias de éxito</title>

    <style>
        .historia-card {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            max-width: 300px; /* Reducir el ancho de la tarjeta */
            text-align: center; /* Centrar el contenido */
        }

        .historia-image {
            max-width: 100%; /* Ajustar la imagen al 100% del contenedor */
            height: auto;
            margin-bottom: 10px; /* Espaciado inferior */
        }

        .ver-detalles-link {
            color: black;
            text-decoration: none;
            font-weight: bold;
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
    include('../../Include/Login_header.html');
} else {
    // Mostrar el header normal para usuarios no logeados
    include('../../Include/Header.html');
}
?>

<section>
    <img class="Fondo_historias" src="../../Assets/Img/Historias_de_exito.png" alt="Fondo_historias">
</section>

<!-- Historias -->
<section>
    <?php
    $Consulta = "SELECT Codigo_historia, Titulo_historia, Breve_descripcion_historia, Imagen FROM Historias";
    $ResultadoHistorias = $Conexion->query($Consulta);

    while ($rowHistoria = $ResultadoHistorias->fetch_assoc()) {
        ?>
        <div class="historia-card">
            <img class="historia-image" src="data:image/<?php echo pathinfo($rowHistoria['Imagen'], PATHINFO_EXTENSION); ?>;base64, <?php echo base64_encode($rowHistoria['Imagen']); ?>" alt="Historia Image">
            <h2><?php echo $rowHistoria['Titulo_historia']; ?></h2>
            <p><?php echo $rowHistoria['Breve_descripcion_historia']; ?></p>
            <a class="ver-detalles-link" href="./Historia_detalle.php?id=<?php echo $rowHistoria['Codigo_historia']; ?>">Ver Detalles</a>
        </div>
        <?php
    }
    ?>
</section>

<!-- Agregar un botón para redirigir al formulario para publicar una historia (solo si está logueado) -->
<div>
    <button type="button"><a href="../../Views_publicar/Vista_historia.php">Publicar historia</a></button>
</div>

<!-- Footer -->
<?php include('../../Include/Footer.html'); ?>
</body>
</html>
