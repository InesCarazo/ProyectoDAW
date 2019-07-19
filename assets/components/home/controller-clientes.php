<?php

if (isset($_POST['modCliente'])) 
{
    $id = $_SESSION['idCliSelect'];
    $modifyUsuario = $_POST['modifyUsuario'];
    $modifyContrasena = $_POST['modifyContrasena'];
    $modifyNombre = $_POST['modifyNombre'];
    $modifyApellidos = $_POST['modifyApellidos'];
    $modifyTelefono = $_POST['modifyTelefono'];
    $modifyCorreo = $_POST['modifyCorreo'];
    $modifyFnacimiento = $_POST['modifyFnacimiento'];
    $modifyPago = $_POST['modifyPago'];
    $modifyNCuenta = $_POST['modifyNCuenta'];
    
    $modelClass = new modelClass();
    $modelClass->modifyCliente($id, $modifyUsuario, $modifyContrasena, $modifyNombre, $modifyApellidos, $modifyTelefono, $modifyCorreo, $modifyFnacimiento, $modifyPago, $modifyNCuenta);
}

if (isset($_POST['borrarCliente'])) 
{
    $id = $_SESSION['idCliSelect'];
    $modelClass = new modelClass();
    $modelClass->deleteCliente($id);
}

function tablaVistaClientes(){
    $tablaHTML= "<div id='tablaVista' class='container-fluid'>
    <form method='POST' action='?cliente=modificar'>
        <table class='col-md-12 table-bordered table-hover table-responsive'>
            <thead>
                <tr>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th class='text-center'>Nombre</th>
                    <th class='text-center'>Apellidos</th>
                    <th class='text-center'>Teléfono</th>
                    <th class='text-center'>Correo</th>
                    <th class='text-center'>Fecha de nacimiento</th>
                </tr>
            </thead>
            <tbody>";
            $model = new modelClass();
            $clientes = $model->verClientes();
            foreach ($clientes as $value) {
                $_SESSION['idCliSelect'] = $value->getP_Usuario();
                $tablaHTML.= "
        <tr>
            <td>
                <input class='radio' type='radio' value='" . $value->getP_Usuario() . "' name='btnRadioCli' checked>
            </td>
            <td class='text-center'>" . $value->getNombre() . "</td>
            <td class='text-center'>" . $value->getApellidos() . "</td>
            <td class='text-center'>" . $value->getTelefono() . "</td>
            <td class='text-center'>" . $value->getCorreo() . "</td>
            <td class='text-center'>" . date("d-m-Y", strtotime($value->getFechaNacimiento())) . "</td>
        </tr>";
    }
    $tablaHTML.= "</tbody>
    </table>
    <div class='col-md-6'>
            <button id='modificarCliente' name='modificarCliente' type='submit' class='btn estilo-btn modBorr center-block'>Modificar</button>
        </div>
</form>
<div class='col-md-6'>
    <form method='POST' action='?cliente=ver'>
        <button id='borrarCliente' name='borrarCliente' type='submit' class='btn estilo-btn modBorr center-block'>Borrar</button>
    </form>

</div>
</div>";
return $tablaHTML;
}

function formShowClientes(){
$contenido ="" . 
tablaVistaClientes()
 . "";
return $contenido;
}

function formModifyClientes($id)
{
    $_SESSION['idCliSelect']= $id;
    $model2 = new modelClass();
    $cliente = $model2->buscarCliente($id);
    $contenido = "<form method='POST' action='?gestion=clientes' class='contenido-home'>
    <div class='row'>
        <div class='form-group'>
            <label for='id' class='control-label col-md-4'>Id</label>
            <label type='text' id='id' name='modifyId' class='col-md-8 control-label'>$id</label
        </div>
        <div class='form-group'>
            <label for='usuario' class='control-label col-md-4'>Usuario</label>
            <div class='col-md-8'>
                <input id='usuario' name='modifyUsuario' placeholder='usuario' type='text' value='". $cliente->getUsuario() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='contrasena' class='control-label col-md-4'>Contraseña</label>
            <div class='col-md-8'>
                <input id='contrasena' name='modifyContrasena' placeholder='***********' type='password'  value='". $cliente->getContrasena() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='nombre' class='control-label col-md-4'>Nombre</label>
            <div class='col-md-8'>
                <input id='nombre' name='modifyNombre' placeholder='nombre' type='text'  value='". $cliente->getNombre() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='apellidos' class='control-label col-md-4'>Apellidos</label>
            <div class='col-md-8'>
                <input id='apellidos' name='modifyApellidos' placeholder='apellidos' type='text'  value='". $cliente->getNombre() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='telefono' class='control-label col-md-4'>Telefono</label>
            <div class='col-md-8'>
                <input id='telefono' name='modifyTelefono' placeholder='658974125' type='tel'  value='". $cliente->getTelefono() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='correo' class='control-label col-md-4'>Correo</label>
            <div class='col-md-8'>
                <input id='correo' name='modifyCorreo' placeholder='correo@correo.es' type='email'  value='". $cliente->getCorreo() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='fnacimiento' class='control-label col-md-4'>Fecha Nacimiento</label>
            <div class='col-md-8'>
                <input id='fnacimiento' name='modifyFnacimiento' type='date'  value='". date("d-m-Y", strtotime($cliente->getFechaNacimiento())) ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='pago' class='control-label col-md-4'>Forma de pago</label>
            <div class='col-md-8'>
                <input id='pago' name='modifyPago' type='text'  value='". $cliente->getFormaPago() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='nCuenta' class='control-label col-md-4'>Nº de cuenta</label>
            <div class='col-md-8'>
                <input type='text' name='modifyNCuenta' value='". $cliente->getnCuenta() ."'>
            </div>
        </div>
        <div class='form-group'>
            <div class='col-md-offset-9 col-md-3'>
                <button id='modCliente' name='modCliente' type='submit' class='btn estilo-btn'>Modificar Cliente</button>
            </div>
        </div>
    </div>
</form>";
    return $contenido;
}

function menuClientes($tipoGestion){
    $contenido = "<div class=' col-md-12 collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='?cliente=ver'>Ver</a></li>
        <!--<li><a href='?cliente=modificar'>Modificar</a></li>-->
        <li><a href='?cliente=pagos'>Pagos</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}