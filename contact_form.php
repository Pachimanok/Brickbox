<?php
// Fetching Values from URL.

$name = $_POST["name1"];
$email = $_POST["email1"];
$message = $_POST["message1"];
$contact = $_POST["contact1"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	if (!preg_match("/^[0-9]{10}$/", $contact)) {
		echo "<span>* Please Fill Valid Contact No. *</span>";
	} else {
		// Send mail by PHP Mail Function.
		$message = "Line 1\r\nLine 2\r\nLine 3";

		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		$message = wordwrap($message, 70, "\r\n");
		if (mail('lauragadea.cme@gmail.com', 'Asunto', $message)){
			echo "prueba enviada";
		} else {
			echo "prueba no enviada";
		}

		// if (mail("lauragadea@gmail.com", $subject, $sendmessage, $headers)){
		// 	echo "Gracias por enviar el mensaje. Pronto nos contactaremos con usted.";
		// } else {
		// 	echo "mail function failed";
		// 	var_dump(debug_backtrace());
		// }
	}
} else {
	echo "<span>* invalid email *</span>";
}
?>
