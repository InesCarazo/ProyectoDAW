<?php
require_once './model.php';

function cerrarSesion(){
    $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/login/login.php';
    //$url= 'http://aglinformatica.es:6080/icarazo/assets/components/login/login.php';
    header("Location: $url"); 
}

function volverAlHome(){
    $contenido = "</ul>
    </div>
    </div>
    </nav>";
    return $contenido;
}

function contacto(){
    echo "NOT READY YET";
}


function tipoMenuGestion($tipoGestion){
    switch ($tipoGestion) {
        case 'empleados':
           return menuEmpleados($tipoGestion);
           
            break;
        case 'clientes':
        return menuClientes($tipoGestion);
            break;
        case 'casas':
        return menuCasas($tipoGestion);
            break;
        case 'tareas':
        return menuTareas($tipoGestion);
            break;
    }
}

function tipoFormEmpleados($tipoForm){
    switch ($tipoForm) {
        case 'anadir':
           return menuEmpleados("empleados") . formAddEmpleados($tipoForm) . "</div>";
           
            break;
        case 'ver':
        return menuEmpleados("empleados") . formShowEmpleados($tipoForm) . "</div>";
            break;
        case 'modificar':
            if (isset($_POST['btnradio'])) 
            {
                $id = $_POST['btnradio'];
                return menuEmpleados("empleados") . formModifyEmpleados($tipoForm, $id) . "</div>";
            }
            else
            {
                $message = "Tienes que seleccionar un empleado para poder editar";
        echo "<script type='text/javascript'>alert('$message');</script>";
            }
            
            break;
        case 'tareas':
        return menuEmpleados("empleados") . menuTareasEmpleados($tipoForm) . "</div>";
            break;
            case 'pagos':
        return menuEmpleados("empleados") .  menuPagosEmpleados($tipoForm) . "</div>";
            break; 
    }
}

function tipoFormClientes($tipoForm){
    switch ($tipoForm) {
        case 'ver':
           return menuClientes("clientes") . formShowClientes($tipoForm) . "</div>";
           
            break;
        case 'modificar':
        return menuClientes("clientes") . formModifyClientes($tipoForm) . "</div>";
            break;
        case 'pagos':
            return menuClientes("clientes") . formPagosClientes($tipoForm) . "</div>";
            break;
    }
}

function tipoFormCasas($tipoForm){
    switch ($tipoForm) {
        case 'anadir':
            return menuCasas("casas") . formAddCasas($tipoForm) . "</div>";
            break;
        case 'mostrar':
           return menuCasas("casas") . formShowCasas($tipoForm) . "</div>";
           
            break;
        case 'modificar':
        return menuCasas("casas") . formModifyCasas($tipoForm) . "</div>";
            break;
    }
}

function formAddEmpleados($tipoForm){
    $contenido = "<form method='POST' class='contenido-home'>
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
        <div class='col-md-offset-9 col-md-3' '>
        <button id='addEmpleado' name='addEmpleado' type='submit' class='btn estilo-btn'>Añadir Empleado</button>
        </div>
    </div>
    </div>
</form>";
return $contenido;
}

function tablaVistaEmpleados(){
    $tablaHTML= "<div id='tablaVista' class='container-fluid'>
    <form method='POST' action='?empleado=modificar'>
    <table class='row table-bordered table-hover table-responsive'>
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
    $empleados = $model->verEmpleados();
    foreach ($empleados as $value) {
        $tablaHTML.= "
    <tr>
        <td>
            <input class='radio' type='radio' name='btnradio' value='". $value->getP_Usuario()."' checked>
        </td>
        <td class='text-center'>" . $value->getNombre() . "</td>
        <td class='text-center'>" . $value->getApellidos() . "</td>
        <td class='text-center'>" . $value->getTelefono() . "</td>
        <td class='text-center'>" . $value->getCorreo() . "</td>
        <td class='text-center'>" . $value->getFechaNacimiento() . "</td>
    </tr>";
    }
    $tablaHTML.= "</tbody>
</table>
<div class='col-md-offset-10 col-md-3'>
            <button id='modificarEmpleado' name='modificarEmpleado' type='submit' class='btn estilo-btn'>Modificar</button>
        </div>
    </form>
</div>";
return $tablaHTML;
}

function formShowEmpleados($tipoForm){
    
$contenido ="" . 
tablaVistaEmpleados()
 . "";
return $contenido;
}

