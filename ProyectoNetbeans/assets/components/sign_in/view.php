<?php
require_once './controller.php';
?>
<!DOCTYPE html>
<html>
<!-- Inés Carazo Núñez -->

<head>
    <title>Registro</title>
    <meta charset="UTF-8">
    <!-- Font cousine -->
    <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
    <!--Fontawesome-->
    <link href="./../../vendors/font-awesome/fonts/fontawesome-webfont.woff" rel="application/font-woff">
    <link href="./../../vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--CSS de Bootstrap -->
    <link rel="stylesheet" href="./../../vendors/bootstrap/css/bootstrap.min.css" />
    <!--CSS propio-->
    <link rel="stylesheet" type="text/css" href="./../../css/sign_in.css">
</head>

<body>
<div class="container-fluid no-padding">
    <div class="sidenav col-md-5 col-sm-12 col-xs-12">
    <a href='./../login/view.php'>
        <img class="center-block" src="./../../images/icono/white/cleaner256.png">
    </a>
        <div class="login-main-text">
            <h2 class="text-center text-uppercase">chacha chachi</h2>
        </div>
    </div>
    <div class="main col-md-7 col-sm-12 col-xs-12">
            <h3 class="text-center text-uppercase">Registro - Nuevo cliente</h3>
            <div class="login-form no-margin no-padding">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="addUsuario" placeholder="Introduce el usuario" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="addPwd" placeholder="********" name="pwd" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="addNombre" placeholder="Introduce el nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" id="addApellidos" placeholder="Introduce los apellidos" name="apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">Dni:</label>
                        <input type="text" class="form-control" id="addDni" placeholder="00000000A" name="dni" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input type="number" class="form-control" id="addTelefono" placeholder="Introduce el telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" id="addCorreo" placeholder="Introduce el correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="fnacimiento">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="addFnacimiento" name="fnacimiento" required>
                    </div>
                    <button id="addCliente" name="addCliente" data-toggle="popover" title="Popover title" 
        data-content="And here's some amazing content. It's very engaging. Right?" type="submit" class="btn btn-black">Registrarse</button>
                </form>
        </div>
    </div>
</div>
</body>

<footer>
    <!--jQuery-->
    <script src="./../../vendors/jquery/jquery.min.js "></script>
    <!--Boostrap-->
    <script src="./../../vendors/bootstrap/js/bootstrap.min.js "></script>
    <!--MainScripts-->
    <script type="text/javascript " src="./../../js/main.js "></script>
    <script type="text/javascript " src="./../../js/clientes.js "></script>
</footer>

</html>