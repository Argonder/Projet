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