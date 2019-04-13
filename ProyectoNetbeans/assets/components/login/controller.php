<?php

require './../conexion/conexion.php';

function comprobarLogin($usuario, $contrasena) {
    require_once './../conexion/conexion.php';
    $stmt = $conn->prepare("SELECT u.usuario, u.contrasena FROM usuario u WHERE u.usuario=:usuario AND u.contrasena=:contrasena");

    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->execute();
}
