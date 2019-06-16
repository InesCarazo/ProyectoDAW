<?php

session_start();

require_once './model.php';
require_once './../functions.php';
require_once './controller-empleados.php';
require_once './controller-clientes.php';
require_once './controller-casas.php';
require_once './controller-tareas.php';
require_once './controller-pagos.php';
require_once './controller-perfil.php';
require_once './controller-home.php';


$rolArrayECA = Array();
array_push($rolArrayECA, "EMPLEADO");
array_push($rolArrayECA, "CLIENTE");
array_push($rolArrayECA, "ADMIN");
if (!isset($_SESSION['isLogged'])) 
{
    goLogin();
}
elseif ($_SESSION['isLogged'] == false) 
{
    goLogin();
} 
elseif (allowed($rolArrayECA)) 
{
    //echo $_SESSION['userRol'];
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
    $rolArrayE = Array();
    array_push($rolArrayE, "EMPLEADO");
    $rolArrayC = Array();
    array_push($rolArrayC, "CLIENTE");
    $rolArrayEC = Array();
    array_push($rolArrayEC, "EMPLEADO");
    array_push($rolArrayEC, "CLIENTE");
    array_push($rolArrayEC, "ADMIN");
    $rolArrayA = Array();
    array_push($rolArrayA, "ADMIN");
    switch ($tipoGestion) {
        case 'empleados'://Crear interfaz para gestionar el empleado que no es admin
        if (allowed($rolArrayA)) {
            return menuEmpleados("empleados") . formShowEmpleados() . "</div>";
        }           
            break;
        case 'clientes'://Crear interfaz para gestionar el cliente
        if (allowed($rolArrayA)) {
        return menuClientes("clientes") . formShowClientes() . "</div>";
        }
            break;
        case 'casas':
        if (allowed($rolArrayEC)) {
        return menuCasas($tipoGestion) . formShowCasas() . "</div>";
        }
            break;
        case 'tareas':
        if (allowed($rolArrayEC)) {
        return menuTareas($tipoGestion) . formShowTareas() . "</div>";
        }
            break;
        case 'per_empleado':
        if (allowed($rolArrayE)) {
            $id = $_SESSION['userID'];
        return menuPerfilEmpl($_SESSION['userLogueado']) . formShowPerfilEmpl($id) . "</div>";
        }
            break;
        case 'per_cliente':
        if (allowed($rolArrayC)) {
            $id = $_SESSION['userID'];
        return menuPerfilCli($_SESSION['userLogueado']) . formShowPerfilCli($id) . "</div>";
        }
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
                $_SESSION['idEmplSelect'] = $id;
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
        case 'vercasacli':
        return menuCasaPerfil($_SESSION['userLogueado']) . formShowCasasPerfil($_SESSION['userID']) . "</div>";
            break;
        case 'anadir':
            return menuCasas("casas") . formAddCasas() . "</div>";
            break;
        case 'anadircasacli':
            return menuCasaPerfil($_SESSION['userLogueado']) . formAddCasas() . "</div>";
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
        $rolArrayC = Array();
        array_push($rolArrayC, "CLIENTE");
        $rolArrayA = Array();
        array_push($rolArrayA, "ADMIN");
        $rolArrayAC = Array();
        array_push($rolArrayAC, "ADMIN");
        array_push($rolArrayAC, "CLIENTE");
    switch ($tipoForm) {
        case 'ver':
        if(allowed($rolArrayA)){
           return menuTareas("tareas") . formShowTareas() . "</div>";
        }
            break;
           
        case 'programar':
            return menuTareas("tareas") . formProgramarTareas() . "</div>";
            break;
            case 'programar_cli':
            return menuTareas("tareas") . formProgramarTareasCli($_SESSION['userID']) . "</div>";
            break;
        case 'modificar':
            if(allowed($rolArrayA)){
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
        }
            break;
        case 'anadir':
            return menuTareas("tareas") . formAddTareas() . "</div>";
            break;
    }
}

function tipoFormPerfil($tipoForm){
    switch ($tipoForm) {
        case 'tarea':
        return menuTareas("tareas") . formProgramarTareasCli($_SESSION['userID']) . "</div>";
    break;
    case 'casa':
    return menuCasaPerfil($_SESSION['userLogueado']) . formShowCasasPerfil($_SESSION['userID']) . "</div>";
    break;
    case 'empleado':
    break;
    }
}

function tipoFormHome($tipoForm){
    switch ($tipoForm) {
        case 'admin':
        return menuHomeUsers($_SESSION['userLogueado']) . datosAdmin($_SESSION['userID']) ."</div>";
        //    return menuEmpleados("empleados") . formAddEmpleados() . "</div>";
            break;
        case 'empleado':
        return menuHomeUsers($_SESSION['userLogueado']) . datosEmpl($_SESSION['userID']) ."</div>";
        // return menuHomeEmpleado() . formShowEmpleados() . "</div>";
            break;
        case 'cliente':
        return menuHomeUsers($_SESSION['userLogueado']) . datosCli($_SESSION['userID']) ."</div>";
            break; 
    }
}

function menuHome(){
    $contenido="<ul class='list-unstyled components'>
           ";
           $rolArrayA = Array();
           array_push($rolArrayA, "ADMIN");
           if(allowed($rolArrayA)){
            $contenido.="
            <li class='active'>
            <a href='?home=admin' aria-expanded='false'>Home</a>
        </li><li>
            <a href='#pageSubmenu' data-toggle='collapse' aria-expanded='false'>Gestión</a>
            <ul class='collapse list-unstyled' id='pageSubmenu'>
            <li><a href='?gestion=empleados' name='empleados'>Empleados</a></li> 
            <li><a href='?gestion=clientes' name='clientes'>Clientes</a></li>
            <li><a href='?gestion=casas' name='casas'>Casas</a></li>
            <li><a href='?gestion=tareas' name='tareas'>Tareas</a></li>
            </ul>    
            </li>";
        }
        $rolArrayE = Array();
           array_push($rolArrayE, "EMPLEADO");
           if(allowed($rolArrayE)){
            $contenido.="
            <li class='active'>
            <a href='?home=empleado' aria-expanded='false'>Home</a>
        </li><li><a href='?gestion=per_empleado' name='empleado'>Mi perfil</a></li> ";
        }
        $rolArrayC = Array();
           array_push($rolArrayC, "CLIENTE");
           if(allowed($rolArrayC)){
            $contenido.=" <li class='active'>
            <a href='?home=cliente' aria-expanded='false'>Home</a>
        </li><li><a href='?gestion=per_cliente' name='cliente'>Mi perfil</a></li>
            <li><a href='?perfil=casa' name='casas'>Casas</a></li>
            <li><a href='?perfil=tarea' name='tareas'>Tareas</a></li>";
        }
        $contenido.="
            
    
    <!--<li>
        <a href='?contacto'>Contacto</a>
    </li>-->
    <li>
        <a href='?cerrarsesion'>Cerrar sesión</a>
    </li>
</ul>
";

    return $contenido;
}