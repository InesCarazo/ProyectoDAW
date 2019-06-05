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
          consultaAjax("anadircasa", valAddDireccion, valAddCiudad, valAddHAsForniture, valAddSice, valAddChooseClient);
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
          consultaAjax("modificarcasa", valModifyDireccion, valModifyCiudad, valModifyHAsForniture, valModifySice, valModifyChooseClient);
      } else {
          console.log("hey hey");
          console.log(errorMes);
          $("#mensaje_error").html(errorMes);
      }
  }

  function consultaAjax(tipoForm, direccion, ciudad, hasForniture, sice, chooseClient) {
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

  function validarCiudad(ciudad) { //Ok
      var re = /^[A-Za-z]+( +[A-Za-z]+)*$/;
      if (re.test(ciudad)) {
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