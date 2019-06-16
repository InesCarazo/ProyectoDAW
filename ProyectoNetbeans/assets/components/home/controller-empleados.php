<?php
require_once './model.php';

if (isset($_POST['borrarEmpleado'])) 
{
    $id = $_SESSION['idEmplSelect'];
    $modelClass = new modelClass();
    $modelClass->deleteEmpleado($id);
}

function formAddEmpleados()
{
    $contenido = "<form method='POST' class='contenido-home' data-toggle='validator'>
    <div class='row'>
    <div class='form-group'>
        <label for='usuario' class='control-label col-md-4'>Usuario</label>
        <div class='col-md-8'>
            <input id='addUsuario' name='addUsuario' placeholder='usuario' type='text' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='contrasena' class='control-label col-md-4'>Contraseña</label>
        <div class='col-md-8'>
            <input id='addContrasena' name='addContrasena' placeholder='********' type='password' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='nombre' class='control-label col-md-4'>Nombre</label>
        <div class='col-md-8'>
            <input id='addNombre' name='addNombre' placeholder='nombre' type='text' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='apellidos' class='control-label col-md-4'>Apellidos</label>
        <div class='col-md-8'>
            <input id='addApellidos' name='addApellidos' placeholder='apellidos' type='text' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='dni' class='control-label col-md-4'>Dni</label>
        <div class='col-md-8'>
            <input id='addDni' name='addDni' placeholder='00000000A' type='text' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='telefono' class='control-label col-md-4'>Telefono</label>
        <div class='col-md-8'>
            <input id='addTelefono' name='addTelefono' placeholder='658974125' type='number' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='correo' class='control-label col-md-4'>Correo</label>
        <div class='col-md-8'>
            <input id='addCorreo' name='addCorreo' placeholder='correo@correo.es' type='email' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='fnacimiento' class='control-label col-md-4'>Fecha Nacimiento</label>
        <div class='col-md-8'>
            <input id='addFnacimiento' name='addFnacimiento' type='date' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='nss' class='control-label col-md-4'>Nº SS</label>
        <div class='col-md-8'>
            <input id='addNss' name='addNss' type='text' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
    <label for='admin' class='control-label col-md-4'>Administrador</label> 
    <div class='col-md-8'>
        <input type='checkbox' id='addAdmin' name='addAdmin' value='1' checked='checked'>
    </div>
  </div> 
    <div class='form-group'>
        <div class='col-md-offset-10 col-md-2'>
        <button id='addEmpleado' name='addEmpleado' type='submit' class='btn estilo-btn'>Añadir Empleado</button>
        </div>
    </div>
    
    </div>
</form>
<div id='mensaje_error'></div>";
return $contenido;
}

function tablaVistaEmpleados(){
    $tablaHTML= "
    <form method='POST' action='?empleado=modificar'>
    <div id='tablaVista' class='row'>
        <table class='col-md-12 table-bordered table-hover table-responsive'>
            <thead>
                <tr>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th class='text-center'>Nombre</th>
                    <th class='text-center'>Apellidos</th>
                    <th class='text-center'>Dni</th>
                    <th class='text-center'>Telefono</th>
                    <th class='text-center'>Correo</th>
                    <th class='text-center'>Fecha de nacimiento</th>
                </tr>
            </thead>
            <tbody>"; $model = new modelClass(); $empleados = $model->verEmpleados(); foreach ($empleados as $value) { $tablaHTML.= "
                <tr>
                    <td>
                        <input class='radio' type='radio' name='btnradio' value='". $value->getP_Usuario()."'>
                    </td>
                    <td class='text-center'>" . $value->getNombre() . "</td>
                    <td class='text-center'>" . $value->getApellidos() . "</td>
                    <td class='text-center'>" . $value->getDni() . "</td>
                    <td class='text-center'>" . $value->getTelefono() . "</td>
                    <td class='text-center'>" . $value->getCorreo() . "</td>
                    <td class='text-center'>" . date("d-m-Y", strtotime($value->getFechaNacimiento())) . "</td>
                </tr>"; $_SESSION['idEmplSelect']= $value->getP_Usuario();} $tablaHTML.= "</tbody>
        </table>
        <div id='btnDiv' class='col-md-3'>
    <button id='modificarEmpleado' name='modificarEmpleado' type='submit' class='btn estilo-btn btn-pagos-empl-l'>Modificar</button>
    </form>
        <form method='POST ' action='?empleado=ver'>
            <button id='borrarEmpleado' name='borrarEmpleado' type='submit' class='btn estilo-btn btn-pagos-empl-l'>Borrar</button>
        </form>
</div>
";
return $tablaHTML;
}

