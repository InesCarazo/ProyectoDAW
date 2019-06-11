<?php

$carrito = Array();
//$_SESSION['carrito'] = $carrito;

if (isset($_POST['quitarTarea'])) 
{
    $carrito = quitarTarea($_POST['valorQuitar']);
    $_SESSION['carrito'] = $carrito;
}

if (isset($_SESSION['carrito'])) 
{
     $carrito = $_SESSION['carrito'];
}
else
{
    $_SESSION['carrito'] = Array();
}

if (isset($_POST['borrarTarea'])) 
{
    $id = $_SESSION['idTareaSelect'];
    $modelClass = new modelClass();
    $modelClass->deleteTarea($id);
}

function tablaVistaTareas()
{
    $tablaHTML= "<div id='tablaVista' class='container-fluid'>
    <form method='POST' action='?tarea=modificar'>
        <table class='col-md-12 table table-bordered table-hover table-responsive'>
            <thead>
                <tr>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th class='text-center'>Nombre tarea</th>
                    <th class='text-center'>Duración(h)</th>
                    <th class='text-center'>Precio(€)</th>
                </tr>
            </thead>
            <tbody>"; 
            $model = new modelClass(); 
            $tareas = $model->verTareas(); 
            foreach ($tareas as $value) { 
                
                $_SESSION['idTareaSelect'] = $value->getP_tipo_tarea();
                $tablaHTML.= "
                <tr>
                    <td>
                        <input class='radio' type='radio' value='" . $value->getP_tipo_tarea() . "' name='btnRadioTarea' checked>
                    </td>
                    <td class='text-center'>" . $value->getTexto() . "</td>
                    <td class='text-center'>" . $value->getDuracion_h() . "</td>
                    <td class='text-center'>" . $value->getPrecio() . "</td>
                </tr>"; } $tablaHTML.= "</tbody>
        </table>
        <div class='col-md-6'>
                <button id='modificarTarea' name='modificarTarea' type='submit' class='btn estilo-btn modBorr center-block'>Modificar</button>
            </div>
    </form>
    <div class='col-md-6'>
        <form method='POST' action='?tarea=ver'>
            <button id='borrarTarea' name='borrarTarea' type='submit' class='btn estilo-btn modBorr center-block'>Borrar</button>
        </form>
    
    </div>
    </div>";
return $tablaHTML;
}

function formShowTareas()
{
    $contenido = "" . 
    tablaVistaTareas()
     . "";
    return $contenido;
}

function generarSelectTareasModify($idTareaSelected)
{
    $modelClass = new modelClass(); 
    $tareas = $modelClass->verTareas();
    foreach ($tareas as $key => $value) 
    {
        $contenido ="
        <div class='form-group row'>
        <label for='chooseTarea' class='control-label col-md-4'>Tarea</label>
            <div class='col-md-8'>
                <select name='chooseTarea' class='form-control'>";
            foreach ($tareas as $key => $value2)
            {
                if ($idTareaSelected == $value2->getP_tipo_tarea()) {
                    $contenido.= "<option id='chooseTarea' name='chooseTarea' class='form-control' value='" . $value2->getP_tipo_tarea() . "' selected>" .$value2->getTexto() ."</option>.";
                }
                    else
                {
                    $contenido.= "<option id='chooseTarea' name='chooseTarea' class='form-control' value='" . $value2->getP_tipo_tarea() . "'>" .$value2->getTexto() ."</option>";
                }
            }
            $contenido.="
                </select>
            </div>
        </div>";
    }
    return $contenido;
}

function formModifyTareas($id)
{
    $_SESSION['idTareaSelect']= $id;
    $model = new modelClass();
    $tarea = $model->buscarTarea($id);
    $contenido = "<form method='POST' action='?gestion=tareas' class='contenido-home'>
    <div>
        <div class='form-group row'>
            <label for='id' class='control-label col-md-4'>Id</label>
            <label type='text' id='id' name='modifyId' class='col-md-8 control-label'>$id</label>
        </div>
        <!--<div class='form-group row'>
            <label for='texto' class='control-label col-md-4'>Nombre de tarea</label>
            <div class='col-md-8'>
                <input id='texto' name='modifyTexto' placeholder='Ej: Barrer el suelo' type='text' value='". $tarea->getTexto() ."' required='required' class='form-control'>
            </div>
        </div>-->".
        generarSelectTareasModify($id)."
        <div class='form-group row'>
            <label for='duracion' class='control-label col-md-4'>Duración (h)</label>
            <div class='col-md-8'>
                <input id='modifyDuracion' name='modifyDuracion' type='number'  value='". $tarea->getDuracion_h() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='precio' class='control-label col-md-4'>Precio (€)</label>
            <div class='col-md-8'>
                <input id='modifyPrecio' name='modifyPrecio' placeholder='10 €' type='text'  value='". $tarea->getPrecio() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='Comentarios' class='control-label col-md-4'>Comentario</label>
            <div class='col-md-8'>
                <textarea id='modifyComentarios' name='modifyComentarios' type='text' class='form-control'>". $tarea->getComentarios() ."</textarea>
            </div>
        </div>
        <div class='form-group row'>
            <div class='col-md-offset-9 col-md-3'>
                <button id='modTarea' name='modTarea' type='submit' class='btn estilo-btn'>Modificar Tarea</button>
            </div>
        </div>
    </div>
</form>
<div id='mensaje_error'></div>";
    return $contenido;
}

function generarSelectTareasAdd()
{
    $modelClass = new modelClass(); 
    $tareas = $modelClass->verTareas();
    foreach ($tareas as $key => $value) 
    {
        $contenido ="
            <div class='col-md-8'>
                <select name='chooseTarea' class='form-control'>";
                foreach ($tareas as $key => $value2)
                {
                        $contenido.= "<option id='chooseTarea' name='chooseTarea' class='form-control' value='" . $value2->getP_tipo_tarea() . "'>" .$value2->getTexto() ."</option>";
                }
            $contenido.="
                </select>
            </div>";
    }
    return $contenido;
}

function formAddTareas()
{
    $contenido = "<form method='POST' action='?gestion=tareas' class='contenido-home'>
    <div>
        <div class='form-group row'>
            <label for='texto' class='control-label col-md-4'>Nombre de tarea</label>
             <div class='col-md-8'>
               <input id='addTexto' name='addTexto' placeholder='Ej: Barrer el suelo' type='text' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='duracion' class='control-label col-md-4'>Duración</label>
            <div class='col-md-8'>
                <input id='addDuracion' name='addDuracion' placeholder='1' type='number' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='precio' class='control-label col-md-4'>Precio (€)</label>
            <div class='col-md-8'>
                <input id='addPrecio' name='addPrecio' placeholder='10 €' type='text' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='Comentarios' class='control-label col-md-4'>Comentario</label>
            <div class='col-md-8'>
                <textarea id='addComentarios' name='addComentarios' placeholder='Escribe aquí tus comentarios' type='text' class='form-control'></textarea>
            </div>
        </div>
        <div class='form-group row'>
            <div class='col-md-offset-9 col-md-3'>
                <button id='addTarea' name='addTarea' type='submit' class='btn estilo-btn'>Añadir Tarea</button>
            </div>
        </div>
    </div>
</form>
<div id='mensaje_error'></div>";
    return $contenido;
}

function generarSelectTareasProg()
{
    $modelClass = new modelClass(); 
    $tareas = $modelClass->verTareas();
    foreach ($tareas as $key => $value) 
    {
        $contenido ="
            <div class='col-md-8'>
                <select name='chooseTareaProg' class='form-control' required='required'>";
                foreach ($tareas as $key => $value2)
                {
                        $contenido.= "<option id='chooseTareaProg' name='chooseTareaProg' class='form-control' value='" . $value2->getP_tarea() . "'>" .$value2->getTexto() ."</option>";
                        $_SESSION['duracionTareaProg'] = $value2->getDuracion_h();
                        
                }
            $contenido.="
                </select>
            </div>";
    }
    return $contenido;
}

function generarSelectClientesProg(){
    $modelClass = new modelClass(); 
    $clientes = $modelClass->verClientes();
    foreach ($clientes as $key => $value) 
    {
        $contenido ="
                <select name='chooseClientProg' class='form-control' required='required'>";
                foreach ($clientes as $key => $value2)
                {
                        $contenido.= "<option id='chooseClientProg' name='chooseClientProg' class='form-control' value='" . $value2->getP_cliente() . "'>" .$value2->getApellidos() .", " .$value2->getNombre() ."</option>";
                }
            $contenido.="
                </select>
           ";
    }
    return $contenido;
}

function generarSelectEmpleadosProg(){
    $modelClass = new modelClass(); 
    $empleados = $modelClass->verEmpleados();
    foreach ($empleados as $key => $value) 
    {
        $contenido ="
                <select name='chooseEmpleadoProg' class='form-control' required='required'>";
                foreach ($empleados as $key => $value2)
                {
                        $contenido.= "<option id='chooseEmpleadoProg' name='chooseEmpleadoProg' class='form-control' value='" . $value2->getP_empleado() . "'>" .$value2->getApellidos() .", " .$value2->getNombre() ."</option>";
                }
            $contenido.="
                </select>
           ";
    }
    return $contenido;
}

function addTask($idEmpleado, $idCliente, $idTarea, $fecha, $duracion_h) 
{
    $carr = array();
    array_push($carr, $idEmpleado);
    array_push($carr, $idCliente);
    array_push($carr, $idTarea);
    array_push($carr, $fecha);
    array_push($carr, $duracion_h);
    return $carr;

}

function listTaskAdded()
{
    $tablaHTML="";
    $carrito = $_SESSION['carrito'];
    foreach ($carrito as $key => $value) 
    {
            $modelClass = new modelClass(); 
            $tareas = $modelClass->buscarTarea($value[2]);
            $tablaHTML.="<div class='row'><form action='?tarea=programar' method='POST'>";
            $tablaHTML.= $tareas->getTexto() ."(". date("d-m-Y", strtotime($value[3])) .") <button id='btnEnlace' type='submit' name='quitarTarea' class='btn btn-default'><!--<img src='./../../images/delete/bin_2/bin2_32.png'>--><!--<img src='./../../images/delete/bin_1/bin1_24.png'>--><img src='./../../images/delete/cart/cart_32.png'></button>
            <input type='hidden' name='valorQuitar' value='". $tareas->getP_tipo_tarea() ."'>";
            $tablaHTML.= "</form></div>";
    }
    
return $tablaHTML;
}

function quitarTarea($id) 
{
    $carrito = $_SESSION['carrito'];
    unset($carrito[array_search($id, $carrito)]);
    return $carrito;
}

if (isset($_POST['programarTarea'])) 
{
    $carrito = $_SESSION['carrito'];
    foreach ($carrito as $key => $value) 
    {
        $idEmpleado = $value[0]; 
        $idCliente = $value[1];
        $idTarea = $value[2];
        $fecha = $value[3];;
        $duracion_h =  $value[4];

        $modelClass = new modelClass(); 
        $tareas = $modelClass->programarTarea($idEmpleado, $idCliente, $idTarea, $fecha, $duracion_h);

    }

    $_SESSION['carrito'] = Array();
}

function formProgramarTareas()
{
    $contenido = "
    <div class='col-md-6'><form method='POST' action='?tarea=programar'>
        <div class='form-group row'>
            <label class='col-md-4 col-form-label'>Tareas</label>
           ". generarSelectTareasProg() ."
        </div>
        <div class='form-group row'>
            <label for='fecha' class='control-label col-md-4'>Fecha</label>
            <div class='col-md-8'>
                <input id='fecha' name='progfecha' type='date' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label class='col-md-4 col-form-label' for='progCliente'>Cliente</label>
            <div class='col-md-8'>
            ". generarSelectClientesProg() ."
            </div>
        </div>
        <div class='form-group row'>
            <label class='col-md-4 col-form-label' for='progCliente'>Empleado</label>
            <div class='col-md-8'>
            ". generarSelectEmpleadosProg() ."
            </div>
        </div>
        <div class='form-group row'>
            <div class='col-md-offset-8 col-md-4'>
                <button id='progAddTarea' name='progAddTarea' type='submit' class='btn estilo-btn no-margin no-padding'>
                <span id='btnTextoSpan' class='col-md-6 text-center'>Añadir</span>
                    <img src='./../../images/add/add32.png' class='img-responsive col-md-6'>
                </button>
            </div>
        </div>
        </form>
    </div>
    
    <div class='col-md-6'>";

    if (isset($_POST['progAddTarea'])) 
    {
        $idEmpleado = $_POST['chooseEmpleadoProg']; 
        $idCliente = $_POST['chooseClientProg'];
        $idTarea = $_POST['chooseTareaProg'];
        $fecha = $_POST['progfecha'];
        $duracion_h =  $_SESSION['duracionTareaProg'];
        
        $carrito = $_SESSION['carrito'];
        $carr = addTask($idEmpleado, $idCliente, $idTarea, $fecha, $duracion_h);
        array_push($carrito, $carr);
        $_SESSION['carrito'] = $carrito;
    }
    $contenido.="
        <div class='form-group row'>
            <label for='duracion' class='control-label col-md-12'>Nº tareas:" . count($_SESSION['carrito'])."</label>
        </div>
        <div class='form-group row'>
            <div id='carritoTareas' name='carritoTareas' class='col-md-12'>
               <h3>Lista de tareas añadidas</h3>
               " . listTaskAdded() . "
            </div>
            <div class='col-md-12 form-group'>
            <form method='POST' action='?tarea=programar'>
                <button id='progTarea' name='programarTarea' type='submit' class='btn estilo-btn'>Programar Tarea</button>
                </form>
            </div>

        </div>
        
    </div>
";
    return $contenido;
}


function menuTareas($tipoGestion)
{
    $contenido = "<div class='col-md-12 collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='?tarea=ver'>Ver</a></li>
        <li><a href='?tarea=programar'>Programar</a></li>
        <li><a href='?tarea=anadir'>Añadir</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}