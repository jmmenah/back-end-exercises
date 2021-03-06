<?php
/* PHPMailer Guide
 * https://blog.mailtrap.io/phpmailer/
 * test PHP mail functionality, we will use Mailtrap, a fake SMTP server
 *
 * embed an image using CID attachments
 */

// Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/autoload.php';

// create a new PHPMailer object
$mail = new PHPMailer();

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
// You must put the appropriate username and password
$mail->Username = 'xxxxxxxxxxxxxx'; //paste one generated by Mailtrap
$mail->Password = 'yyyyyyyyyyyyyy'; //paste one generated by Mailtrap

$mail->SMTPSecure = 'tls';
$mail->Port = 2525;

// Specify PHPMailer headers
$mail->setFrom('info@mailtrap.io', 'Mailtrap');
$mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
$mail->addAddress('destino@loquesea.com', 'Sr. Destino');

// Set a subject
$mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer + image';

// set the email format to HTML
$mail->isHTML(true);

// To embed an image, attach it and reference in the message body by setting its CID (Content-ID)
// and using a standard HTML tag:
$mail->addEmbeddedImage('images/hello.png', 'hello_cid');
$hello = '<img src="cid:hello_cid">';
$mail->AltBody = 'You need to activate the HTML';

// desired content
$mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
    <p>This is a test email I'm sending using SMTP mail server with PHPMailer.</p>";
$mail->Body = $mailContent . $hello;

// In the end, specify the email sending attributes
if ($mail->send()) {
    echo 'Message has been sent';
} else {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}


