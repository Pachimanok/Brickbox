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
// Returns successful data submission message when the entered information is stored in database.
$.post("contact_form.php", {
name1: name,
email1: email,
message1: message,
contact1: contact
}, function(data) {
	alert("inside post function in js");
$("#returnmessage").append(data); // Append returned message to message paragraph.
if (data == "Gracias por enviar el mensaje. Pronto nos contactaremos con usted.") {
$("#form")[0].reset(); // To reset form fields on success.
}
});
}
});
});