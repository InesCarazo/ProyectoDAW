<?php

if (isset($_POST['modCasa'])) 
{
    $id = $_SESSION['idCasaSelect'];
    $modifyDireccion = $_POST['modifyDireccion'];
    $modifyCiudad = $_POST['modifyCiudad'];
    if (isset($_POST['modifyHasForniture'])) 
    {
        $modifyHasForniture = 1;
    }
    else
    {
        $modifyHasForniture  = 0;
    }
    $modifySice = $_POST['modifySice'];
    
    $modelClass = new modelClass();
    $modelClass->modifyCasa($id, $modifyDireccion, $modifyCiudad, $modifyHasForniture, $modifySice);
}

if (isset($_POST['addCasa'])) 
{
    $addDireccion = $_POST['addDireccion'];
    $addCiudad = $_POST['addCiudad'];
    if (isset($_POST['addHasForniture'])) 
    {
        $addHasForniture = 1;
    }
    else
    {
        $addHasForniture  = 0;
    }
    $addSice = $_POST['addSice'];
    $cliente = $_POST['chooseClient'];

    $modelClass = new modelClass();
    $modelClass->addCasa($addDireccion, $addCiudad, $addHasForniture, $addSice, $cliente);

}

if (isset($_POST['borrarCasa'])) 
{
    $id = $_SESSION['idCasaSelect'];
    $modelClass = new modelClass();
    $modelClass->deleteCasa($id);
}

function generarSelectClientesAdd(){
    $modelClass = new modelClass(); 
    $clientes = $modelClass->verClientes();
    foreach ($clientes as $key => $value) 
    {
        $contenido ="
        <div class='form-group row'>
        <label for='chooseClient' class='control-label col-md-4'>Cliente</label>
            <div class='col-md-8'>
                <select name='chooseClient' class='form-control'>";
                foreach ($clientes as $key => $value2)
                {
                        $contenido.= "<option id='chooseClient' name='chooseClient' class='form-control' value='" . $value2->getP_cliente() . "'>" .$value2->getApellidos() .", " .$value2->getNombre() ."</option>";
                }
            $contenido.="
                </select>
            </div>
        </div>";
    }
    return $contenido;
}

function formAddCasas(){
    $contenido = "<form method='POST' action='?gestion=casas' class='contenido-home'>
    <div>
        <div class='form-group row'>
            <label for='direccion' class='control-label col-md-4'>Dirección</label>
            <div class='col-md-8'>
                <input id='direccion' name='addDireccion' placeholder='Ej: Avda. Pintor Sorolla, 125 4ºG' type='text' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='ciudad' class='control-label col-md-4'>Ciudad</label>
            <div class='col-md-8'>
                <input id='ciudad' name='addCiudad' placeholder='Ej: Madrid' type='text' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='hasForniture' class='control-label col-md-4'>Electrodomésticos</label>
            <div class='col-md-8'>
                <input type='checkbox' id='hasForniture' name='addHasForniture' class='checkbox checkbox-inline form-control-static'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='sice' class='control-label col-md-4'>Tamaño (m<sup>2</sup>)</label>
            <div class='col-md-8'>
                <input id='sice' name='addSice' placeholder='Ej: 220' type='text' class='form-control'>
            </div>
        </div>".generarSelectClientesAdd().
        "
        <div class='form-group row'>
            <div class='col-md-offset-9 col-md-3'>
                <button id='addCasa' name='addCasa' type='submit' class='btn estilo-btn'>Añadir Casa</button>
            </div>
        </div>
    </div>
</form>";
    return $contenido;
}

