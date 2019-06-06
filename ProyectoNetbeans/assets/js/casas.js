  $(document).ready(init);

  function init() {
      console.log("casas.js");
      $("#addCasa").on("click", validarNuevaCasa);
      $("#modCasa").on("click", validarModCasa);
  }

  function validarNuevaCasa(e) {
      $("#mensaje_error").html("");
      e.preventDefault();
      console.log("validarNuevaCasa");
      var todoCorrecto = true;
      var errorMes = "";
      console.log(errorMes.length);
      var valAddDireccion = $("#addDireccion").val();
      var valAddCiudad = $("#addCiudad").val();
      var valAddHAsForniture = $('#addHasForniture').is(":checked"); //true - false
      var valAddSice = $("#addSice").val();
      var valAddChooseClient = $("#chooseClient").val();

      if (valAddDireccion.length == 0) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>direccion</b> no es correcto.</li>";
      }
      if (!validarCiudad(valAddCiudad)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>ciudad</b> no es correcto.</li>";
      }
      if (!validarTamano(valAddSice)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>tamaño</b> no es correcto.</li>";
      }
      if (todoCorrecto == true) {
          console.log("hey");
          console.log(errorMes);
          consultaAjaxCasas("anadircasa", valAddDireccion, valAddCiudad, valAddHAsForniture, valAddSice, valAddChooseClient);
      } else {
          console.log("hey hey");
          console.log(errorMes);
          $("#mensaje_error").html(errorMes);
      }
  }

  function validarModCasa(e) {
      $("#mensaje_error").html("");
      e.preventDefault();
      console.log("validarNuevaCasa");
      var todoCorrecto = true;
      var errorMes = "";
      console.log(errorMes.length);
      var valModifyDireccion = $("#modifyDireccion").val();
      var valModifyCiudad = $("#modifyCiudad").val();
      var valModifyHAsForniture = $('#modifyHasForniture').is(":checked"); //true - false
      var valModifySice = $("#modifySice").val();
      var valModifyChooseClient = $("#chooseClient").val();

      if (valModifyDireccion.length == 0) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>direccion</b> no es correcto.</li>";
      }
      if (!validarCiudad(valModifyCiudad)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>ciudad</b> no es correcto.</li>";
      }
      if (!validarTamano(valModifySice)) {
          todoCorrecto = false;
          errorMes += "<li style='color:red;'>El campo <b>tamaño</b> no es correcto.</li>";
      }
      if (todoCorrecto == true) {
          console.log("hey");
          console.log(errorMes);
          consultaAjaxCasas("modificarcasa", valModifyDireccion, valModifyCiudad, valModifyHAsForniture, valModifySice, valModifyChooseClient);
      } else {
          console.log("hey hey");
          console.log(errorMes);
          $("#mensaje_error").html(errorMes);
      }
  }

  function consultaAjaxCasas(tipoForm, direccion, ciudad, hasForniture, sice, chooseClient) {
      var opciones = {
          type: "POST",
          url: "./../home/controller-validation.php",
          data: {
              form: tipoForm,
              direccion: direccion,
              ciudad: ciudad,
              hasForniture: hasForniture,
              sice: sice,
              chooseClient: chooseClient
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
      //window.location.href = "?casa=ver";
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

  function validarTamano(nombre) { //Ok
      var re = /^[0-9]+$/;
      if (re.test(nombre)) {
          return true;
      } else {
          return false;
      }
  }

  function validarCiudad(ciudad) { //Ok
      var re = /^[A-Za-z]+( +[A-Za-z]+)*$/;
      if (re.test(ciudad)) {
          return true;
      } else {
          return false;
      }
  }