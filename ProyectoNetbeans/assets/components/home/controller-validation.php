<?php

require_once './model.php';

if (isset($_POST['form']) && $_POST['form'] == "anadir")
{
    $addUsuario = $_POST['usuario'];

    $addContrasena = $_POST['contrasena'];
    $addNombre = $_POST['nombre'];
    $addApellidos = $_POST['apellidos'];
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
    $modelClass->addEmpleado($addUsuario, $addContrasena, $addNombre, $addApellidos, $addTelefono, $addCorreo, $addFnacimiento, $addNss, $addAdmin);
}