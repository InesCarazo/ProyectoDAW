$(document).ready(init);

function init() {
    console.log("tareas.js");
    $("#addTarea").on("click", validarNuevaTarea);
    $("#modTarea").on("click", validarModTarea);
}

function validarNuevaTarea(e) {
    $("#mensaje_error").html("");
    e.preventDefault();
    console.log("validarNuevaTarea");
    var todoCorrecto = true;
    var errorMes = "";
    console.log(errorMes.length);
    var valAddNombre = $("#addTexto").val();
    var valAddDuracion = $("#addDuracion").val();
    var valAddPrecio = $("#addPrecio").val();
    var valAddComentario = $("#addComentarios").val();

    if (!validarTexto(valAddNombre)) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>nombre</b> no es correcto.</li>";
    }
    if (!validarNumeros(valAddDuracion)) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>duración</b> no es correcto.</li>";
    }
    if (!validarNumeros(valAddPrecio)) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>precio</b> no es correcto.</li>";
    }
    if (!validarTexto(valAddComentario)) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>comentario</b> no es correcto.</li>";
    }
    if (todoCorrecto == true) {
        console.log("hey");
        console.log(errorMes);
        consultaAjaxTareas("anadirtarea", valAddNombre, valAddDuracion, valAddPrecio, valAddComentario);
    } else {
        console.log("hey hey");
        console.log(errorMes);
        $("#mensaje_error").html(errorMes);
    }
}

function validarModTarea(e) {
    $("#mensaje_error").html("");
    e.preventDefault();
    console.log("validarNuevaTarea");
    var todoCorrecto = true;
    var errorMes = "";
    console.log(errorMes.length);
    var valModifyNombre = $("#chooseTarea").text();
    var valModifyDuracion = $("#modifyDuracion").val();
    var valModifyPrecio = $("#modifyPrecio").val();
    var valModifyComentario = $("#modifyComentarios").val();

    if (!validarTexto(valModifyNombre)) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>nombre</b> no es correcto.</li>";
    }
    if (!validarNumeros(valModifyDuracion)) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>duración</b> no es correcto.</li>";
    }
    if (!validarNumeros(valModifyPrecio)) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>precio</b> no es correcto.</li>";
    }
    if (!validarTexto(valModifyComentario)) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>comentario</b> no es correcto.</li>";
    }
    if (todoCorrecto == true) {
        console.log("hey");
        console.log(errorMes);
        consultaAjaxTareas("modificartarea", valAddNombre, valAddDuracion, valAddPrecio, valModifyComentario);
    } else {
        console.log("hey hey");
        console.log(errorMes);
        $("#mensaje_error").html(errorMes);
    }
}

function consultaAjaxTareas(valTipoForm, valNombre, valDuracion, valPrecio, valComentario) {
    var opciones = {
        type: "POST",
        url: "./../home/controller-validation.php",
        data: {
            form: valTipoForm,
            nombre: valNombre,
            duracion: valDuracion,
            precio: valPrecio,
            comentario: valComentario
        }
    };
    console.log(opciones);
    $.ajax(opciones).done(consultaFinalizada)
        .fail(consultaFallida)
        .always(consultaSiempre);
}

/*
 * Nombre: consultaFinalizada
 * Entrada: respuesta
 * Descripción: Método que recoge el evento
 *              y manda los datos a un php.
 */
function consultaFinalizada(respuesta) {
    console.log(respuesta);
    //window.location.href = "?tarea=ver";
}

/*
 * Nombre: consultaFallida
 * Entrada: xhr, status, errorThrown
 * Descripción: Método que recoge los
 *              errores de las consultas.
 */
function consultaFallida(xhr, status, errorThrown) {
    console.log(errorThrown);
    console.log(status);
}

/*
 * Nombre: consultaSiempre
 * Entrada: xhr, status
 * Descripción: Método que se ejecuta
 *              siempre.
 */
function consultaSiempre(xhr, status) {
    console.log("Consulta finalizada");
}

function validarNumeros(nombre) { //Ok
    var re = /^[0-9]+$/;
    if (re.test(nombre)) {
        return true;
    } else {
        return false;
    }
}

function validarTexto(nombre) { //Ok
    var re = /^[A-Za-z]+( +[A-Za-z]+)*$/;
    if (re.test(nombre)) {
        return true;
    } else {
        return false;
    }
}