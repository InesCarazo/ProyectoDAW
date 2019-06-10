$(document).ready(function() {

    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });

    // mirar si la pantalla es tablet o menor
    console.log($(document).width());
});