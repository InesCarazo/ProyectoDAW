<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión</title>
    <!-- Font cousine -->
    <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
    <!--Fontawesome-->
    <link href="./../../vendors/font-awesome/fonts/fontawesome-webfont.woff" rel="application/font-woff">
    <link href="./../../vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--CSS de Bootstrap -->
    <link rel="stylesheet" href="./../../vendors/bootstrap/css/bootstrap.min.css" />
    <!-- CSS propio que usaremos para personalizar BS -->
    <link rel="stylesheet" type="text/css" href="./../../css/home.css">

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="./../../images/icono/pink/cleaner128.png">
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="?home" aria-expanded="false">Home</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Gestión</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                       <li><a href="?gestion=empleados" name="empleados">Empleados</a></li> 
                        <li><a href="?gestion=clientes" name="clientes">Clientes</a></li>
                        <li><a href="?gestion=casas" name="casas">Casas</a></li>
                        <li><a href="?gestion=tareas" name="tareas">Tareas</a></li>
                        <li><a href="?gestion=pagos" name="pagos">Pagos</a></li>
                    </ul>
                </li>
                <li>
                    <a href="?contacto">Contacto</a>
                </li>
                <li>
                    <a href="?cerrarsesion">Cerrar sesión</a>
                </li>
            </ul>

        </nav>
        <div id='content'>

<nav class='navbar navbar-default'>
    <div class='container-fluid'>

        <div class='navbar-header'>
            <button type='button' id='sidebarCollapse' class='navbar-btn'>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
        </div>
        <?php
require_once './controller.php';

if (isset($_GET["gestion"]))
 {
    $tipoGestion = $_GET["gestion"];
    echo tipoMenuGestion($tipoGestion);
}
if (isset($_GET["contacto"]))
 {
    contacto();
}
if (isset($_GET["cerrarsesion"]))
{
    cerrarSesion();
}
if (isset($_GET["home"]))
{
    volverAlHome();
}
if (isset($_GET['empleado'])) {
    $tipoForm = $_GET['empleado'];
    echo tipoFormEmpleados($tipoForm);
}

?>


</body>
<footer>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!--jQuery-->
    <script src="./../../vendors/jquery/jquery.min.js"></script>
    <!--Boostrap-->
    <script src="./../../vendors/bootstrap/js/bootstrap.min.js"></script>
    <!--MainScripts-->
    <script type="text/javascript" src="./../../js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</footer>

</html>