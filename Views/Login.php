<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<!---------------------------- Header ----------------------------------->
<?php include('../Include/Header.html'); ?>
<section >
      <form action="../Registro_y_login/Login.php" method="POST">
        <h1>Login</h1>
    
                <!-- ingresar el email -->
                <input type="text"  class="form-control" name="Usuario" required autocomplete="off" placeholder="Ingrese su usuario" />
                <!-- ingresar la contraseña -->
                <input type="password"  class="form-control" name="Contraseña" required autocomplete="off" placeholder="Ingrese su contraseña" />
                <!-- diseño del botom -->
                <button type="submit" class="button button-block" value="enviar" name="iniciar_sesion" />Ingresar</button>
            </form>
            <!--------------------------------------------------------------------->
            <!-- En caso de que se le olvidara la contraseña se redirecionara para que la pueda recuperar -->
            <a href="#">¿Se le olvido la contraseña? click aqui </a>
      </section>
</body>
</html>