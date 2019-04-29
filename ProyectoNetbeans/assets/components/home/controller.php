<?php

function cerrarSesion(){
    $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/login/login.php';
    header("Location: $url"); 
}

function volverAlHome(){
    // $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/home/';
    // header("Location: $url"); 
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
        case 'pagos':
        return menuPagos($tipoGestion);
            break;
        
    }
}

function tipoFormEmpleados($tipoForm){
    switch ($tipoForm) {
        case 'nuevo':
           return menuEmpleados("empleados") . formAddEmpleados($tipoForm). "</div>";
           
            break;
        case 'ver':
        return menuEmpleados("empleados") . "</div>";
            break;
        case 'modificar':
            return menuEmpleados("empleados") . "</div>";
            break;
        case 'tareas':
        return menuTareas($tipoGestion);
            break;
        case 'pagos':
        return menuPagos($tipoGestion);
            break;
        
    }
}
function formAddEmpleados($tipoGestion){
    $contenido = "<form method='POST'>
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
        <div class='col-md-offset-8 col-md-4'>
        <button  id='addEmpleado'  name='addEmpleado' type='submit' class='btn'>Añadir Empleado</button>
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
        <li><a href='?empleado=nuevo'>Nuevo empleado</a></li>
        <li><a href='?empleado=ver'>Ver</a></li>
        <li><a href='?empleado=modificar'>Modificar</a></li>
        <li><a href='#'>Page</a></li>
        
    </ul>
</div>
</div>
</nav>
";
    return $contenido;
}

function menuClientes($tipoGestion){
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
            </nav>

             <h2>Collapsible Sidebar Using Bootstrap 3</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h3>Lorem Ipsum Dolor</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div> ";
    return $contenido;
}

function menuCasas($tipoGestion){
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
</nav>

             <h2>Collapsible Sidebar Using Bootstrap 3</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h3>Lorem Ipsum Dolor</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div>";
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
</nav>

             <h2>Collapsible Sidebar Using Bootstrap 3</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h3>Lorem Ipsum Dolor</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div>";
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
</nav>

             <h2>Collapsible Sidebar Using Bootstrap 3</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class='line'></div>

    <h3>Lorem Ipsum Dolor</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div>";
    return $contenido;
}