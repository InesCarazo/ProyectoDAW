<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "chachachachi"; 

try{
    $conexion = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    // set the PDO error mode to exception
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $conexion = new mysqli($host, $user, $password, $database); 
    // mysqli_set_charset($conexion, 'utf8');
    // if ($conexion->connect_errno) {
    //     throw new Exception ("Fallo en la conexión");
    // }
} catch (Exception $ex) {
    echo $ex->getMessage(). $conexion ->connect_error;
}