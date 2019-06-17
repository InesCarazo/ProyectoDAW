  $(document).ready(init);

  function init() {
      console.log("empleados.js");
      $("#addEmpleado").on("click", validarNuevoEmpleado);
      $("#modEmpleado").on("click", validarModEmpleado);
  }


  function toggleErrorClass(el, remove = false) {
      var errorClass = 'has-error';

      el = el.closest('.form-group');
      console.log(el)
      if (el.length) {
          if (remove === false) {
              el.addClass(errorClass);
          } else {
              el.removeClass(errorClass);
          }
      }
  }

  function generatePopover(el, title, content) {
      // segundos para cerrar el popover
      var secons_to_hide = 2;

      // crear y abrir el popover de error al validar
      var pop = el.popover({
          title: title || 'mi titulo',
          content: content || 'El campo <b>usuario</b> no es correcto.',
          html: true,
          placement: 'auto',
          delay: { "show": 500, "hide": 100 },
          trigger: 'auto'
      }).popover('show');

      // cerrar automatico
      setTimeout(function() {
          pop.popover('destroy');
      }, secons_to_hide * 1000);

      // poner la clase de error al grupo del formulario
      toggleErrorClass(el);
  }

  function validarNuevoEmpleado(e) {
      e.preventDefault();
      console.log("validarNuevoEmpleado");
      var todoCorrecto = true;
      var valAddUsuario = $("#addUsuario");
      var valAddContrasena = $("#addContrasena");
      var valAddNombre = $("#addNombre");
      var valAddApellidos = $("#addApellidos");
      var valAddDni = $("#addDni");
      var valAddTelefono = $("#addTelefono");
      var valAddCorreo = $("#addCorreo");
      var valAddFnacimiento = $("#addFnacimiento");
      var valAddNss = $("#addNss");
      var valAddAdmin = $('#addAdmin'); //true - false

      if (!validarUsuario(valAddUsuario.val())) {
          todoCorrecto = false;
          generatePopover(
              valAddUsuario,
              'Error',
              'El campo usuario no es correcto.'
          )
      } else {
          toggleErrorClass(valAddUsuario, true);
      }
      if (!validarContrasena(valAddContrasena.val())) {
          todoCorrecto = false;
          generatePopover(
              valAddContrasena,
              'Error',
              'El campo contraseña no es correcto, al menos tiene que tener 8 dígitos, una letra mayúscula, una letra minúscula, un numero y un caracter especial @$!%*?&.'
          )
      } else {
          toggleErrorClass(valAddContrasena, true);
      }
      if (!validarNombre(valAddNombre.val())) {
          todoCorrecto = false;
          generatePopover(
              valAddNombre,
              'Error',
              'El campo nombre no es correcto.'
          )
      } else {
          toggleErrorClass(valAddNombre, true);
      }
      if (!validarApellidos(valAddApellidos.val())) {
          todoCorrecto = false;
          generatePopover(
              valAddApellidos,
              'Error',
              'El campo apellidos no es correcto.'
          )
      } else {
          toggleErrorClass(valAddApellidos, true);
      }
      if (!validarDni(valAddDni.val())) {
          todoCorrecto = false;
          generatePopover(
              valAddDni,
              'Error',
              'El campo dni no es correcto.'
          )
      } else {
          toggleErrorClass(valAddDni, true);
      }
      if (!validarTelefono(valAddTelefono.val())) {
          todoCorrecto = false;
          generatePopover(
              valAddTelefono,
              'Error',
              'El campo telefono no es correcto.'
          )
      } else {
          toggleErrorClass(valAddTelefono, true);
      }
      if (!validarEmail(valAddCorreo.val())) {
          todoCorrecto = false;
          generatePopover(
              valAddCorreo,
              'Error',
              'El campo correo no es correcto.'
          )
      } else {
          toggleErrorClass(valAddCorreo, true);
      }
      if (todoCorrecto == true) {
          consultaAjaxEmpl("anadir", valAddUsuario.val(), valAddContrasena.val(), valAddNombre.val(), valAddApellidos.val(), valAddDni.val(), valAddTelefono.val(), valAddCorreo.val(), valAddFnacimiento.val(), valAddNss.val(), valAddAdmin.is(":checked"));
      } else {}
  }

  function validarModEmpleado(e) {
      e.preventDefault();
      console.log("validarModEmpleado");
      var todoCorrecto = true;
      var valModifyUsuario = $("#modifyUsuario");
      var valModifyContrasena = $("#modifyContrasena");
      var valModifyNombre = $("#modifyNombre");
      var valModifyApellidos = $("#modifyApellidos");
      var valModifyDni = $("#modifyDni");
      var valModifyTelefono = $("#modifyTelefono");
      var valModifyCorreo = $("#modifyCorreo");
      var valModifyFnacimiento = $("#modifyFnacimiento");
      var valModifyNss = $("#modifyNss");
      var valModifyAdmin = $('#modifyAdmin'); //true - false
      if (!validarUsuario(valModifyUsuario.val())) {
          todoCorrecto = false;
          generatePopover(
              valModifyUsuario,
              'Error',
              'El campo usuario no es correcto.'
          )
      } else {
          toggleErrorClass(valModifyUsuario, true);
      }
      if (!validarContrasena(valModifyContrasena.val())) {
          todoCorrecto = false;
          generatePopover(
              valModifyContrasena,
              'Error',
              'El campo contraseña no es correcto, al menos tiene que tener 8 dígitos, una letra mayúscula, una letra minúscula, un numero y un caracter especial @$!%*?&.'
          )
      } else {
          toggleErrorClass(valModifyContrasena, true);
      }
      if (!validarNombre(valModifyNombre.val())) {
          todoCorrecto = false;
          generatePopover(
              valModifyNombre,
              'Error',
              'El campo usuario no es correcto.'
          )
      } else {
          toggleErrorClass(valModifyNombre, true);
      }
      if (!validarApellidos(valModifyApellidos.val())) {
          todoCorrecto = false;
          generatePopover(
              valModifyApellidos,
              'Error',
              'El campo apellidos no es correcto.'
          )
      } else {
          toggleErrorClass(valModifyApellidos, true);
      }
      if (!validarDni(valModifyDni.val())) {
          todoCorrecto = false;
          generatePopover(
              valModifyDni,
              'Error',
              'El campo apellidos no es correcto.'
          )
      } else {
          toggleErrorClass(valModifyDni, true);
      }
      if (!validarTelefono(valModifyTelefono.val())) {
          todoCorrecto = false;
          generatePopover(
              valModifyTelefono,
              'Error',
              'El campo telefono no es correcto.'
          )
      } else {
          toggleErrorClass(valModifyTelefono, true);
      }
      if (!validarEmail(valModifyCorreo.val())) {
          todoCorrecto = false;
          generatePopover(
              valModifyCorreo,
              'Error',
              'El campo correo no es correcto.'
          )
      } else {
          toggleErrorClass(valModifyCorreo, true);
      }

      if (todoCorrecto == true) {
          console.log("hey");
          console.log(errorMes);
          consultaAjaxEmpl("modificar", valModifyUsuario.val(), valModifyContrasena.val(), valModifyNombre.val(), valModifyApellidos.val(), valModifyDni.val(), valModifyTelefono.val(), valModifyCorreo.val(), valModifyFnacimiento.val(), valModifyNss.val(), valModifyAdmin.is(":checked"));
      } else {
          console.log("hey hey");
          console.log(errorMes);
          $("#mensaje_error").html(errorMes);
      }
  }

  function consultaAjaxEmpl(tipoForm, valUsuario, valContrasena, valNombre, valApellidos, valDni, valTelefono, valCorreo, valFnacimiento, valNss, valAdmin) {
      var opciones = {
          type: "POST",
          url: "./../home/controller-validation.php",
          data: {
              form: tipoForm,
              usuario: valUsuario,
              contrasena: valContrasena,
              nombre: valNombre,
              apellidos: valApellidos,
              dni: valDni,
              telefono: valTelefono,
              correo: valCorreo,
              fnacimiento: valFnacimiento,
              nss: valNss,
              admin: valAdmin
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
      //window.location.href = "?empleado=ver";
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

  function validarNombre(nombre) { //Ok
      var re = /^[A-Za-z]+( +[A-Za-z]+)*$/;
      if (re.test(nombre)) {
          return true;
      } else {
          return false;
      }
  }

  function validarUsuario(usuario) { //Ok
      var re = /^[a-zA-Z]+[0-9]?/;
      if (re.test(usuario)) {
          return true;
      } else {
          return false;
      }
  }

  function validarDni(dni) {
      var numero;
      var letr;
      var letra;
      var expReg = /^\d{8}[A-Z]$/;

      if (expReg.test(dni) === true) {
          console.log("BUEN FORMATO");
          numero = dni.substr(0, dni.length - 1);
          letr = dni.substr(dni.length - 1, 1);
          numero = numero % 23;
          letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
          letra = letra.substring(numero, numero + 1);

          if (letra !== letr.toUpperCase()) {
              return false;
          } else {
              console.error("BUENA LETRA");
              return true;

          }
      } else {
          return false;
      }
  }

  function validarApellidos(apellidos) { //Ok
      var re = /^[A-Za-z]+( +[A-Za-z]+)*$/;
      if (re.test(apellidos)) {
          return true;
      } else {
          return false;
      }
  }

  function validarContrasena(contrasena) { //Ok
      var re = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      if (re.test(contrasena)) {
          return true;
      } else {
          return false;
      }
  }

  function validarEmail(email) { //Ok
      var re = /^[\w][-._\w]+@[a-z]+\.[a-z]{2,3}$/;
      if (re.test(email)) {
          return true;
      } else {
          return false;
      }
  }

  function validarTelefono(telefono) { //Ok
      var re = /^[6,9]{1}[0-9]{8}$/;
      if (re.test(telefono)) {
          return true;
      } else {
          return false;
      }
  }