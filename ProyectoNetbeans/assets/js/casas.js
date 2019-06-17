  $(document).ready(init);

  function init() {
      console.log("casas.js");
      $("#addCasa").on("click", validarNuevaCasa);
      $("#modCasa").on("click", validarModCasa);
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

  function validarNuevaCasa(e) {
      e.preventDefault();
      console.log("validarNuevaCasa");
      var todoCorrecto = true;
      //   var errorMes = "";
      //   console.log(errorMes.length);
      var valAddDireccion = $("#addDireccion");
      var valAddCiudad = $("#addCiudad");
      var valAddHAsForniture = $('#addHasForniture'); //true - false
      var valAddSice = $("#addSice");
      var valAddChooseClient = $("#chooseClient");

      if (valAddDireccion.val().length == 0) {
          todoCorrecto = false;
          generatePopover(
              valAddDireccion,
              'Error',
              'El campo direccion no es correcto.'
          )
      } else {
          toggleErrorClass(valAddDireccion, true);
      }
      if (!validarCiudad(valAddCiudad.val())) {
          todoCorrecto = false;
          generatePopover(
              valAddCiudad,
              'Error',
              'El campo ciudad no es correcto.'
          )
      } else {
          toggleErrorClass(valAddCiudad, true);
      }
      if (!validarTamano(valAddSice.val())) {
          todoCorrecto = false;
          generatePopover(
              valAddSice,
              'Error',
              'El campo tamaño no es correcto.'
          )
      } else {
          toggleErrorClass(valAddSice, true);
      }
      if (todoCorrecto == true) {
          consultaAjaxCasas("anadircasa", valAddDireccion.val(), valAddCiudad.val(), valAddHAsForniture.is(":checked"), valAddSice.val(), valAddChooseClient.val());
      } else {}
  }

  function validarModCasa(e) {
      e.preventDefault();
      console.log("validarNuevaCasa");
      var todoCorrecto = true;
      var valModifyDireccion = $("#modifyDireccion");
      var valModifyCiudad = $("#modifyCiudad");
      var valModifyHAsForniture = $('#modifyHasForniture'); //true - false
      var valModifySice = $("#modifySice");
      var valModifyChooseClient = $("#chooseClient");

      if (valModifyDireccion.val().length == 0) {
          todoCorrecto = false;
          generatePopover(
              valModifyDireccion,
              'Error',
              'El campo direccion no es correcto.'
          )
      } else {
          toggleErrorClass(valModifyDireccion, true);
      }
      if (!validarCiudad(valModifyCiudad.val())) {
          todoCorrecto = false;
          generatePopover(
              valModifyCiudad,
              'Error',
              'El campo ciudad no es correcto.'
          )
      } else {
          toggleErrorClass(valModifyCiudad, true);
      }
      if (!validarTamano(valModifySice.val())) {
          todoCorrecto = false;
          generatePopover(
              valModifySice,
              'Error',
              'El campo tamaño no es correcto.'
          )
      } else {
          toggleErrorClass(valModifySice, true);
      }
      if (todoCorrecto == true) {
          consultaAjaxCasas("modificarcasa", valModifyDireccion.val(), valModifyCiudad.val(), valModifyHAsForniture.is(":checked"), valModifySice.val(), valModifyChooseClient.val());
      } else {

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
      window.location.href = "?casa=ver";
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