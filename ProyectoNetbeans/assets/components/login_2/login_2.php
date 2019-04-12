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
    <link rel="stylesheet" type="text/css" href="./../../css/login_2.css">
</head>

<body>

    <div class="sidenav">
        <img class="center-block" src="./../../images/icono/white/cleaner256.png">
        <div class="login-main-text">
            <h2 class="text-center text-uppercase">chacha chachi</h2>
        </div>
    </div>
    <div class="main">
        <div class="col-md-8 col-sm-12">
            <div class="login-form">
                <form method="POST" action="./controller_2.php">
                    <h2 class="text-center text-uppercase">login</h2>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="usuario" class="form-control" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="contrasena" class="form-control" placeholder="Password">
                    </div>
                    <button id="boton" type="submit" class="btn btn-black">Login</button>

                </form>
                <h4 id="registro" class="text-center">¿Aún no eres cliente? <a href="./../sign_in_2/sign_in_2.html">REGÍSTRATE</a></h4>
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