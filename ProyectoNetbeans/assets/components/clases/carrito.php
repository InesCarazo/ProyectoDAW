<?php
// class Carrito{
//     private $carrito;
//     //private $carr;
//     private $idEmpleado;
//     private $idCliente;
//     private $idTarea;
//     private $idRealizada;
//     private $fecha;
//     private $duracion_h;

//     public function __construct() 
//     {
//         $this->carrito = array();
//         //$this->carr = array();
//         $this->idEmpleado;
//         $this->idCliente;
//         $this->idTarea;
//         $this->fecha;
//         $this->idRealizada = NULL;
//         $this->duracion_h;
//     }

//     public function getArray()
//     {
//         return $this->carrito;
//     }

//     public function setArray($carrito) 
//     {
//         $this->carrito = $carrito;
//     }

//     public function addTask($idEmpleado, $idCliente, $idTarea, $fecha, $duracion_h) {
//         $carr = array();
//         array_push($carr, $idEmpleado);
//         array_push($carr, $idCliente);
//         array_push($carr, $idTarea);
//         array_push($carr, $fecha);
//         array_push($carr, $this->idRealizada);
//         array_push($carr, $duracion_h);
//         array_push($this->carrito, $carr);
//         return $this->carrito;
    
//     }

//     // public function mostrarAsiento() {
//     //     foreach ($this->asientos as $key => $value) {
//     //         echo "<form action=" . $_SERVER['PHP_SELF'] . " method='POST'>";
//     //         echo "$value <input id='btnEnlace' type='submit' name='quitar' value='Quitar'><input type='hidden' name='valorQuitar' value='$value'><br/>";
//     //         echo "</form>";
//     //     }
//     // }

//     // public function quitarAsientos($id) {
//     //     unset($this->asientos[array_search($id, $this->asientos)]);
//     // }

// }