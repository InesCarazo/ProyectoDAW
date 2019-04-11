<?php 

require_once './../conexion/conexion.php';

$usuario = $_POST["usuario"];
$password = $_POST["password"];

echo $usuario;
echo "<br/>";
echo $password;
comprobarLogin($conexion, $usuario, $password);
function comprobarLogin($conexion, $usuario, $password) {

$login = false;

$sql = "SELECT u.usuario, u.contrasena FROM usuario u WHERE u.usuario='$usuario' AND u.contrasena='$password';
$stmt = $conexion->prepare($sql);
if (!$stmt) {
    echo "Error: " . $conexion->error;
    exit();
}

$stmt->bind_param('ss', $usuario, $password);
$stmt->execute();
$stmt->bind_result($user, $pass);

$stmt->fetch();
    if ($usuario == $user && $password == $pass) {
        $login = true;
    } else {
        $login = false;
    }

return $login;
}

?>