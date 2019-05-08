<?php
function tablaVistaEmpleadosPagos(){
    $tablaHTML= "<form method='POST' action='?empleado=modificar'>
    <div id='tablaVista' class='row'>
        <table class='row table-bordered table-hover table-responsive'>
            <thead>
                <tr>
                    <th>P</th>
                    <th class='text-center'>A_empleado</th>
                    <th class='text-center'>A_cliente</th>
                    <th class='text-center'>A_tarea</th>
                    <th class='text-center'>A_realizada</th>
                    <th class='text-center'>fecha</th>
                    <th class='text-center'>duracion_h</th>
                </tr>
            </thead>
            <tbody>"; $model = new modelClass(); 
            $empleados = $model->verPagos(); 
            foreach ($empleados as $value) { 
                $tablaHTML.= "
                <tr>
                    <td>
                        <input class='radio' type='radio' name='btnradio' value='". $value->getP_empleadoSalaTarea()."' checked>
                    </td>
                    <td class='text-center'>" . $value->getA_empleado() . "</td>
                    <td class='text-center'>" . $value->getA_cliente() . "</td>
                    <td class='text-center'>" . $value->getA_tarea() . "</td>
                    <td class='text-center'>" . $value->getA_realizada() . "</td>
                    <td class='text-center'>" . $value->getFecha() . "</td>
                    <td class='text-center'>" . $value->getduracion_h() . "</td>
                </tr>"; } $tablaHTML.= "</tbody>
        </table>
        <div class='col-md-6'>
            <button id='modificarEmpleado' name='modificarEmpleado' type='submit' class='btn estilo-btn modBorr center-block'>Modificar</button>
        </div>
</form>
<div class='col-md-6'>
    <form method='POST' action='?empleado=ver'>
        <button id='borrarEmpleado' name='borrarEmpleado' type='submit' class='btn estilo-btn modBorr center-block'>Borrar</button>
    </form>

</div>
</div>";
return $tablaHTML;
}

function formShowEmpleadosPagos(){
$contenido ="" . 
tablaVistaEmpleadosPagos()
 . "";
return $contenido;
}

function generarSelectEmpleadosPagos(){
    $modelClass = new modelClass(); 
    $empleados = $modelClass->verEmpleados();
    foreach ($empleados as $key => $value) 
    {
        
        $contenido ="
                <select name='chooseEmpleadoProg' class='form-control' required='required'>";
                foreach ($empleados as $key => $value2)
                {
                    $_SESSION['idEmplPagos'] = $value2->getP_empleado();
                    $contenido.= "<option id='chooseEmpleadoProg' name='chooseEmpleadoProg' class='form-control' value='" . $value2->getP_empleado() . "'>" .$value2->getApellidos() .", " .$value2->getNombre() ."</option>";
                }
            $contenido.="
                </select>
           ";
    }
    return $contenido;
}

function menuPagosEmpleados()
{
    $contenido = "
    <div class='container-fluid'>
    <form method='POST' action='?empleado=pagos'>
        <div class='form-group col-md-6'>
            <label class='col-md-3 form-label' for='progCliente'>Empleado</label>
            <div class='col-md-9'>
            ". generarSelectEmpleadosPagos() ."
            </div>
        </div>
        <div class='form-group col-md-6'>
        ". formShowEmpleadosPagos() ."
        </div>
    </form>
</div>";
    return $contenido;    
}

function formPagosClientes()
{
    $contenido = "";
    return $contenido;
}