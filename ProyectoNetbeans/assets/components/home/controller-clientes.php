<?php 
function tablaVistaClientes(){
    $tablaHTML= "<div id='tablaVista' class='row contenido-home'>
    <table class='contenido-tabla'>
    <thead>
    <tr>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th class='text-center'>Nombre</th>
        <th class='text-center'>Apellidos</th>
        <th class='text-center'>Telefono</th>
        <th class='text-center'>Correo</th>
        <th class='text-center'>Fecha de nacimiento</th>
    </tr>
    </thead>
    <tbody>";
    $model = new modelClass();
    $clientes = $model->verClientes();
    foreach ($clientes as $value) {
        $tablaHTML.= "
    <tr>
        <td>
            <input class='radio' type='radio' name='optradio' checked>
        </td>
        <td class='text-center'>" . $value->getNombre() . "</td>
        <td class='text-center'>" . $value->getApellidos() . "</td>
        <td class='text-center'>" . $value->getTelefono() . "</td>
        <td class='text-center'>" . $value->getCorreo() . "</td>
        <td class='text-center'>" . $value->getFechaNacimiento() . "</td>
    </tr>";
    }
    $tablaHTML.= "</tbody>
</table>";
return $tablaHTML;
}

function formShowClientes($tipoForm){
$contenido ="" . 
tablaVistaClientes()
 . "";
return $contenido;
}

function formModifyClientes($tipoForm){
    $contenido = "<form method='POST'  class='contenido-home'>
    <div class='row'>
    <div class='form-group'>
        <label for='usuario' class='control-label col-md-4'>Usuario</label>
        <div class='col-md-8'>
            <input id='usuario' name='usuario' placeholder='usuario' type='text' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='contrasena' class='control-label col-md-4'>Contraseña</label>
        <div class='col-md-8'>
            <input id='contrasena' name='contrasena' type='password' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='nombre' class='control-label col-md-4'>Nombre</label>
        <div class='col-md-8'>
            <input id='nombre' name='nombre' placeholder='nombre' type='text' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='apellidos' class='control-label col-md-4'>Apellidos</label>
        <div class='col-md-8'>
            <input id='apellidos' name='apellidos' placeholder='apellidos' type='text' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='telefono' class='control-label col-md-4'>Telefono</label>
        <div class='col-md-8'>
            <input id='telefono' name='telefono' placeholder='658974125' type='number' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='correo' class='control-label col-md-4'>Correo</label>
        <div class='col-md-8'>
            <input id='correo' name='correo' placeholder='correo@correo.es' type='email' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='fnacimiento' class='control-label col-md-4'>Fecha Nacimiento</label>
        <div class='col-md-8'>
            <input id='fnacimiento' name='fnacimiento' type='date' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='nss' class='control-label col-md-4'>Nº SS</label>
        <div class='col-md-8'>
            <input id='nss' name='nss' type='text' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
    <label for='admin' class='control-label col-md-4'>Administrador</label> 
    <div class='col-md-8'>
        <input type='checkbox' name='admin' value='admin' checked='checked'>
    </div>
  </div> 
    <div class='form-group'>
        <div class='col-md-offset-9 col-md-3'>
        <button  id='modCliente'  name='modCliente' type='submit' class='btn estilo-btn'>Modificar Cliente</button>
        </div>
    </div>
    </div>
</form>";
    return $contenido;
}

function formPagosClientes($tipoForm){
    $contenido = "";
    return $contenido;
}

function menuClientes($tipoGestion){
    $contenido = "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='?cliente=ver'>Ver</a></li>
        <li><a href='?cliente=modificar'>Modificar</a></li>
        <li><a href='?cliente=pagos'>Pagos</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}