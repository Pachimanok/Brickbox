<?php
echo 'estas en gmail send php';
//First we have all the configuration to send with SMTP
//SMTP needs accurate times, and the PHP time zone MUST be set
date_default_timezone_set('Etc/UTC');
require './PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Taking away SSL certification
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//Set variables
$first_name = $_POST['name'];
$email_from = $_POST['email'];
$email_contact = $_POST['contact']
$email_category = $_POST['category']
$message = $_POST['message'];

//Assign them to one single variable
$email_message = "Nombre: ".$first_name."<br>";
$email_message .= "Email: ".$email_from."<br>";
$email_message .= "Telefono: ".$email_contact."<br>";
$email_message .= "Categoria: ".$email_category."<br>";
$email_message .= "Mensaje: ".$message;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "lauragadea.cme@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "malulasa";

//Set who the message is to be sent from
$mail->setFrom('brickbox-no-reponder@gmail.com', 'No responder contacto');

//Set an alternative reply-to address
$mail->addReplyTo('brickbox-no-responder@gmail.com', 'No responder contacto');

//Set who the message is to be sent to
$mail->addAddress('lauragadea.cme@gmail.com', 'Brickbox');

//Set the subject line
$mail->Subject = 'Hay un mensaje desde Brickbox!';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("<p><b>Hay un nuevo mensaje desde Brickbox.</b></p>"."\n".$email_message);

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
    echo '0';
} else {
    echo '1';
}

?>