function formShowEmpleados(){
$contenido ="" . 
tablaVistaEmpleados()
 . "";
return $contenido;
}

function formModifyEmpleados($id){
    $_SESSION['idEmplSelect']= $id;
    $model2 = new modelClass();
    $empleado = $model2->buscarEmpleado($id);
    // $_SESSION['id_mod_empl'] = $id;
    $contenido = "<form method='POST' action='?gestion=empleados' class='contenido-home'>
        <div class='row'>
        <div class='form-group'>
            <label for='id' class='control-label col-md-4'>Id</label>
            <label type='text' id='modifyId' name='modifyId' class='col-md-8 control-label'>$id</label>
        </div>
        <div class='form-group'>
            <label for='usuario' class='control-label col-md-4'>Usuario</label>
            <div class='col-md-8'>
                <input id='modifyUsuario' name='modifyUsuario' placeholder='usuario' type='text' required='required' value='". $empleado->getUsuario() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='contrasena' class='control-label col-md-4'>Contraseña</label>
            <div class='col-md-8'>
                <input id='modifyContrasena' name='modifyContrasena' type='password' required='required' value='". $empleado->getContrasena() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='nombre' class='control-label col-md-4'>Nombre</label>
            <div class='col-md-8'>
                <input id='modifyNombre' name='modifyNombre' placeholder='nombre' type='text' required='required' value='". $empleado->getNombre() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='apellidos' class='control-label col-md-4'>Apellidos</label>
            <div class='col-md-8'>
                <input id='modifyApellidos' name='modifyApellidos' placeholder='apellidos' type='text' value='". $empleado->getApellidos() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
        <label for='dni' class='control-label col-md-4'>Dni</label>
        <div class='col-md-8'>
            <input id='modifyDni' name='modifyDni' placeholder='00000000A' type='text' required='required' value='". $empleado->getDni() ."' class='form-control'>
        </div>
    </div>
        <div class='form-group'>
            <label for='telefono' class='control-label col-md-4'>Telefono</label>
            <div class='col-md-8'>
                <input id='modifyTelefono' name='modifyTelefono' placeholder='658974125' type='number' required='required' value='". $empleado->getTelefono() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='correo' class='control-label col-md-4'>Correo</label>
            <div class='col-md-8'>
                <input id='modifyCorreo' name='modifyCorreo' placeholder='correo@correo.es' type='email' required='required' value='". $empleado->getCorreo() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='fnacimiento' class='control-label col-md-4'>Fecha Nacimiento</label>
            <div class='col-md-8'>
                <input id='modifyFnacimiento' name='modifyFnacimiento' type='date' required='required' value='".$empleado->getFechaNacimiento() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='nss' class='control-label col-md-4'>Nº SS</label>
            <div class='col-md-8'>
                <input id='modifyNss' name='modifyNss' type='text' required='required' value='". $empleado->getnSS() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
        <label for='admin' class='control-label col-md-4'>Administrador</label> 
        <div class='col-md-8'> "; 

    if ($empleado->getIsAdmin() == 1) 
    {
        $contenido.= "<input type='checkbox' id='modifyAdmin' name='modifyAdmin' checked>";   
    }
    else
    {
        $contenido.= "<input type='checkbox' id='modifyAdmin' name='modifyAdmin'>"; 
    }
    $contenido.="</div>
  </div> 
    <div class='form-group'>
        <div class='col-md-offset-9 col-md-3''>
        <button  id='modEmpleado'  name='modificar' type='submit' class='btn estilo-btn'>Modificar Empleado</button>
        </div>
    </div>
    </div>
</form>
<div id='mensaje_error' class='col-md-12'></div>";
return $contenido;
}

function menuEmpleados($tipoGestion){
    $contenido = "<div class='col-md-12 collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
              
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='?empleado=ver'>Ver</a></li>
        <li><a href='?empleado=anadir'>Añadir</a></li>
        <!--<li><a href='?empleado=modificar'>Modificar</a></li> 
        <li><a href='?empleado=tareas'>Tareas</a></li>-->
        <li><a href='?empleado=pagos'>Pagos</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}