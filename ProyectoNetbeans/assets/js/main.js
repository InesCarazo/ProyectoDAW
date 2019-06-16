$(document).ready(function() {

    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
    console.log("hey hhey");
    // mirar si la pantalla es tablet o menor
    //console.log($(document).width());

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
    
});