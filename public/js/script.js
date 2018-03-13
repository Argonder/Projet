//FORM CONTACT
//formulaire de contact show
$(".form-contact").hide();
$("#email_span").click(function() {
    $(".form-contact").show();
});

//envoi
function ValidateEmail(email) {
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(email);
};
//lorsque l'envoi est validé affiche un message
$(".btn-envoi").click(function() {
    if (!ValidateEmail($("#email").val())) {
       //
        $("#email").css("border-color","red");
    }
    else {
        $(".form-contact").replaceWith("<p>Votre message a été envoyé.</p>");
    }
});
//FIN FORM CONTACT

//ARTICLES
//au click changement class et move dans div
$(".articleMove").click( function() {
    //si l'article est déjà en principale
    if ( $(this).hasClass( "articlePrincipale")){
       $(this).removeClass("articlePrincipale");
       $(".articleblock").append(this);
    } else {
        var bouge = $(".articlePrincipale");
        $(".articleblock").append(bouge);
        bouge.removeClass("articlePrincipale");
        $(this).addClass("articlePrincipale");
        $('.articleP').append(this);
    }
});


//FIN ARTICLES