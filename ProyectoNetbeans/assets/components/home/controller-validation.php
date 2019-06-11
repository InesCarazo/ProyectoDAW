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

if (isset($_POST['form']) && $_POST['form'] == "anadircasa")
{
    $addDireccion = $_POST['direccion'];
    $addCiudad = $_POST['ciudad'];
    $addHasForniture = "";
    if ($_POST['hasForniture'] == "true") 
    {
        $addHasForniture = 1;
    }
    else
    {
        $addHasForniture  = 0;
    }
    $addSice = $_POST['sice'];
    $cliente = $_POST['chooseClient'];

    $modelClass = new modelClass();
    $modelClass->addCasa($addDireccion, $addCiudad, $addHasForniture, $addSice, $cliente);
}

if (isset($_POST['form']) && $_POST['form'] == "modificarcasa")
{
    $id = $_SESSION['idCasaSelect'];
    $modifyDireccion = $_POST['direccion'];
    $modifyCiudad = $_POST['ciudad'];
    if ($_POST['hasForniture'] == "true") 
    {
        $modifyHasForniture = 1;
    }
    else
    {
        $modifyHasForniture  = 0;
    }
    $modifySice = $_POST['sice'];
    $cliente = $_POST['chooseClient'];
    
    $modelClass = new modelClass();
    $modelClass->modifyCasa($id, $modifyDireccion, $modifyCiudad, $modifyHasForniture, $modifySice, $cliente);
}

if (isset($_POST['form']) && $_POST['form'] == "anadirtarea")
{
    $addTexto = $_POST['nombre'];
    $addDuracion = $_POST['duracion'];
    $addPrecio = $_POST['precio'];
    $addComentario = $_POST['comentario'];

    $modelClass = new modelClass();
    $modelClass->addTarea($addTexto, $addDuracion, $addPrecio, $addComentario);
}

if (isset($_POST['form']) && $_POST['form'] == "modificartarea")
{
    $id = $_SESSION['idTareaSelect'];
    $modifyTexto = $_POST['nombre'];
    $modifyDuracion = $_POST['duracion'];
    $modifyPrecio = $_POST['precio'];
    $modifyComentario = $_POST['comentario'];
    
    
    $modelClass = new modelClass();
    $modelClass->modifyTarea($id, $modifyTexto, $modifyDuracion, $modifyPrecio, $modifyComentario);
}