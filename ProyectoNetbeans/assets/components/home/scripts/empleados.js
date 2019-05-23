  $(document).ready(init);

  function init() {
      console.log("empleados.js");
      $("#addEmpleado").on("click", validarNuevoEmpleado);
  }

  function validarNuevoEmpleado(e) {
      e.preventDefault();
      console.log("validarNuevoEmpleado");
      var addUsuario = $("#addUsuario").val();
      var addContrasena = $("#addContrasena").val();
      var addNombre = $("#addNombre").val();
      var addApellidos = $("#addApellidos").val();
      var addTelefono = $("#addTelefono").val();
      var addCorreo = $("#addCorreo").val();
      var addFnacimiento = $("#addFnacimiento").val();
      var addNss = $("#addNss").val();
      var addAdmin = $('#addAdmin').is(":checked"); //true - false
      console.log("hey");
      var opciones = {
          type: "POST",
          url: "./controller-empleados-validation.php",
          data: {
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