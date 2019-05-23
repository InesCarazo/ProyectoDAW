<?php

session_start();

require_once './model.php';
require_once './controller-empleados.php';
require_once './controller-clientes.php';
require_once './controller-casas.php';
require_once './controller-tareas.php';
require_once './controller-pagos.php';


if (!isset($_SESSION['isLogged'])) 
{
    goLogin();
}
elseif ($_SESSION['isLogged'] == false) 
{
    goLogin();
}
elseif ($_SESSION['isLogged'] == true) 
{
    //echo "<h3>" . $_SESSION['userLogueado'] ."</h3>" ;
    //echo $_SESSION['pwdLogueado'];
}
function goLogin()
{
    $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/login/view.php';
    //$url= 'http://aglinformatica.es:6080/icarazo/assets/components/login/view.php';
    header("Location: $url");
}

function cerrarSesion()
{
    session_destroy();
    goLogin();
}

function volverAlHome()
{
    $contenido = "</ul>
    </div>
    </div>
    </nav>";
    return $contenido;
}

function contacto()
{
    echo "NOT READY YET";
}


function tipoMenuGestion($tipoGestion){
    switch ($tipoGestion) {
        case 'empleados':
           return menuEmpleados("empleados") . formShowEmpleados() . "</div>";
           
            break;
        case 'clientes':
        return menuClientes("clientes") . formShowClientes() . "</div>";
            break;
        case 'casas':
        return menuCasas($tipoGestion) . formShowCasas() . "</div>";
            break;
        case 'tareas':
        return menuTareas($tipoGestion) . formShowTareas() . "</div>";
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
            case 'pagos':
        return menuEmpleados("empleados") .  menuPagosEmpleados() . "</div>";
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
            return menuClientes("clientes") . menuPagosClientes() . "</div>";
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

function tipoFormTareas($tipoForm){
    switch ($tipoForm) {
        case 'ver':
           return menuTareas("tareas") . formShowTareas() . "</div>";
            break;
        case 'programar':
            return menuTareas("tareas") . formProgramarTareas() . "</div>";
            break;
        case 'modificar':
            if (isset($_POST['btnRadioTarea'])) 
            {
                $id = $_POST['btnRadioTarea'];
                return menuTareas("tareas") . formModifyTareas($id) . "</div>";
            }
            else
            {
                $message = "Tienes que seleccionar una tarea para poder editar";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
           
            break;
        case 'anadir':
            return menuTareas("tareas") . formAddTareas() . "</div>";
            break;
    }
}
