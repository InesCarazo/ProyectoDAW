<?php
session_start();
require_once './model.php';

if (isset($_POST['form']) && $_POST['form'] == "anadircli")
{
    require_once './../sign_in/controller.php';
    $addUsuario = $_POST['usuario'];
    $addContrasena = $_POST['contrasena'];
    $addNombre = $_POST['nombre'];
    $addApellidos = $_POST['apellidos'];
    $addDni = $_POST['dni'];
    $addTelefono = $_POST['telefono'];
    $addCorreo = $_POST['correo'];
    $addFnacimiento = $_POST['fnacimiento'];
    $modelClass = new modelClass();
    $modelClass->registro($addUsuario, $addContrasena, $addNombre, $addApellidos, $addDni, $addTelefono, $addCorreo, $addFnacimiento);
}