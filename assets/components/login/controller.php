<?php
require_once './model.php';

session_start();

 if (!isset($_SESSION['isLogged']))
 {
     $_SESSION['isLogged'] = false;
 }


 /**
  * Redireccionar a la pagina home
  */
  function goHome() {
    $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/home/view.php';
    //$url= 'http://aglinformatica.es:6080/icarazo/assets/components/home/view.php';
    header("Location: $url"); 
    echo "OK";
}

 if ($_SESSION['isLogged'] == true)
{
    goHome();   
}



if (isset($_POST['login'])) 
{
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    $_SESSION['userLogueado'] = $usuario;
    $_SESSION['pwdLogueado'] = $contrasena;
    loginCorrecto($usuario, $contrasena);
    
    
}

/**
 * Nombre: loginCorrecto
 *   Entrada: $usuario: string,
 *            $contrasena: string
 *   Descripción: Comprueba si el usuario y la contraseña son correctos. Si son sorrectos se redirecciona al home
*/
function loginCorrecto($usuario, $contrasena)
{
    $modelClass = new modelClass();
    $result=$modelClass->comprobarLogin($usuario, $contrasena);
    if($result)
    {   
        $result2=$modelClass->buscarUsuario($usuario, $contrasena);
        print_r($result2);
       
        $rol = $result2->getRol();

        $_SESSION['userRol'] = $rol;
        $_SESSION['isLogged'] = true;
        goHome();
    }
    else
    {
        $_SESSION['isLogged'] = false;
        $message = "Login incorrecto";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

