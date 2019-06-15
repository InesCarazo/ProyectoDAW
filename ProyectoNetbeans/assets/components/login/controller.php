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
      if($_SESSION['userRol'] == "CLIENTE"){
    $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/home/view.php?home=cliente';
    //$url= 'http://aglinformatica.es:6080/icarazo/assets/components/home/view.php?home=cliente';
    }
    else if($_SESSION['userRol'] == "EMPLEADO"){
        $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/home/view.php?home=empleado';
        //$url= 'http://aglinformatica.es:6080/icarazo/assets/components/home/view.php?home=empleado';
    }
    else if($_SESSION['userRol'] == "ADMIN"){
        $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/home/view.php?home=admin';
        //$url= 'http://aglinformatica.es:6080/icarazo/assets/components/home/view.php?home=admin';
    }
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
        $_SESSION['userID'] = $result2->getP_Usuario();
        $rol = $result2->getRol();
if ($rol == "EMPLEADO") {
        $result3=$modelClass->buscarEmpleado($result2->getP_Usuario());
        if ($result3->getIsAdmin() ==1) {
            $_SESSION['userRol'] = "ADMIN";
            $_SESSION['isLogged'] = true;
        }
        else
        {
            $_SESSION['userRol'] = $rol;
            $_SESSION['isLogged'] = true;
        }
}
else{
        $_SESSION['userRol'] = $rol;
        $_SESSION['isLogged'] = true;
}
        goHome();
    }
    else
    {
        $_SESSION['isLogged'] = false;
        $message = "Login incorrecto";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

