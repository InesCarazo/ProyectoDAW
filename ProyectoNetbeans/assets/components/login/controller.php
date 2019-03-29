<?php 

function comprobarLogin($conexion, $usuario, $password) {

//$password = md5($password);
$login = false;

$sql = "SELECT u.usuario, u.contrasena FROM usuario u WHERE u.usuario=? AND u.contrasena=?";
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