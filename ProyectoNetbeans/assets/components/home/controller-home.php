<?php

function datosCli($id){
    $contenido = "<h1 class='text-center chachi'>TAREAS PROGRAMADAS</h1>";
    $model = new modelClass();
    $datosCli = $model->homeDatosCliente(3); 
    //  print_r($datosCli);
    foreach ($datosCli as $value) {
       $contenido.= "<div class='datos col-md-6 col-sm-6 col-xs-12'><ul>";
    foreach ($value as $value2) {
        // print_r($value2);
        
        $contenido.= "<li><h2>Tarea: " . $value2["texto"] . "</h2></li>";
        $contenido.= "<li><h2>Fecha: " . date("d-m-Y", strtotime($value2["fecha"])) . "</h2></li>";
        $contenido.= "<li><h2>Duración tarea:" . $value2["duracion_h"] . "</h2></li>";
    }
    $contenido.= "</ul></div>";
}
    
    return $contenido;
}

function menuHomeCliente($userNames){
    $contenido = "<div class='col-md-12 collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav navbar-right'>
    <li><a>". strtoupper($userNames) ."</a></li>
    </ul>
</div>
</div>
</nav>";
    return $contenido;
}