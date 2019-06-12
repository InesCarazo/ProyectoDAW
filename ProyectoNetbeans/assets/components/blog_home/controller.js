$(document).ready(init);



function init() {
    console.log("controller.js");

    smooth();
    $("#enviar").on("click", formContacto);
}

function formContacto(e) {
    console.log("heyhey");
    $("#mensaje_error").html("");
    e.preventDefault();
    var todoCorrecto = true;
    var errorMes = "";
    event.preventDefault();


    $("numhid").val(Math.random() * 100000 | 0);
    var numhid = $("numhid").val();
    var nombre = $("#name").val();
    var correo = $("#mail").val();
    var serviciolimpieza = $("#serviciolimpieza option:selected").text();
    var comentario = $("#comentario").val();


    if (!validarNombre(nombre)) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>nombre</b> no es correcto.</li>";
    }
    if (!validarEmail(correo)) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>correo</b> no es correcto.</li>";
    }
    if (comentario.length = 0) {
        todoCorrecto = false;
        errorMes += "<li style='color:red;'>El campo <b>correo</b> no es correcto.</li>";
    }

    if (todoCorrecto == true) {
        console.log("hey");
        emailjs.init("user_LWAg91CjwoMDU7dVZq5Qx");
        var templateParams = {
            "from_name": nombre.toString(),
            "numhid": numhid.toString(),
            "to_name": "Chacha Chachi management",
            "from_email": correo.toString(),
            "from_servicio": serviciolimpieza.toString(),
            "from_consulta": comentario.toString()
        }

        emailjs.send('gmail', 'template_kn9UMMGx', templateParams)
            .then(function(response) {
                console.log('SUCCESS!', response.status, response.text);
            }, function(error) {
                console.log('FAILED...', error);
            });
    } else {
        console.log("hey hey");
        console.log(errorMes);
        $("#mensaje_error").html(errorMes);
    }

}

function sendEmail(templateParams) {


}

//https://www.emailjs.com/
//chachachachi.limpieza@gmail.com
//chachichacha22

function smooth() {
    // seleccionar todos los enlaces con ruta del menu principal sin el login
    $('ul.nav.navbar-nav:not(.navbar-right) a:not(.dropdown-toggle)').each(function(index, enlace) {

        // aniadir el evento de click
        enlace.addEventListener('click', function(evento) {
            evento.preventDefault();

            // obtener el atributo de href que hace referencia al bloque sin '#'
            const seccion_id = $(enlace).attr('href').substring(1);
            // obtener el elemento del DOM
            const element = document.getElementById(seccion_id);

            // revisar que el elemento exista
            if (element) {
                // ejecutar la accion de desplazarse hacia el elemento del menu
                element.scrollIntoView({
                    block: "start",
                    behavior: "smooth"
                });
            }
        });
    });
}

function validarEmail(email) { //Ok
    var re = /^[\w][-._\w]+@[a-z]+\.[a-z]{2,3}$/;
    if (re.test(email)) {
        return true;
    } else {
        return false;
    }
}

function validarNombre(nombre) { //Ok
    var re = /^[A-Za-z]+( +[A-Za-z]+)*$/;
    if (re.test(nombre)) {
        return true;
    } else {
        return false;
    }
}