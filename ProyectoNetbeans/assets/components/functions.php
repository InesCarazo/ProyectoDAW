<?php

//////////////////////////////
// CONFIGURACION
/////////////////////////////

$config = Array(
  'isLocalServer' => true,  // Indicar si es en local en produccion
);

//////////////////////////////
// FUNCIONES
/////////////////////////////

/**
 * Cargar las urls del proyecto de forma dinamica si es en local o en produccion
 * 
 * @param String $path ruta relativa desde la base url
 */
if(!function_exists('redirect')) {
  function redirect($path) {
    global $config;

    $local_url = 'http://localhost/ProyectoDAW/ProyectoNetbeans/';
    $server_url = 'http://aglinformatica.es:6080/icarazo/';

    if ($config['isLocalServer'] == true) {
      return $local_url . $path;
    } else {
      return $server_url . $path;
    }
  }
}

/**
 * redireccionamiento hacia la pagina home
 */
if(!function_exists('goHome')) {
  function goHome() {
    $url = redirect('assets/components/home/view.php');
    header("Location: $url"); 
    echo "OK";
  }
}

/**
 * Revisa los permisos del usuario y le deja acceder a rutas si el rol estan en los permitidos
 * 
 * @param Array $rols listado de los rols permitidos
 * 
 * @return Boolean
 * 
 * este tipo de parametro es un vargars simple, lo que permite pasarle varios parametros a la funcion sin necesidad de crear un array
 * ejemplo de llamadas: 
 *    allowed('CLIENTE') --> en este caso se cumple solo si es cliente
 *    allowed('EMPLEADO', 'CLIENTE') --> en este caso se cumple si es o cliente o empleado
 * 
 * De esta forma se pueden ir creando mas roles y controlar los accedos de una forma mas dinamica
 */
if(!function_exists('allowed_user')) {
  function allowed(...$rols) {
    if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
      if (isset($_SESSION['userRol'])) {
        $allowed_rol = false;

        foreach($rols as $rol) {
          if (strtoupper($rol) == strtoupper($_SESSION['userRol'])) {
            $allowed_rol = true;
          }
        }

        if ($allowed_rol == true) {
          return true;
        } else {
          return false;
          //goHome();
        }
      } else {
        return false;
        //goHome();
      }
    } else {
      return false;
      //goHome();
    }
  }
}