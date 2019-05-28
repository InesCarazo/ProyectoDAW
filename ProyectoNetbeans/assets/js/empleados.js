  $(document).ready(init);

  function init() {
      console.log("empleados.js");
      $("#addEmpleado").on("click", validarNuevoEmpleado);
  }

  function validarNuevoEmpleado(e) {
      e.preventDefault();
      console.log("validarNuevoEmpleado");
      var todoCorrecto = false;
      var errorMessage = "";
      var addUsuario = $("#addUsuario").val();
      var addContrasena = $("#addContrasena").val();
      var addNombre = $("#addNombre").val();
      var addApellidos = $("#addApellidos").val();
      var addTelefono = $("#addTelefono").val();
      var addCorreo = $("#addCorreo").val();
      var addFnacimiento = $("#addFnacimiento").val();
      var addNss = $("#addNss").val();
      var addAdmin = $('#addAdmin').is(":checked"); //true - false

      if (validarUsuario(addUsuario)) {
          todoCorrecto = true;
      } else {
          todoCorrecto = false;
          errorMessage = +"\nEl campo Usuario no es correcto";
      }
      if (validarContrasena(addContrasena)) {
          todoCorrecto = true;
      } else {
          todoCorrecto = false;
          errorMessage = +"\nEl campo Contraseña no es correcto, al menos tiene que tener 8 dígitos, una letra mayúscula, una letra minúscula, un numero y un caracter expecial";
      }
      if (validarNombre(addNombre)) {
          todoCorrecto = true;
      } else {
          todoCorrecto = false;
          errorMessage = +"\nEl campo nombre no es correcto, no son válidos los números";
      }
      if (validarEmail(addCorreo)) {
          todoCorrecto = true;
      } else {
          todoCorrecto = false;
          errorMessage = +"\nEl formato del correo no es correcto";
      }
      console.log("hey");
      if (todoCorrecto = true) {
          consultaAjax();
      } else {
          console.error(errorMessage);
          var mesaje = $("#menaje_error").val(errorMessage);
      }
  }

  function consultaAjax() {
      var opciones = {
          type: "POST",
          url: "./controller-validation.php",
          data: {
              form: "anadir",
              addUsuario: addUsuario,
              addContrasena: addContrasena,
              addNombre: addNombre,
              addApellidos: addApellidos,
              addTelefono: addTelefono,
              addCorreo: addCorreo,
              addFnacimiento: addFnacimiento,
              addNss: addNss,
              addAdmin: addAdmin
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
      console.log(respuesta.status);
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

  function validarNombre(nombre) {
      var re = /^\w+( +\w+)*$/;
      if (re.test(nombre)) {
          return true;
      } else {
          return false;
      }
  }

  function validarUsuario(usuario) {
      var re = /^.{6,}$/;
      if (re.test(usuario)) {
          return true;
      } else {
          return false;
      }
  }

  function validarApellidos(apellidos) {
      var re = /^\w+( +\w+)*$/;
      if (re.test(apellidos)) {
          return true;
      } else {
          return false;
      }
  }

  function validarContrasena(contrasena) {
      var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      if (re.test(contrasena)) {
          return true;
      } else {
          return false;
      }
  }

  function validarEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (re.test(email)) {
          return true;
      } else {
          return false;
      }
  }

  function validarTelefono(telefono) {
      var re = /^[6,9]{1}[0-9]{8}$/;
      if (re.test(telefono)) {
          return true;
      } else {
          return false;
      }
  }