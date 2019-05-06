<?php
require_once './controller.php';

if (isset($_POST['registro'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['pwd'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $fnacimiento = $_POST['fnacimiento'];
    registroCliente($usuario, $contrasena, $nombre, $apellidos, $telefono, $correo, $fnacimiento);
}
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

    <div class="sidenav">
        <img class="center-block" src="./../../images/icono/white/cleaner256.png">
        <div class="login-main-text">
            <h2 class="text-center text-uppercase">chacha chachi</h2>
        </div>
    </div>
    <div class="main no-margin no-padding">
        <div class="col-md-8 col-sm-12 col-xs-12  no-margin no-padding">
            <h3 class="text-center text-uppercase">Registro - Nuevo cliente</h3>
            <div class="login-form no-margin no-padding">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <!-- <h2 class="text-center text-uppercase">SIGN IN - NEW CLIENT</h2> -->

                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" placeholder="Introduce el usuario" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Introduce la contraseña" name="pwd" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Introduce el nombre" name="nombre" required>

                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" placeholder="Introduce los apellidos" name="apellidos" required>

                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input type="number" class="form-control" id="telefono" placeholder="Introduce el telefono" name="telefono" required>

                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" id="correo" placeholder="Introduce el correo" name="correo" required>

                    </div>
                    <div class="form-group">
                        <label for="fnacimiento">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fnacimiento" name="fnacimiento" required>

                    </div>
                    <button id="boton" name="registro" type="submit" class="btn btn-black">Registrarse</button>

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

</footer>

</html>