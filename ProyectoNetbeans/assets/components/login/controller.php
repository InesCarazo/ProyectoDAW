<?php
require_once './model.php';

session_start();

 if (!isset($_SESSION['isLogged']))
 {
     $_SESSION['isLogged'] = "empty";
 }



if (isset($_POST['login'])) 
{
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $_SESSION['userLogueado'] = $usuario;
    $_SESSION['pwdLogueado'] = $contrasena;
    loginCorrecto($usuario, $contrasena);
    
    
}

function loginCorrecto($usuario, $contrasena)
{
    $modelClass = new modelClass();
    $result=$modelClass->comprobarLogin($usuario, $contrasena);
    if($result)
    {   
        $_SESSION['isLogged'] = "Si";
    }
    else
    {
        $_SESSION['isLogged'] = "No";
    }
}

if ($_SESSION['isLogged'] == "Si")
    {
        $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/home/view.php';
        //$url= 'http://aglinformatica.es:6080/icarazo/assets/components/home/view.php';
        header("Location: $url"); 
        echo "OK";
    }
    elseif($_SESSION['isLogged'] == "No")
    {
        $message = "Login incorrecto";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    elseif($_SESSION['isLogged'] == "empty")
    {
    }