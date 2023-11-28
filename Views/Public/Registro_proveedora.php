<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
<!---------------------------- Header ----------------------------------->
<?php include('../../Include/Header.html'); ?>
<!-- Este es el formulario para registrar nuestra cuenta mandamos los datos con el metodo POST lo mandamos a
Registro/Registro_cuenta -->
    <section>
    <form action="../../Registro_y_login/Registro_proveedora.php" method="POST">
            
             <h1>Registro proveedor@s</h1>
              <div >
                <h2>Ingresar su nombre(s)</h2>
                <input type="text" placeholder="Nombre" required autocomplete="off" name="Nombre"/>
              </div>
            <!-------------------------------------------------------------------------->  
            <div >
                <h2>Ingresar su correo</h2>
                <input type="email" placeholder= "Correo" required autocomplete="off" name="Correo"/>
            </div>
            <!-------------------------------------------------------------------------->
            <div>
                 <h2>Ingresar su contraseña</h2>
                 <input type="password" placeholder= "Contraseña" required autocomplete="off" name="Contraseña"/>
            </div>
            <!------------------------------------------------------------------------->
            <div >
                <h2>Ingresar su nombre de usuario</h2>
                <input type="text" placeholder= "Usuario" required autocomplete="off" name="Usuario"/>
            </div>
              <!------------------------------------------------------------------------>
            <button type="submit" class="button button-block" value="$Insertarcuenta" name="enviar" />registrarme</button>
            
            </form>
  
    </section>
</body>
</html>  