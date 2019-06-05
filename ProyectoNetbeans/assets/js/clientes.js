  $(document).ready(init);

  function init() {
      console.log("clientes.js");
      $("#addCliente").on("click", validarNuevoCliente);
      $("#modCliente").on("click", validarModCliente);
  }

  function validarNuevoCliente(e) {
      $("#mensaje_error").html("");
      e.preventDefault();
      console.log("validarNuevoCliente");
      var todoCorrecto = true;
      var errorMes = "";
      var valAddUsuario = $("#addUsuario").val();
      var valAddContrasena = $("#addPwd").val();
      var valAddNombre = $("#addNombre").val();
      var valAddApellidos = $("#addApellidos").val();
      var valAddDni = $("#addDni").val();
      var valAddTelefono = $("#addTelefono").val();
      var valAddCorreo = $("#addCorreo").val();
      var valAddFnacimiento = $("#addFnacimiento").val();

      if (!validarUsuario(valAddUsuario)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>usuario</b> no es correcto.</li>";
      }
      if (!validarContrasena(valAddContrasena)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>contraseña</b> no es correcto, al menos tiene que tener 8 dígitos, una letra mayúscula, una letra minúscula, un numero y un caracter especial @$!%*?&.</li>";
      }
      if (!validarNombre(valAddNombre)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>nombre</b> no es correcto.</li>";
      }
      if (!validarApellidos(valAddApellidos)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>apellidos</b> no es correcto.</li>";
      }
      if (!validarDni(valAddDni)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>dni</b> no es correcto.</li>";
      }
      if (!validarTelefono(valAddTelefono)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>telefono</b> no es correcto, empiece por 6 o 9.</li>";
      }
      if (!validarEmail(valAddCorreo)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>correo</b> no es correcto.</li>";
      }

      if (todoCorrecto == true) {
          console.log("hey");
          console.log(errorMes);
          consultaAjax("anadircli", "./../sign_in/controller.php", valAddUsuario, valAddContrasena, valAddNombre, valAddApellidos, valAddDni, valAddTelefono, valAddCorreo, valAddFnacimiento, "", "");
      } else {
          console.log("hey hey");
          console.log(errorMes);
          $("#mensaje_error").html(errorMes);
      }
  }

  function validarModCliente(e) {
      $("#mensaje_error").html("");
      e.preventDefault();
      console.log("validarModCliente");
      var todoCorrecto = true;
      var errorMes = "";
      console.log(errorMes.length);
      var valModifyUsuario = $("#modifyUsuario").val();
      var valModifyContrasena = $("#modifyContrasena").val();
      var valModifyNombre = $("#modifyNombre").val();
      var valModifyApellidos = $("#modifyApellidos").val();
      var valModifyDni = $("#modifyDni").val();
      var valModifyTelefono = $("#modifyTelefono").val();
      var valModifyCorreo = $("#modifyCorreo").val();
      var valModifyFnacimiento = $("#modifyFnacimiento").val();
      var valModifyPago = $("#modifyPago").val();
      var valModifyNCuenta = $('#modifyNCuenta').val();
      if (!validarUsuario(valModifyUsuario)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>usuario</b> no es correcto.</li>";
      }
      if (!validarContrasena(valModifyContrasena)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>contraseña</b> no es correcto, al menos tiene que tener 8 dígitos, una letra mayúscula, una letra minúscula, un numero y un caracter especial @$!%*?&.</li>";
      }
      if (!validarNombre(valModifyNombre)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>nombre</b> no es correcto.</li>";
      }
      if (!validarApellidos(valModifyApellidos)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>apellidos</b> no es correcto.</li>";
      }
      if (!validarDni(valModifyDni)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>dni</b> no es correcto.</li>";
      }
      if (!validarTelefono(valModifyTelefono)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>telefono</b> no es correcto, empiece por 6 o 9.</li>";
      }
      if (!validarEmail(valModifyCorreo)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>correo</b> no es correcto.</li>";
      }

      if (todoCorrecto == true) {
          consultaAjax("modificarcli", "./../home/controller-validation.php", valModifyUsuario, valModifyContrasena, valModifyNombre, valModifyApellidos, valModifyDni, valModifyTelefono, valModifyCorreo, valModifyFnacimiento, valModifyPago, valModifyNCuenta);
      } else {
          console.log(errorMes);
          $("#mensaje_error").html(errorMes);
      }
  }

  function consultaAjax(tipoForm, url, valUsuario, valContrasena, valNombre, valApellidos, valDni, valTelefono, valCorreo, valFnacimiento, valPago, valNCuenta) {
      var opciones = {
          type: "POST",
          url: url,
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
              pago: valPago,
              ncuenta: valNCuenta

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
      console.log("hey hey");
      console.log(respuesta);
      //window.location.href = "../login/view.php";
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