<?php

session_start();

require_once './model.php';
require_once './controller-empleados.php';
require_once './controller-clientes.php';
require_once './controller-casas.php';



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
           return menuEmpleados("empleados") . formAddEmpleados() . "</div>";
           
            break;
        case 'ver':
        return menuEmpleados("empleados") . formShowEmpleados() . "</div>";
            break;
        case 'modificar':
            if (isset($_POST['btnradio'])) 
            {
                $id = $_POST['btnradio'];
                return menuEmpleados("empleados") . formModifyEmpleados($id) . "</div>";
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
           return menuClientes("clientes") . formShowClientes() . "</div>";
           
            break;
        case 'modificar':
            if (isset($_POST['btnRadioCli'])) 
            {
                $id = $_POST['btnRadioCli'];
                return menuClientes("clientes") . formModifyClientes($id) . "</div>";
            }
            else
            {
                $message = "Tienes que seleccionar un cliente para poder editar";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            break;
        case 'pagos':
            return menuClientes("clientes") . formPagosClientes($tipoForm) . "</div>";
            break;
    }
}

function tipoFormCasas($tipoForm){
    switch ($tipoForm) {
        case 'ver':
           return menuCasas("casas") . formShowCasas() . "</div>";
            break;
        case 'anadir':
            return menuCasas("casas") . formAddCasas() . "</div>";
            break;
        case 'modificar':
            if (isset($_POST['btnRadioCasa'])) 
            {
                $id = $_POST['btnRadioCasa'];
                return menuCasas("casas") . formModifyCasas($id) . "</div>";
            }
            else
            {
                $message = "Tienes que seleccionar una casa para poder editar";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
           
            break;
        case 'casa-cliente':
            return menuCasas("casas") . formCasaCliente($tipoForm) . "</div>";
            break;
    }
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