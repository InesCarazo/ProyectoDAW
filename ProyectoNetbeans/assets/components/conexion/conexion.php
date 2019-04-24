<?php

try {
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $conn = new PDO('mysql:host=localhost;dbname=2019p_icarazo', 'root', '', $opciones);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getCode();
    echo 'Error en la conexión: ' . $e->getMessage();
    exit();
}