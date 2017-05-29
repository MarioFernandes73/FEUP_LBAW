function newNotification(typeclass,message){
    $(document).ready(function () {
        $(".panel-danger").fadeOut(700).slideUp(700).remove();
        $(".panel-success").fadeOut(700).slideUp(700).remove();

        $("nav").after("<div class='panel " + typeclass + "' style='display:none'><div class='panel-heading'>" + message + "</div></div>");
        $("nav").next().fadeIn(700).slideDown(700);

        if(typeclass == ".panel-danger")
            $(document).scrollTop(0);
    });
};