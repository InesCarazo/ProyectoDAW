
var nombre = $("#name").val();
var correo = $("#mail").val();
var comentario = $("#comentario").val();
var serviciolimpieza = $("#serviciolimpieza").val()
var templateParams = 
{
    name: nombre,
    correo: correo,
    servicio:serviciolimpieza,
    comentario:comentario
};
 
emailjs.send('gmail', 'template_kn9UMMGx', templateParams)
    .then(function(response) {
       console.log('SUCCESS!', response.status, response.text);
    }, function(error) {
       console.log('FAILED...', error);
    });

//https://www.smtpjs.com/



//https://www.emailjs.com/
//chachachachi.limpieza@gmail.com

//chachichacha22