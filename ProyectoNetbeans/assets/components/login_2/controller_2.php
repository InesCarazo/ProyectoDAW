<?php 

require_once './../conexion/conexion.php';

$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

echo $usuario;
echo "<br/>";
echo $contrasena;

// comprobarLogin($usuario, $contrasena);
function comprobarLogin($usuario, $contrasena) {

$stmt = $conexion->prepare("SELECT u.usuario, u.contrasena FROM usuario u WHERE u.usuario=:usuario AND u.contrasena=:contrasena");

$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':contrasena', $contrasena);
$stmt->execute();
}

?>