function formModifyEmpleados($tipoForm, $id){
    $model2 = new modelClass();
    $empleado = $model2->buscarEmpleado($id);
        // echo $empleado->getNombre();
    $contenido = "<form method='POST'  class='contenido-home'>
    <div class='row'>
    <div class='form-group'>
        <label for='id' class='control-label col-md-4'>Id</label>
        <label id='id' name='id' class='col-md-8 control-label'>$id</label>
    </div>
    <div class='form-group'>
        <label for='usuario' class='control-label col-md-4'>Usuario</label>
        <div class='col-md-8'>
            <input id='usuario' name='usuario' placeholder='usuario' type='text' required='required' value='". $empleado->getUsuario() ."' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='contrasena' class='control-label col-md-4'>Contraseña</label>
        <div class='col-md-8'>
            <input id='contrasena' name='contrasena' type='password' required='required' value='". $empleado->getContrasena() ."' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='nombre' class='control-label col-md-4'>Nombre</label>
        <div class='col-md-8'>
            <input id='nombre' name='nombre' placeholder='nombre' type='text' required='required' value='". $empleado->getNombre() ."' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='apellidos' class='control-label col-md-4'>Apellidos</label>
        <div class='col-md-8'>
            <input id='apellidos' name='apellidos' placeholder='apellidos' type='text' value='". $empleado->getApellidos() ."' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='telefono' class='control-label col-md-4'>Telefono</label>
        <div class='col-md-8'>
            <input id='telefono' name='telefono' placeholder='658974125' type='number' required='required' value='". $empleado->getTelefono() ."' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='correo' class='control-label col-md-4'>Correo</label>
        <div class='col-md-8'>
            <input id='correo' name='correo' placeholder='correo@correo.es' type='email' required='required' value='". $empleado->getCorreo() ."' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='fnacimiento' class='control-label col-md-4'>Fecha Nacimiento</label>
        <div class='col-md-8'>
            <input id='fnacimiento' name='fnacimiento' type='date' required='required' value='". $empleado->getFechaNacimiento() ."' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='nss' class='control-label col-md-4'>Nº SS</label>
        <div class='col-md-8'>
            <input id='nss' name='nss' type='text' required='required' value='". $empleado->getnSS() ."' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
    <label for='admin' class='control-label col-md-4'>Administrador</label> 
    <div class='col-md-8'>"; 

    if ($empleado->getIsAdmin() == 1) 
    {
        $contenido.= "<input type='checkbox' name='admin' value='admin' checked>";   
    }
    else
    {
        $contenido.= "<input type='checkbox' name='admin' value='admin'>"; 
    }
    $contenido.="</div>
  </div> 
    <div class='form-group'>
        <div class='ccol-md-offset-9 col-md-3''>
        <button  id='modEmpleado'  name='modEmpleado' type='submit' class='btn estilo-btn'>Modificar Empleado</button>
        </div>
    </div>
    </div>
</form>";
return $contenido;
}

function menuTareasEmpleados($tipoForm){}

function menuPagosEmpleados($tipoForm){}

function menuEmpleados($tipoGestion){
    $contenido = "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
              
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='?empleado=anadir'>Añadir</a></li>
        <li><a href='?empleado=ver'>Ver</a></li>
        <li><a href='?empleado=modificar'>Modificar</a></li> 
        <li><a href='?empleado=tareas'>Tareas</a></li>
        <li><a href='?empleado=pagos'>Pagos</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}


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

function formAddCasas($tipoForm){
    $contenido = "";
    return $contenido;
}

function formShowCasas($tipoForm){
    $contenido = "";
    return $contenido;
}

function formModifyCasas($tipoForm){
    $contenido = "";
    return $contenido;
}

function menuCasas($tipoGestion){
    $contenido = "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='?casa=anadir'>Añadir</a></li>
        <li><a href='?casa=mostrar'>Mostrar</a></li>
        <li><a href='?casa=modificar'>Modificar</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}

function menuTareas($tipoGestion){
    $contenido = "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='#'>Page</a></li>
        <li><a href='#'>Page</a></li>
        <li><a href='#'>Page</a></li>
        <li><a href='#'>Page</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}

function menuPagos($tipoGestion){
    $contenido = "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='#'>Page</a></li>
        <li><a href='#'>Page</a></li>
        <li><a href='#'>Page</a></li>
        <li><a href='#'>Page</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}