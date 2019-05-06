<?php

if (isset($_POST['modTarea'])) 
{
    $id = $_SESSION['idTareaSelect'];
    $modifyTexto = $_POST['modifyTexto'];
    $modifyDuracion = $_POST['modifyDuracion'];
    $modifyPrecio = $_POST['modifyPrecio'];
    $modifyComentario = $_POST['modifyComentarios'];
    
    
    $modelClass = new modelClass();
    $modelClass->modifyTarea($id, $modifyTexto, $modifyDuracion, $modifyPrecio, $modifyComentario);
}

if (isset($_POST['addTarea'])) 
{
    $addTexto = $_POST['addTexto'];
    $addDuracion = $_POST['addDuracion'];
    $addPrecio = $_POST['addPrecio'];
    $addComentario = $_POST['addComentarios'];

    $modelClass = new modelClass();
    $modelClass->addTarea($addTexto, $addDuracion, $addPrecio, $addComentario);

}

function tablaVistaTareas(){
    $tablaHTML= "<div id='tablaVista' class='container-fluid'>
    <form method='POST' action='?tarea=modificar'>
        <table class='row table table-bordered table-hover table-responsive'>
            <thead>
                <tr>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th class='text-center'>Nombre tarea</th>
                    <th class='text-center'>Duración(h)</th>
                    <th class='text-center'>Precio(€)</th>
                </tr>
            </thead>
            <tbody>"; 
            $model = new modelClass(); 
            $tareas = $model->verTareas(); 
            foreach ($tareas as $value) { 
                $tablaHTML.= "
                <tr>
                    <td>
                        <input class='radio' type='radio' value='" . $value->getP_tipo_tarea() . "' name='btnRadioTarea' checked>
                    </td>
                    <td class='text-center'>" . $value->getTexto() . "</td>
                    <td class='text-center'>" . $value->getDuracion_h() . "</td>
                    <td class='text-center'>" . $value->getPrecio() . "</td>
                </tr>"; } $tablaHTML.= "</tbody>
        </table>

        <div class='col-md-offset-8 col-md-4 row'>
            <button id='modificarTarea' name='modificarTarea' type='submit' class='btn estilo-btn'>Modificar Tarea</button>
        </div>
    </form>
</div>";
return $tablaHTML;
}

function formShowTareas(){
    $contenido = "" . 
    tablaVistaTareas()
     . "";
    return $contenido;
}


function formModifyTareas($id){
    $_SESSION['idTareaSelect']= $id;
    $model = new modelClass();
    $tarea = $model->buscarTarea($id);
    $contenido = "<form method='POST' action='?gestion=tareas' class='contenido-home'>
    <div>
        <div class='form-group row'>
            <label for='id' class='control-label col-md-4'>Id</label>
            <label type='text' id='id' name='modifyId' class='col-md-8 control-label'>$id</label>
        </div>
        <div class='form-group row'>
            <label for='texto' class='control-label col-md-4'>Nombre de tarea</label>
            <div class='col-md-8'>
                <input id='texto' name='modifyTexto' placeholder='Ej: Barrer el suelo' type='text' value='". $tarea->getTexto() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='duracion' class='control-label col-md-4'>Duración (h)</label>
            <div class='col-md-8'>
                <input id='duracion' name='modifyDuracion' type='number'  value='". $tarea->getDuracion_h() ."' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='precio' class='control-label col-md-4'>Precio (€)</label>
            <div class='col-md-8'>
                <input id='precio' name='modifyPrecio' placeholder='10 €' type='text'  value='". $tarea->getPrecio() ."' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='Comentarios' class='control-label col-md-4'>Comentario</label>
            <div class='col-md-8'>
                <textarea id='Comentarios' name='modifyComentarios' type='text' class='form-control'>". $tarea->getComentarios() ."</textarea>
            </div>
        </div>
        <div class='form-group row'>
            <div class='col-md-offset-9 col-md-3'>
                <button id='modTarea' name='modTarea' type='submit' class='btn estilo-btn'>Modificar Tarea</button>
            </div>
        </div>
    </div>
</form>";
    return $contenido;
}


function formAddTareas(){
    $contenido = "<form method='POST' action='?gestion=tareas' class='contenido-home'>
    <div>
        <div class='form-group row'>
            <label for='texto' class='control-label col-md-4'>Nombre de tarea</label>
            <div class='col-md-8'>
                <input id='texto' name='addTexto' placeholder='Ej: Barrer el suelo' type='text' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='duracion' class='control-label col-md-4'>Duración</label>
            <div class='col-md-8'>
                <input id='duracion' name='addDuracion' placeholder='1' type='number' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='precio' class='control-label col-md-4'>precio (€)</label>
            <div class='col-md-8'>
                <input id='precio' name='addPrecio' placeholder='10 €' type='text' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label for='Comentarios' class='control-label col-md-4'>Comentario</label>
            <div class='col-md-8'>
                <textarea id='Comentarios' name='addComentarios' placeholder='Escribe aquí tus comentarios' type='text' class='form-control'></textarea>
            </div>
        </div>
        <div class='form-group row'>
            <div class='col-md-offset-9 col-md-3'>
                <button id='addTarea' name='addTarea' type='submit' class='btn estilo-btn'>Añadir Tarea</button>
            </div>
        </div>
    </div>
</form>";
    return $contenido;
}


function formProgramarTareas(){
    $contenido = "<form method='POST' action='?gestion=tareas' class='contenido-home'>
    <div class='col-md-6'>
        <div class='form-group row'>
            <label class='col-md-4 col-form-label' for='progTarea'>Tareas</label>
            <div class='col-md-8'>
                <select id='progTarea' name='progTarea' class='custom-select form-control' required='required'>
                    <option value='rabbit'>Rabbit</option>
                    <option value='duck'>Duck</option>
                    <option value='fish'>Fish</option>
                </select>
            </div>
        </div>
        <div class='form-group row'>
            <label for='fecha' class='control-label col-md-4'>Duración (h)</label>
            <div class='col-md-8'>
                <input id='fecha' name='progfecha' type='date' required='required' class='form-control'>
            </div>
        </div>
        <div class='form-group row'>
            <label class='col-md-4 col-form-label' for='progCliente'>Cliente</label>
            <div class='col-md-8'>
                <select id='progCliente' name='progCliente' class='custom-select form-control' required='required'>
                    <option value='rabbit'>Rabbit</option>
                    <option value='duck'>Duck</option>
                    <option value='fish'>Fish</option>
                </select>
            </div>
        </div>
        <div class='form-group row'>
            <div class='col-md-offset-8 col-md-4'>
                <button id='progAddTarea' name='progAddTarea' type='submit' class='btn estilo-btn no-margin no-padding'>
                <span id='btnTextoSpan' class='col-md-6 text-center'>Añadir</span>
                    <img src='./../../images/add/add32.png' class='img-responsive col-md-6'>
                </button>
            </div>
        </div>
    </div>
    <div class='col-md-6'>
        <div class='form-group row'>
            <label for='duracion' class='control-label col-md-12'>DIV 1 Nº tareas y Duración</label>
        </div>
        <div class='form-group row'>
            <div id='carritoTareas' name='carritoTareas' class='col-md-12'>
               <h3>Lista de tareas añadidas</h3>
            </div>
            <div class='col-md-offset-8 col-md-4 form-group'>
                <button id='progTarea' name='progTarea' type='submit' class='btn estilo-btn'>Programar Tarea</button>
            </div>

        </div>
    </div
</form>";
    return $contenido;
}


function menuTareas($tipoGestion){
    $contenido = "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
        <li><a>". strtoupper($tipoGestion) ."</a></li>
        <li><a href='?tarea=ver'>Ver</a></li>
        <li><a href='?tarea=programar'>Programar</a></li>
        <li><a href='?tarea=anadir'>Añadir</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}