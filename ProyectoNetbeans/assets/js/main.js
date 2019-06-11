$(document).ready(function() {

    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
    console.log("hey hhey");
    // mirar si la pantalla es tablet o menor
    //console.log($(document).width());
});