function tablaVistaCasas(){
    $tablaHTML= "<div id='tablaVista' class='container-fluid'>
    <form method='POST' action='?casa=modificar'>
        <table class='row table table-bordered table-hover table-responsive'>
            <thead>
                <tr>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th class='text-center'>Dirección</th>
                    <th class='text-center'>Ciudad</th>
                    <th class='text-center'>Electrodomésticos</th>
                    <th class='text-center'>Tamaño (m<sup>2</sup>)</th>
                </tr>
            </thead>
            <tbody>"; 
            $model = new modelClass(); 
            $casas = $model->verCasas(); 
            foreach ($casas as $value) { 
                $_SESSION['idCasaSelect'] = $value->getP_casa();
                $tablaHTML.= "
                <tr>
                    <td>
                        <input class='radio' type='radio' value='" . $value->getP_casa() . "' name='btnRadioCasa' checked>
                    </td>
                    <td class='text-center'>" . $value->getDireccion() . "</td>
                    <td class='text-center'>" . $value->getCiudad() . "</td>
                    <td class='text-center'>
                        ";

                        if ($value->getHasFurniture() == 1) 
                        {
                            $tablaHTML.= "<input type='checkbox' class='checkbox checkbox-inline' name='btncheck' checked onclick='return false;'>";
                        }
                        else{
                            $tablaHTML.= "<input type='checkbox' class='checkbox checkbox-inline' name='btncheck' onclick='return false;'>";
                        }
                        $tablaHTML.="
                    </td>
                    <td class='text-center'>" . $value->getSice() . "</td>
                </tr>"; } $tablaHTML.= "</tbody>
        </table>
        <div class='col-md-6'>
                <button id='modificarCasa' name='modificarCasa' type='submit' class='btn estilo-btn modBorr center-block'>Modificar</button>
        </div>
    </form>
    <div class='col-md-6'>
        <form method='POST' action='?casa=ver'>
            <button id='borrarCasa' name='borrarCasa' type='submit' class='btn estilo-btn modBorr center-block'>Borrar</button>
        </form>
    
    </div>
    </div>";
return $tablaHTML;
}

function formShowCasas(){
    $contenido = "" . 
    tablaVistaCasas()
     . "";
    return $contenido;
}

function generarSelectClientesModify($idClienteSelected)
{
    $modelClass = new modelClass(); 
    $clientes = $modelClass->verClientes();
    foreach ($clientes as $key => $value) 
    {
       
    $contenido ="
    <div class='form-group row'>
    <label for='chooseClient' class='control-label col-md-4'>Cliente</label>
        <div class='col-md-8'>
            <select name='chooseClient' class='form-control'>";
            foreach ($clientes as $key => $value2)
            {
                if ($idClienteSelected == $value2->getP_cliente()) {
                    $contenido.= "<option id='chooseClient' name='modifychooseClient' class='form-control' selected>" .$value2->getApellidos() .", " .$value2->getNombre() ."</option>";
                }
                    else
                {
                    $contenido.= "<option id='chooseClient' name='modifychooseClient' class='form-control'>" .$value2->getApellidos() .", " .$value2->getNombre() ."</option>";
                }
            }
                $contenido.="
            </select>
        </div>
    </div>";
}
    return $contenido;
}

function formModifyCasas($id){
    $_SESSION['idCasaSelect']= $id;
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
                <input id='direccion' name='modifyDireccion' placeholder='Ej: Avda. Pintor Sorolla, 125 4ºG' type='text' value='". $casa->getDireccion() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='ciudad' class='control-label col-md-4'>Ciudad</label>
            <div class='col-md-8'>
                <input id='ciudad' name='modifyCiudad' placeholder='Ej: Madrid' type='text'  value='". $casa->getCiudad() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='hasForniture' class='control-label col-md-4'>Electrodomésticos</label>
            <div class='col-md-8'>";
                if ($casa->getHasFurniture() == 1) 
                {
                    $contenido.= "<input type='checkbox' id='hasForniture' name='modifyHasForniture' value='1' class='checkbox form-control-static' checked>";
                }
                else{
                    $contenido.= "<input type='checkbox' id='hasForniture' name='modifyHasForniture' value='0' class='checkbox checkbox-inline form-control-static'>";
                }
                $contenido.="
            </div>
        </div>
        <div class='form-group row'>
            <label for='sice' class='control-label col-md-4'>Tamaño (m<sup>2</sup>)</label>
            <div class='col-md-8'>
                <input id='sice' name='modifySice' placeholder='sice' type='text'  value='". $casa->getSice() ."' class='form-control'>
            </div>
        </div>". generarSelectClientesModify($casa->getA_cliente()) .
        "
        <div class='form-group row'>
            <div class='col-md-offset-9 col-md-3'>
                <button id='modCasa' name='modCasa' type='submit' class='btn estilo-btn'>Modificar Casa</button>
            </div>
        </div>
    </div>
</form>";
    return $contenido;
}

function menuCasas($tipoGestion){
    $contenido = "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='?casa=ver'>Ver</a></li>
        <li><a href='?casa=anadir'>Añadir</a></li> 
        <!--<li><a href='?casa=casa-cliente'>Casa-Cliente</a></li>       
        <li><a href='?casa=modificar'>Modificar</a></li>-->
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}