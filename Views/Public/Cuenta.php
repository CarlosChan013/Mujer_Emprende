<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        /* Estilos para el header */
        header {
            
            color: white;
            padding: 10px;
            text-align: center;
        }

        /* Estilos para las secciones */
        section {
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        section div {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            color: #333;
        }

        p {
            color: #666;
        }

        .cta {
            display: inline-block;
            padding: 10px 20px;
            background-color: #E68989;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        .cta:hover {
            background-color: #d66;
        }

        a {
            color: #E68989;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #d66;
        }
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
    <!-- Header -->
    <header>
        <?php include('../../Include/Header.html'); ?>
    </header>

    <!-- Secciones de registro -->
    <section>
        <div>
            <div>
                <div>
                    <h2>Bienvenid@s</h2>
                    <p>¿Tienes una cuenta? Inicia sesión</p>
                    <h3><a href="../Public/Login.php" class="cta">Iniciar sesión</a></h3>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div>
            <div>
                <div>
                    <h1>¿No tienes una cuenta?</h1>
                    <p class="cuenta-gratis">Es 100% gratis</p>
                    <h3><a href="../Public/Registro.php">Registrarse</a></h3>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div>
            <div>
                <div>
                    <h1>¿Quieres ofrecer tus productos y publicar historias?</h1>
                    <h3><a href="../Public/Registro_proveedora.php">Regístrate aquí</a></h3>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2>Regístrate con Google</h2>
        <!-- Puedes agregar contenido para el registro con Google si es necesario -->
    </section>

    <!-- Footer -->
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
