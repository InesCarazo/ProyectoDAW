<?php

require_once './controller.php';
?>
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

            <?php
            echo menuHome();
            ?>
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
if (isset($_GET['cliente'])) {
    $tipoForm = $_GET['cliente'];
    echo tipoFormClientes($tipoForm);
}
if (isset($_GET['casa'])) {
    $tipoForm = $_GET['casa'];
    echo tipoFormCasas($tipoForm);
}
if (isset($_GET['tarea'])) {
    $tipoForm = $_GET['tarea'];
    echo tipoFormTareas($tipoForm);
}
if (isset($_GET['perfil'])){
    $tipoForm = $_GET['perfil'];
    echo tipoFormPerfil($tipoForm);
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
    <!-- Validaciones -->
    <script type="text/javascript" src="./../../js/empleados.js"></script>
    <script type="text/javascript" src="./../../js/clientes.js"></script>
    <script type="text/javascript" src="./../../js/casas.js"></script>
    <script type="text/javascript" src="./../../js/tareas.js"></script>
    <!-- Validaciones -->
    <script type="text/javascript" src="./../../js/main.js"></script>
    
</footer>

</html>