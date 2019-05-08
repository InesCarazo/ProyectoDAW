<?php
require_once './model.php';


//session_start();

if (isset($_POST['addEmpleado'])) 
{
    $addUsuario = $_POST['addUsuario'];
    $addContrasena = $_POST['addContrasena'];
    $addNombre = $_POST['addNombre'];
    $addApellidos = $_POST['addApellidos'];
    $addTelefono = $_POST['addTelefono'];
    $addCorreo = $_POST['addCorreo'];
    $addFnacimiento = $_POST['addFnacimiento'];
    $addNss = $_POST['addNss'];
    $addAdmin = '';
    if($_POST['addAdmin'] == 1)
    {
        $addAdmin = 1;
    }
    else
    {
        $addAdmin=0;
    }
    $modelClass = new modelClass();
    $modelClass->addEmpleado($addUsuario, $addContrasena, $addNombre, $addApellidos, $addTelefono, $addCorreo, $addFnacimiento, $addNss, $addAdmin);

}

if (isset($_POST['modificar'])) 
{
    $id = $_SESSION['idEmplSelect'];
    $modifyUsuario = $_POST['modifyUsuario'];
    $modifyContrasena = $_POST['modifyContrasena'];
    $modifyNombre = $_POST['modifyNombre'];
    $modifyApellidos = $_POST['modifyApellidos'];
    $modifyTelefono = $_POST['modifyTelefono'];
    $modifyCorreo = $_POST['modifyCorreo'];
    $modifyFnacimiento = $_POST['modifyFnacimiento'];
    $modifyNss = $_POST['modifyNss'];
    $modifyAdmin= 0;
    if (isset($_POST['modifyAdmin']) && $_POST['modifyAdmin'])
    {
        $modifyAdmin = 1;
    }
    else 
    {
        $modifyAdmin=0;
    }
    $modelClass = new modelClass();
    $modelClass->modifyEmpleado($id, $modifyUsuario, $modifyContrasena, $modifyNombre, $modifyApellidos, $modifyTelefono, $modifyCorreo, $modifyFnacimiento, $modifyNss, $modifyAdmin);
}

if (isset($_POST['borrarEmpleado'])) 
{
    $id = $_SESSION['idEmplSelect'];
    $modelClass = new modelClass();
    $modelClass->deleteEmpleado($id);
}

