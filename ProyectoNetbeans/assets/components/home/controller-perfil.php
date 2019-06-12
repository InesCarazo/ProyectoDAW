<?php



function menuPerfilEmpl($user)
{
    $contenido = "<div class='col-md-12 collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($user) ."</a></li>
        <li><a href='?perfil=empleado'>Mi perfil</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}

function formShowPerfilEmpl($id)
{
    $contenido = "".formPerfilEmpleados($id)."";
    return $contenido;
}

function formPerfilEmpleados($id){
    $model2 = new modelClass();
    $empleado = $model2->buscarEmpleado($id);
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
        <button  id='modEmpleado'  name='modificar' type='submit' class='btn estilo-btn'>Modificar</button>
        </div>
    </div>
    </div>
</form>
<div id='mensaje_error' class='col-md-12'></div>";
return $contenido;
}

function menuPerfilCli($user)
{
    $contenido = "<div class='col-md-12 collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($user) ."</a></li>
        <li><a href='?perfil=cliente'>Perfil</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}

function formShowPerfilCli($id)
{
    $contenido = "" . 
        formPerfilClientes($id)
     . "";
    return $contenido;
}

function formPerfilClientes($id)
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
                <input id='modifyUsuario' name='modifyUsuario' placeholder='usuario' type='text' value='". $cliente->getUsuario() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='contrasena' class='control-label col-md-4'>Contraseña</label>
            <div class='col-md-8'>
                <input id='modifyContrasena' name='modifyContrasena' placeholder='***********' type='password'  value='". $cliente->getContrasena() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='nombre' class='control-label col-md-4'>Nombre</label>
            <div class='col-md-8'>
                <input id='modifyNombre' name='modifyNombre' placeholder='nombre' type='text'  value='". $cliente->getNombre() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='apellidos' class='control-label col-md-4'>Apellidos</label>
            <div class='col-md-8'>
                <input id='modifyApellidos' name='modifyApellidos' placeholder='apellidos' type='text'  value='". $cliente->getNombre() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
        <label for='dni' class='control-label col-md-4'>Dni</label>
        <div class='col-md-8'>
            <input id='modifyDni' name='modifyDni' placeholder='00000000A' type='text' required='required' value='". $cliente->getDni() ."' class='form-control'>
        </div>
    </div>
        <div class='form-group'>
            <label for='telefono' class='control-label col-md-4'>Telefono</label>
            <div class='col-md-8'>
                <input id='modifyTelefono' name='modifyTelefono' placeholder='658974125' type='tel'  value='". $cliente->getTelefono() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='correo' class='control-label col-md-4'>Correo</label>
            <div class='col-md-8'>
                <input id='modifyCorreo' name='modifyCorreo' placeholder='correo@correo.es' type='email'  value='". $cliente->getCorreo() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='fnacimiento' class='control-label col-md-4'>Fecha Nacimiento</label>
            <div class='col-md-8'>
                <input id='modifyFnacimiento' name='modifyFnacimiento' type='date'  value='".$cliente->getFechaNacimiento() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='pago' class='control-label col-md-4'>Forma de pago</label>
            <div class='col-md-8'>
                <input id='modifyPago' name='modifyPago' type='text'  value='". $cliente->getFormaPago() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='nCuenta' class='control-label col-md-4'>Nº de cuenta</label>
            <div class='col-md-8'>
                <input type='text' id='modifyNCuenta' name='modifyNCuenta' value='". $cliente->getnCuenta() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <div class='col-md-offset-9 col-md-3'>
                <button id='modCliente' name='modCliente' type='submit' class='btn estilo-btn'>Modificar</button>
            </div>
        </div>
    </div>
</form>
<div id='mensaje_error' class='row'></div>";
    return $contenido;
}


function formModifyCasa($id){
    //$_SESSION['idCasaSelect']= $id;
    $model = new modelClass();
    $casa = $model->buscarCasa($id);
    $contenido = "<form method='POST' action='?gestion=casas' class='contenido-home'>
    <div>
        <div class='form-group row'>
            <label for='id' class='control-label col-md-4'>Id</label>
            <label type='text' id='id' name='modifyId' class='col-md-8 control-label'>$id</label>
        </div>
        <div class='form-group row'>
            <label for='direccion' class='control-label col-md-4'>Dirección</label>
            <div class='col-md-8'>
                <input id='modifyDireccion' name='modifyDireccion' placeholder='Ej: Avda. Pintor Sorolla, 125 4ºG' type='text' value='". $casa->getDireccion() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='ciudad' class='control-label col-md-4'>Ciudad</label>
            <div class='col-md-8'>
                <input id='modifyCiudad' name='modifyCiudad' placeholder='Ej: Madrid' type='text'  value='". $casa->getCiudad() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='hasForniture' class='control-label col-md-4'>Electrodomésticos</label>
            <div class='col-md-8'>";
                if ($casa->getHasFurniture() == 1) 
                {
                    $contenido.= "<input type='checkbox' id='modifyHasForniture' name='modifyHasForniture' value='1' class='checkbox form-control-static' checked>";
                }
                else{
                    $contenido.= "<input type='checkbox' id='modifyHasForniture' name='modifyHasForniture' value='0' class='checkbox checkbox-inline form-control-static'>";
                }
                $contenido.="
            </div>
        </div>
        <div class='form-group row'>
            <label for='sice' class='control-label col-md-4'>Tamaño (m<sup>2</sup>)</label>
            <div class='col-md-8'>
                <input id='modifySice' name='modifySice' placeholder='sice' type='text'  value='". $casa->getSice() ."' class='form-control'>
            </div>
        </div>". generarSelectClientesModify($casa->getA_cliente()) .
        "
        <div class='form-group row'>
            <div class='col-md-offset-9 col-md-3'>
                <button id='modCasa' name='modCasa' type='submit' class='btn estilo-btn'>Modificar Casa</button>
            </div>
        </div>
    </div>
</form>
<div id='mensaje_error' class='row'></div>";
    return $contenido;
}

function menuCasa($tipoGestion){
    $contenido = "<div class='col-md-12 collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='?casa=vercli'>Ver</a></li>
        <li><a href='?casa=anadircli'>Añadir</a></li> 
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}