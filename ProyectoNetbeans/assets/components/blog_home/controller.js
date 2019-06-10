$(document).ready(init);



function init() {
    console.log("controller.js");

    smooth();
    $("#enviar").on("click", formContacto);
}

function formContacto() {
    console.log("heyhey");

    event.preventDefault();
    emailjs.init("user_LWAg91CjwoMDU7dVZq5Qx");

    $("numhid").val(Math.random() * 100000 | 0);
    var numhid = $("numhid").val();
    var nombre = $("#name").val();
    var correo = $("#mail").val();
    var serviciolimpieza = $("#serviciolimpieza option:selected").text();
    var comentario = $("#comentario").val();
    var templateParams = {
        "from_name": nombre.toString(),
        "numhid": numhid.toString(),
        "to_name": "Chacha Chachi management",
        "from_email": correo.toString(),
        "from_servicio": serviciolimpieza.toString(),
        "from_consulta": comentario.toString()
    }

    sendEmail(templateParams);
}

function sendEmail(templateParams) {
    emailjs.send('gmail', 'template_kn9UMMGx', templateParams)
        .then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
        }, function(error) {
            console.log('FAILED...', error);
        });
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