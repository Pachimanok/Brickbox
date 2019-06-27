$(document).ready(function() {
$("#submit").click(function() {
var name = $("#name").val();
var email = $("#email").val();
var message = $("#message").val();
var contact = $("#contact").val();
$("#returnmessage").empty(); // To empty previous error/success message.
// Checking for blank fields.
if (name == '' || email == '' || contact == '') {
alert("Por favor complete los campos requeridos");
} else {

alert("Gracias por enviar el mensaje, pronto nos contactaremos con usted")
$("#form")[0].reset(); // To reset form fields on success.

}
});
});