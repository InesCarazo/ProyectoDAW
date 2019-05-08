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

function mensaje()
{
    if (isset($_POST['searchPagos'])) 
{
    $idEmpleado = $_POST['chooseEmpleadoProg'];

    $model = new modelClass(); 
    $pagos = $model->verPago(); 

    $pagado = Array();
    foreach ($pagos as $value) 
    { 
        array_push($pagado, $value);
            print_r($pagado);
            echo count($pagado);
        if ($value->getA_empleado() == intval($idEmpleado)) 
        {
            

            if ($value->getPagada() == 1) 
            {
                $contenido = "<label>Todos los pagos están al día</label>";
                return $contenido;
            }else if( $value->getPagada() == 0)
            {
                $contenido = "<label>Todos los pagos NO están al día</label>";
                return $contenido;
            }
    }
}
}}

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
<div id='mensaje' class='container-fluid row'>
". mensaje() ."
</div>
";
    return $contenido;    
}

function formPagosClientes()
{
    $contenido = "";
    return $contenido;
}