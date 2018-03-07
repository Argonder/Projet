//FORM CONTACT
//formulaire de contact show
$(".form-contact").hide();
$("#email_span").click(function() {
    $(".form-contact").show();
});
//validator form bootstrap
$('.form-contact').validator();
//show envoi
$(".btn-envoi").click(function() {
    $(".form-contact").hide();
});
