<?php

require_once './model.php';

//if (!empty($_POST['addUsuario']) || !empty($_POST['addContrasena'])  || !empty($_POST['addNombre'])  || !empty($_POST['addApellidos'])  || !empty($_POST['addTelefono'])  || !empty($_POST['addCorreo']) || !empty($_POST['addFnacimiento'])  || !empty($_POST['addNss'])  || !empty($_POST['addAdmin']))
//{
    $addUsuario = $_POST['addUsuario'];

    $addContrasena = $_POST['addContrasena'];
    $addNombre = $_POST['addNombre'];
    $addApellidos = $_POST['addApellidos'];
    $addTelefono = $_POST['addTelefono'];
    $addCorreo = $_POST['addCorreo'];
    $addFnacimiento = $_POST['addFnacimiento'];
    $addNss = $_POST['addNss'];
    $addAdmin = '';
        if($_POST['addAdmin'] == true)
        {
            $addAdmin = 1;
        }
        else
        {
            $addAdmin = 0;
        }
    $modelClass = new modelClass();
    $modelClass->addEmpleado($addUsuario, $addContrasena, $addNombre, $addApellidos, $addTelefono, $addCorreo, $addFnacimiento, $addNss, $addAdmin);
//}