function formAddEmpleados()
{
    $contenido = "<form method='POST' class='contenido-home'>
    <div class='row'>
    <div class='form-group'>
        <label for='usuario' class='control-label col-md-4'>Usuario</label>
        <div class='col-md-8'>
            <input id='usuario' name='addUsuario' placeholder='usuario' type='text' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='contrasena' class='control-label col-md-4'>Contraseña</label>
        <div class='col-md-8'>
            <input id='contrasena' name='addContrasena' type='password' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='nombre' class='control-label col-md-4'>Nombre</label>
        <div class='col-md-8'>
            <input id='nombre' name='addNombre' placeholder='nombre' type='text' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='apellidos' class='control-label col-md-4'>Apellidos</label>
        <div class='col-md-8'>
            <input id='apellidos' name='addApellidos' placeholder='apellidos' type='text' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='telefono' class='control-label col-md-4'>Telefono</label>
        <div class='col-md-8'>
            <input id='telefono' name='addTelefono' placeholder='658974125' type='number' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='correo' class='control-label col-md-4'>Correo</label>
        <div class='col-md-8'>
            <input id='correo' name='addCorreo' placeholder='correo@correo.es' type='email' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='fnacimiento' class='control-label col-md-4'>Fecha Nacimiento</label>
        <div class='col-md-8'>
            <input id='fnacimiento' name='addFnacimiento' type='date' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
        <label for='nss' class='control-label col-md-4'>Nº SS</label>
        <div class='col-md-8'>
            <input id='nss' name='addNss' type='text' required='required' class='form-control'>
        </div>
    </div>
    <div class='form-group'>
    <label for='admin' class='control-label col-md-4'>Administrador</label> 
    <div class='col-md-8'>
        <input type='checkbox' name='addAdmin' value='1' checked='checked'>
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
    $tablaHTML= "<form method='POST' action='?empleado=modificar'>
    <div id='tablaVista' class='row'>
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
            <tbody>"; $model = new modelClass(); $empleados = $model->verEmpleados(); foreach ($empleados as $value) { $tablaHTML.= "
                <tr>
                    <td>
                        <input class='radio' type='radio' name='btnradio' value='". $value->getP_Usuario()."' checked>
                    </td>
                    <td class='text-center'>" . $value->getNombre() . "</td>
                    <td class='text-center'>" . $value->getApellidos() . "</td>
                    <td class='text-center'>" . $value->getTelefono() . "</td>
                    <td class='text-center'>" . $value->getCorreo() . "</td>
                    <td class='text-center'>" . $value->getFechaNacimiento() . "</td>
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
        
    $contenido = "<form method='POST' action='?gestion=empleados' class='contenido-home'>
        <div class='row'>
        <div class='form-group'>
            <label for='id' class='control-label col-md-4'>Id</label>
            <label type='text' id='id' name='modifyId' class='col-md-8 control-label'>$id</label
        </div>
        <div class='form-group'>
            <label for='usuario' class='control-label col-md-4'>Usuario</label>
            <div class='col-md-8'>
                <input id='usuario' name='modifyUsuario' placeholder='usuario' type='text' required='required' value='". $empleado->getUsuario() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='contrasena' class='control-label col-md-4'>Contraseña</label>
            <div class='col-md-8'>
                <input id='contrasena' name='modifyContrasena' type='password' required='required' value='". $empleado->getContrasena() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='nombre' class='control-label col-md-4'>Nombre</label>
            <div class='col-md-8'>
                <input id='nombre' name='modifyNombre' placeholder='nombre' type='text' required='required' value='". $empleado->getNombre() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='apellidos' class='control-label col-md-4'>Apellidos</label>
            <div class='col-md-8'>
                <input id='apellidos' name='modifyApellidos' placeholder='apellidos' type='text' value='". $empleado->getApellidos() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='telefono' class='control-label col-md-4'>Telefono</label>
            <div class='col-md-8'>
                <input id='telefono' name='modifyTelefono' placeholder='658974125' type='number' required='required' value='". $empleado->getTelefono() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='correo' class='control-label col-md-4'>Correo</label>
            <div class='col-md-8'>
                <input id='correo' name='modifyCorreo' placeholder='correo@correo.es' type='email' required='required' value='". $empleado->getCorreo() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='fnacimiento' class='control-label col-md-4'>Fecha Nacimiento</label>
            <div class='col-md-8'>
                <input id='fnacimiento' name='modifyFnacimiento' type='date' required='required' value='". $empleado->getFechaNacimiento() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='nss' class='control-label col-md-4'>Nº SS</label>
            <div class='col-md-8'>
                <input id='nss' name='modifyNss' type='text' required='required' value='". $empleado->getnSS() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
        <label for='admin' class='control-label col-md-4'>Administrador</label> 
        <div class='col-md-8'> "; 

    if ($empleado->getIsAdmin() == 1) 
    {
        $contenido.= "<input type='checkbox' name='modifyAdmin' checked>";   
       // $_SESSION['modifyAdmin']=1;
    }
    else
    {
        $contenido.= "<input type='checkbox' name='modifyAdmin'>"; 
        //$_SESSION['modifyAdmin']=0;
    }
    $contenido.="</div>
  </div> 
    <div class='form-group'>
        <div class='col-md-offset-9 col-md-3''>
        <button  id='modEmpleado'  name='modificar' type='submit' class='btn estilo-btn'>Modificar Empleado</button>
        </div>
    </div>
    </div>
</form>";
return $contenido;
}

function menuEmpleados($tipoGestion){
    $contenido = "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
              
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