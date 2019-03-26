<?php
// Inés Carazo Núñez
require 'funciones/conexion.php';
require 'funciones/funciones.php';
session_start();
if (isset($_POST["iniciar"])) {
    
    $usuario = $_POST['user'];
    $password = $_POST['password'];
    if (!comprobar($conexion, $usuario, $password)) {
        
        header("Location: http://localhost/repo/ONG/login.php");
    } else {
       
        $_SESSION['logueado'] = "Si";
        $_SESSION['usuario'] = $usuario;
       
    }
} elseif ($_SESSION['logueado'] == "Si") {
    
} else {
    header("Location: http://localhost/repo/ONG/login.php");
}
?>
<!DOCTYPE html>
<html>
<!-- Inés Carazo Núñez -->

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <!-- Font cousine -->
    <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
    <!--Fontawesome-->
    <link href="./../../vendors/font-awesome/fonts/fontawesome-webfont.woff" rel="application/font-woff">
    <link href="./../../vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--CSS de Bootstrap -->
    <link rel="stylesheet" href="./../../vendors/bootstrap/css/bootstrap.min.css" />
    <!--CSS propio-->
    <link rel="stylesheet" type="text/css" href="./../../css/login.css">
</head>

<body>
    <div id="contenedor" class="container-fluid">
        <section class="container">
            <div class="col-md-offset-5 col-md-2">
                <!-- <img id="logo" class="col-md-5" src="./../../images/icono/pink/cleaner128.png"> -->
            <h1 id="titulo">Login</h1>
            </div>
        </section>

        <section id="secForm" class="container">
            <div class="col-md-offset-3 col-md-6">
                <form id="formulario" action="/action_page.php">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" placeholder="Introduce el usuario" name="usuario">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="password" placeholder="Introduce la contraseña" name="password">
                    </div>
                    <!-- <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                    </div> -->
                    <input type="submit" class="btn btn-default" value="Aceptar">
                   
                </form> 
                <h4>¿Aún no eres cliente? <a href="./../sign_in/sign_in.html">REGÍSTRATE</a></h4>
            </div>
        </section>
    
    <div id="footer" class="container-fluid">
            <p>&copy;Inés Carazo Núñez 2019</p>
            Icons made by
            <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from
            <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by
            <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
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