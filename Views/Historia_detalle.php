<?php
include("../Conect.php");
session_start();

// Verificar si se proporcionó un ID de historia
if(isset($_GET['id'])) {
    $id_historia = $_GET['id'];

    // Consultar detalles de la historia
    $ConsultaHistoria = "SELECT * FROM Historias WHERE Codigo_historia = '$id_historia'";
    $ResultadoHistoria = $Conexion->query($ConsultaHistoria);

    // Verificar si se encontró la historia
    if($rowHistoria = $ResultadoHistoria->fetch_assoc()) {
        $titulo = $rowHistoria['Titulo_historia'];
        $breve_descripcion = $rowHistoria['Breve_descripcion_historia'];
        $contenido = $rowHistoria['Contenido_historia'];
        $imagen = base64_encode($rowHistoria['Imagen']);
        // Puedes agregar más información según sea necesario
    } else {
        // Manejar el caso en que no se encuentre la historia
        echo "Historia no encontrada";
    }
} else {
    // Manejar el caso en que no se proporcionó un ID de historia
    echo "<br>Error MySQL: " . $Conexion->error;
    echo "Código de historia no especificado";
}
echo "ID de la Historia: " . $id_historia;
echo "ID de Usuario (sesión): " . $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Styles.css">
    <title>Detalles de la Historia</title>
</head>
<?php include('../Include/Login_header.html'); ?>
<body>

<section class="historia-details">
    <div class="historia-card">
        <img class="historia-image" src="data:image/<?php echo pathinfo($imagen, PATHINFO_EXTENSION); ?>;base64, <?php echo $imagen; ?>" alt="Historia">
        <h3><?php echo $titulo; ?></h3>
        <p><?php echo $breve_descripcion; ?></p>
        <p><?php echo $contenido; ?></p>
    </div>
</section>

<!-- Visualizar comentarios -->
<section class="comments-section">
    <h2>Comentarios (<?php echo obtenerContadorComentarios($Conexion, $id_historia); ?>)</h2>

    <?php
    // Consulta para obtener comentarios asociados a esta historia con información de usuario
    $ConsultaComentarios = "SELECT Comentarios_historias.Codigo_comentario_historias, Cuenta.Usuario, Comentarios_historias.Comentario, Comentarios_historias.Fecha 
                            FROM Comentarios_historias
                            INNER JOIN Cuenta ON Comentarios_historias.Usuario_id = Cuenta.Codigo
                            WHERE Comentarios_historias.Historia_id = '$id_historia'";
    $ResultadoComentarios = $Conexion->query($ConsultaComentarios);

    // Verificar si hay comentarios
    if ($ResultadoComentarios) {
        if ($ResultadoComentarios->num_rows > 0) {
            echo '<ul>';
            while ($rowComentario = $ResultadoComentarios->fetch_assoc()) {
                echo '<li class="comment-card">';
                echo '<div class="comment-card-content">';
                echo '<strong>' . $rowComentario['Usuario'] . '</strong> - ' . date('F j, Y g:i a', strtotime($rowComentario['Fecha'])) . '<br>';
                echo $rowComentario['Comentario'];
                echo '</div>';
                echo '<div class="comment-options">';
                // Puedes agregar botones adicionales o funcionalidades aquí
                echo '</div>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No hay comentarios aún.</p>';
        }
    } else {
        echo "Error en la consulta de comentarios: " . $Conexion->error;
    }

    function obtenerContadorComentarios($conexion, $id_historia) {
        $consultaContador = "SELECT COUNT(*) as total FROM Comentarios_historias WHERE Historia_id = '$id_historia'";
        $resultadoContador = $conexion->query($consultaContador);
        $contador = $resultadoContador->fetch_assoc()['total'];
        return $contador;
    }
    ?>
</section>

<section class="comment-box">
    <h3>Deja un comentario:</h3>
    <form action="../Publicar/Publicar_comentario.php" method="POST">
    <input type="hidden" name="id_historia" value="<?php echo $id_historia; ?>">
        <textarea name="Comentario" id="Comentario" rows="4" cols="50" required></textarea>
        <br>
        <button type="submit" name="Publicar">Comentar</button>
    </form>
</section>

<script src="../javascript/Script.js"></script>

</body>
</html>