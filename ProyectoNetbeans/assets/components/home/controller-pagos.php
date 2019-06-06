<?php

function generarSelectEmpleadosPagos(){
    $modelClass = new modelClass(); 
    $empleados = $modelClass->verEmpleados();
    foreach ($empleados as $key => $value) 
    {
        $contenido ="
                <select name='chooseEmpleadoPagos' class='form-control' required='required'>";
                foreach ($empleados as $key => $value2)
                {
                    // $_SESSION['idEmplPagos'] = $value2->getP_empleado();
                    $contenido.= "<option id='chooseEmpleadoPagos' name='chooseEmpleadoPagos' class='form-control' value='" . $value2->getP_empleado() . "'>" .$value2->getApellidos() .", " .$value2->getNombre() ."</option>";
                }
            $contenido.="
                </select>
           ";
    }
    return $contenido;
}

function generarTablaHTMLEmpleados($pagos)
{
    $tablaHTML ="<form method='POST' action='?empleado=pagos'>
    <div id='tablaVista' class='row'>
    <table class='table-bordered table-hover table-responsive contenido-home'>
                    <thead>
                        <tr>
                            <th></th>
                            <th class='text-center'>Tarea</th>
                            <th class='text-center'>Duración (h)</th>
                            <th class='text-center'>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($pagos as $value) 
                    {
                    $tablaHTML.= "
                        <tr>
                            <td class='text-center'>
                            <input class='checkbox' type='checkbox' name='btnradioPagos' value='". $value->getP_tarea_realizada()."'>
                            </td>";
                            $model = new modelClass(); 
                            $tarea = $model->buscarTarea($value->getA_tarea());
                            
                            $tablaHTML.="<td class='text-center'>". $tarea->getTexto() ."</td>";
                            
                            $tablaHTML.="<td class='text-center'>". $value->getDuracion_h()."</td>
                            <td class='text-center'>". $value->getFecha()."</td>
                        </tr>
                        ";
                    }
                    $tablaHTML.="
                    </tbody>
                </table>
                <div class='col-md-'>
                    <button id='pagarEmpleado' name='pagarEmpleado' type='submit' class='btn estilo-btn modBorr center-block'>Pagar</button>
                </div>
                </div>
            </form>";
    return $tablaHTML;
}

function menuPagosEmpleados()
{
    $contenido = "
    <div class='container-fluid row contenido-home'>
    <form method='POST' action='?empleado=pagos'>
        <div class='form-group'>
            <label class='col-md-3 form-label' for='progEmpleado'>Empleado</label>
            <div class='col-md-9'>
            ". generarSelectEmpleadosPagos() ."
            </div>
        </div>
        <div class='form-group'>
        <div class='col-md-12'>
        <button  id='searchPagos'  name='searchPagos' type='submit' class='btn estilo-btn center-block'>Buscar</button>
        </div>
    </div>
    </form>
</div>
<div id='tabla' class='container-fluid'>
";
if (isset($_POST['searchPagos'])) 
{
    $idEmpleado = $_POST['chooseEmpleadoPagos'];

    $model = new modelClass(); 
    $pagos = $model->buscarPagos($idEmpleado); 

    if ($pagos != null) 
    {
        $contenido .= generarTablaHTMLEmpleados($pagos);
    }
    else {
        $contenido .= "<label>Todos los pagos están al día</label>";
    }
}
$contenido .="
</div>
<div class='container-fluid'>
";
//CONFIRMACIÓN
if (isset($_POST["btnradioPagos"])) 
{
   $id = $_POST["btnradioPagos"];
    $model = new modelClass();
    $pagos = $model->modifyPagos($id);
    if($pagos)
    {
        $message = "Pago realizado";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

//CONFIRMACIÓN
$contenido.="
</div>";
    return $contenido;
}

function generarTablaHTMLClientes($pagos)
{
    $tablaHTML ="<form method='POST' action='?cliente=pagos'>
    <div id='tablaVista' class='row'>
                <table class='col-md-12 table-bordered table-hover table-responsive contenido-home'>
                    <thead>
                        <tr>
                            <th></th>
                            <th class='text-center'>Tarea</th>
                            <th class='text-center'>Duración (h)</th>
                            <th class='text-center'>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($pagos as $value) 
                    {
                    $tablaHTML.= "
                        <tr>
                            <td>
                            <input class='radio' type='radio' name='btnradioPagosCliente' value='". $value->getP_tarea_realizada()."'>
                            </td>";
                            $model = new modelClass(); 
                            $tarea = $model->buscarTarea($value->getA_tarea());
                            $_SESSION['idCliente'] = $value->getA_cliente();
                            $tablaHTML.="<td class='text-center'>". $tarea->getTexto() ."</td>";
                            
                            $tablaHTML.="<td class='text-center'>". $value->getDuracion_h()."</td>
                            <td class='text-center'>". $value->getFecha()."</td>
                        </tr>
                        ";
                    }
                    $tablaHTML.="
                    </tbody>
                </table>
                <div class='col-md-'>
                    <button id='pagarCliente' name='pagarCliente' type='submit' class='btn estilo-btn modBorr center-block'>Pagar</button>
                </div>
                </div>
            </form>";
    return $tablaHTML;
}

function generarSelectClientesPagos()
{
    $modelClass = new modelClass(); 
    $clientes = $modelClass->verClientes();
        $contenido ="
                <select name='chooseClientPagos' class='form-control' required='required'>";
                foreach ($clientes as $key => $value2)
                {
                        $contenido.= "<option id='chooseClientPagos' name='chooseClientPagos' class='form-control' value='" . $value2->getP_cliente() . "'>" .$value2->getApellidos() .", " .$value2->getNombre() ."</option>";
                }
            $contenido.="
                </select>
           ";
    return $contenido;
}

function menuPagosClientes()
{
    $contenido = "
    <div class='container-fluid row contenido-home'>
    <form id='tablaVista' method='POST' action='?cliente=pagos'>
        <div class='form-group col-md-12'>
            <label class='col-md-3 form-label' for='progCliente'>Cliente</label>
            <div class='col-md-9'>
            ". generarSelectClientesPagos() ."
            </div>
        </div>
        
        <div class='form-group'>
            <div class='col-md-12'>
                <button  id='searchPagosCliente'  name='searchPagosCliente' type='submit' class='btn estilo-btn center-block'>Buscar</button>
            </div>
        </div>
    </form>
</div>
<div id='tabla' class='container-fluid'>
";
if (isset($_POST['searchPagosCliente'])) 
{
    
    $idCliente = $_POST['chooseClientPagos'];

    $model = new modelClass(); 
    $pagos = $model->buscarPagosCliente($idCliente); 

    if ($pagos != null) 
    {
        $contenido .= generarTablaHTMLClientes($pagos);
    }
    else {
        $contenido .= "<label>No tiene pagos pendientes</label>";
    }
}
$contenido .="
</div>
<div class='container-fluid'>
";
//CONFIRMACIÓN
if (isset($_POST["btnradioPagosCliente"])) 
{
    $idCliente='';
    if (isset($_SESSION['idCliente'])) 
    {
       $idCliente = $_SESSION['idCliente'];
    }
   $idTareaR = $_POST["btnradioPagosCliente"];
   echo $idCliente;
   echo "<br/><br/>";
   echo $idTareaR;
    $model = new modelClass();
    $pagos = $model->modifyPagosCliente($idTareaR, $idCliente);
    if($pagos)
    {
        $message = "Pago realizado";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

//CONFIRMACIÓN
$contenido.="
</div>";
    return $contenido;
}