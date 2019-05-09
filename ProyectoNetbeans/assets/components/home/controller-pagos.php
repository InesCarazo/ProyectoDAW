<?php

function generarSelectEmpleadosPagos(){
    $modelClass = new modelClass(); 
    $empleados = $modelClass->verEmpleados();
    foreach ($empleados as $key => $value) 
    {
        $contenido ="
                <select name='chooseEmpleadoProg' class='form-control' required='required'>";
                foreach ($empleados as $key => $value2)
                {
                    // $_SESSION['idEmplPagos'] = $value2->getP_empleado();
                    $contenido.= "<option id='chooseEmpleadoProg' name='chooseEmpleadoProg' class='form-control' value='" . $value2->getP_empleado() . "'>" .$value2->getApellidos() .", " .$value2->getNombre() ."</option>";
                }
            $contenido.="
                </select>
           ";
    }
    return $contenido;
}

function generarTablaHTML($pagos)
{
    $tablaHTML ="<form method='POST' action='?empleado=pagos'>
                <table class='table-bordered table-hover table-responsive'>
                    <thead>
                        <tr>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
                            ".$value->getP_tarea_realizada()."<input class='radio' type='radio' name='btnradioPagos' value='". $value->getP_tarea_realizada()."' checked>
                            </td>";
                            $model = new modelClass(); 
                            $tarea = $model->buscarTarea($value->getA_tarea());
                            
                            $tablaHTML.="<td>". $tarea->getTexto() ."</td>";
                            
                            $tablaHTML.="<td>". $value->getDuracion_h()."</td>
                            <td>". $value->getFecha()."</td>
                        </tr>
                        ";
                    }
                    $tablaHTML.="
                    </tbody>
                </table>
                <div class='col-md-'>
                    <button id='pagarEmpleado' name='pagarEmpleado' type='submit' class='btn estilo-btn modBorr center-block'>Pagar</button>
                </div>
            </form>";
    return $tablaHTML;
}

function menuPagosEmpleados()
{
    $contenido = "
    <div class='container-fluid row'>
    <form method='POST' action='?empleado=pagos'>
        <div class='form-group'>
            <label class='col-md-3 form-label' for='progCliente'>Empleado</label>
            <div class='col-md-9'>
            ". generarSelectEmpleadosPagos() ."
            </div>
        </div>
        
        <div class='form-group'>
        <div class='col-md-offset-9 col-md-3''>
        <button  id='searchPagos'  name='searchPagos' type='submit' class='btn estilo-btn'>Buscar</button>
        </div>
    </div>
    </form>
</div>
<div id='tabla' class='container-fluid'>
";
if (isset($_POST['searchPagos'])) 
{
    $idEmpleado = $_POST['chooseEmpleadoProg'];

    $model = new modelClass(); 
    $pagos = $model->buscarPagos($idEmpleado, 0); 

    if ($pagos != null) 
    {
        $contenido .= generarTablaHTML($pagos);
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

function formPagosClientes()
{
    $contenido = "";
    return $contenido;
}