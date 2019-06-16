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
    //   $("#mensaje_error").html("");
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

      if (valAddDireccion.length == 0) {
          todoCorrecto = false;
        //   errorMes += "<li style='color:red;'>El campo <b>direccion</b> no es correcto.</li>";
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
        //   errorMes += "<li style='color:red;'>El campo <b>ciudad</b> no es correcto.</li>";
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
        //   errorMes += "<li style='color:red;'>El campo <b>tamaño</b> no es correcto.</li>";
          generatePopover(
            valAddSice,
            'Error',
            'El campo tamaño no es correcto.'
        )
    } else {
        toggleErrorClass(valAddSice, true);
    }
      if (todoCorrecto == true) {
        //   console.log("hey");
        //   console.log(errorMes);
          consultaAjaxCasas("anadircasa", valAddDireccion.val(), valAddCiudad.val(), valAddHAsForniture.is(":checked"), valAddSice.val(), valAddChooseClient.val());
      } else {
        //   console.log("hey hey");
        //   console.log(errorMes);
        //   $("#mensaje_error").html(errorMes);
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