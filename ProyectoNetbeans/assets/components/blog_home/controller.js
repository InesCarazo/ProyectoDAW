$(document).ready(init);



function init() {
    console.log("dentro");
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
    console.log("hey");
    emailjs.send('gmail', 'template_kn9UMMGx', templateParams)
        .then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
        }, function(error) {
            console.log('FAILED...', error);
        });
}
//https://www.smtpjs.com/


//https://www.emailjs.com/
//chachachachi.limpieza@gmail.com
//chachichacha22