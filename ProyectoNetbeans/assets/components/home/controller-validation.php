<?php
session_start();
require_once './model.php';

if (isset($_POST['form']) && $_POST['form'] == "anadir")
{
    $addUsuario = $_POST['usuario'];
    $addContrasena = $_POST['contrasena'];
    $addNombre = $_POST['nombre'];
    $addApellidos = $_POST['apellidos'];
    $addDni = $_POST['dni'];
    $addTelefono = $_POST['telefono'];
    $addCorreo = $_POST['correo'];
    $addFnacimiento = $_POST['fnacimiento'];
    $addNss = $_POST['nss'];
    $addAdmin = '';
        if($_POST['admin'] == true)
        {
            $addAdmin = 1;
        }
        else
        {
            $addAdmin = 0;
        }
    $modelClass = new modelClass();
    $modelClass->addEmpleado($addUsuario, $addContrasena, $addNombre, $addApellidos, $addDni, $addTelefono, $addCorreo, $addFnacimiento, $addNss, $addAdmin);
}

if (isset($_POST['form']) && $_POST['form'] == "modificar") 
{
    $id = $_SESSION['idEmplSelect'];
    $modifyUsuario = $_POST['usuario'];
    $modifyContrasena = $_POST['contrasena'];
    $modifyNombre = $_POST['nombre'];
    $modifyApellidos = $_POST['apellidos'];
    $modifyDni = $_POST['dni'];
    $modifyTelefono = $_POST['telefono'];
    $modifyCorreo = $_POST['correo'];
    $modifyFnacimiento = $_POST['fnacimiento'];
    $modifyNss = $_POST['nss'];
    $modifyAdmin = '';
        if($_POST['admin'] == "true")
        {
            $modifyAdmin = 1;
        }
        else
        {
            $modifyAdmin = 0;
        }
    $modelClass = new modelClass();
    $modelClass->modifyEmpleado($id, $modifyUsuario, $modifyContrasena, $modifyNombre, $modifyApellidos, $modifyDni, $modifyTelefono, $modifyCorreo, $modifyFnacimiento, $modifyNss, $modifyAdmin);
}

if (isset($_POST['form']) && $_POST['form'] == "modificarcli")
{
    $id = $_SESSION['idCliSelect'];
    $modifyUsuario = $_POST['usuario'];
    $modifyContrasena = $_POST['contrasena'];
    $modifyNombre = $_POST['nombre'];
    $modifyApellidos = $_POST['apellidos'];
    $modifyDni = $_POST['dni'];
    $modifyTelefono = $_POST['telefono'];
    $modifyCorreo = $_POST['correo'];
    $modifyFnacimiento = $_POST['fnacimiento'];
    $modifyPago = $_POST['pago'];
    $modifyNCuenta = $_POST['ncuenta'];
    $modelClass = new modelClass();
     $modelClass->modifyCliente($id, $modifyUsuario, $modifyContrasena, $modifyNombre, $modifyApellidos, $modifyDni, $modifyTelefono, $modifyCorreo, $modifyFnacimiento, $modifyPago, $modifyNCuenta);
}


// if (isset($_POST['form']) && $_POST['form'] == "anadircli")
// {
//     require_once './../sign_in/controller.php';
//     $addUsuario = $_POST['usuario'];
//     $addContrasena = $_POST['contrasena'];
//     $addNombre = $_POST['nombre'];
//     $addApellidos = $_POST['apellidos'];
//     $addDni = $_POST['dni'];
//     $addTelefono = $_POST['telefono'];
//     $addCorreo = $_POST['correo'];
//     $addFnacimiento = $_POST['fnacimiento'];
//     registroCliente($addUsuario, $addContrasena, $addNombre, $addApellidos, $addDni, $addTelefono, $addCorreo, $addFnacimiento);
// }
