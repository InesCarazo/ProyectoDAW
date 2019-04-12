<?php 

require_once './../conexion/conexion.php';

$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

echo $usuario;
echo "<br/>";
echo $contrasena;
comprobarLogin($conexion, $usuario, $contrasena);
function comprobarLogin($conexion, $usuario, $contrasena) {

    if (mysqli_connect_errno()) {
        printf("Error de conexión: %s\n", mysqli_connect_error());
        exit();
    }

$sql = "SELECT u.usuario, u.contrasena FROM usuario u WHERE u.usuario=:usuario AND u.contrasena=:contrasena";
$stmt = $conexion->prepare($sql);

$stmt->bind_param(':usuario', $usuario);
$stmt->bind_param(':contrasena', $contrasena);
$stmt->execute();
$stmt->close();
}

?>