  $(document).ready(init);

  function init() {
      console.log("empleados.js");
      $("#addEmpleado").on("click", validarNuevoEmpleado);
  }

  function validarNuevoEmpleado(e) {
      e.preventDefault();
      console.log("validarNuevoEmpleado");
      var todoCorrecto = true;
      var errorMes = "";
      console.log(errorMes.length);
      var valAddUsuario = $("#addUsuario").val();
      console.log("Antonio: " + valAddUsuario);
      var valaddContrasena = $("#addContrasena").val();
      var valaddNombre = $("#addNombre").val();
      var valaddApellidos = $("#addApellidos").val();
      var valaddTelefono = $("#addTelefono").val();
      var valaddCorreo = $("#addCorreo").val();
      var valaddFnacimiento = $("#addFnacimiento").val();
      var valaddNss = $("#addNss").val();
      var valaddAdmin = $('#addAdmin').is(":checked"); //true - false

      if (!validarUsuario(valAddUsuario)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>usuario</b> no es correcto.</li>";
      }
      if (!validarContrasena(valaddContrasena)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>contraseña</b> no es correcto, al menos tiene que tener 8 dígitos, una letra mayúscula, una letra minúscula, un numero y un caracter especial @$!%*?&.</li>";
      }
      if (!validarNombre(valaddNombre)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>nombre</b> no es correcto.</li>";
      }
      if (!validarApellidos(valaddApellidos)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>apellidos</b> no es correcto.</li>";
      }
      if (!validarTelefono(valaddTelefono)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>telefono</b> no es correcto, empiece por 6 o 9.</li>";
      }
      if (!validarEmail(valaddCorreo)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>correo</b> no es correcto.</li>";
      }

      if (todoCorrecto == true) {
          console.log("hey");
          console.log(errorMes);
          consultaAjax(valAddUsuario, valaddContrasena, valaddNombre, valaddApellidos, valaddTelefono, valaddCorreo, valaddFnacimiento, valaddNss, valaddAdmin);
      } else {
          console.log("hey hey");
          console.log(errorMes);
          $("#mensaje_error").html(errorMes);
      }
  }

  function consultaAjax(valAddUsuario, valaddContrasena, valaddNombre, valaddApellidos, valaddTelefono, valaddCorreo, valaddFnacimiento, valaddNss, valaddAdmin) {
      var opciones = {
          type: "POST",
          url: "./controller-validation.php",
          data: {
              form: "anadir",
              usuario: valAddUsuario,
              contrasena: valaddContrasena,
              nombre: valaddNombre,
              apellidos: valaddApellidos,
              telefono: valaddTelefono,
              correo: valaddCorreo,
              fnacimiento: valaddFnacimiento,
              nss: valaddNss,
              admin: valaddAdmin
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
      var re = /^.{6,}$/;
      if (re.test(usuario)) {
          return true;
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
      var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      if (re.test(contrasena)) {
          return true;
      } else {
          return false;
      }
  }

  function validarEmail(email) {
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