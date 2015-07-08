<?php>
require_once('<?php echo Yii::app()->request->baseUrl; ?>/extensions/PHPMailer-master/class.phpmailer.php');

$mail = new PHPMailer();
//indico a la clase que use SMTP
$mail­>IsSMTP();
//permite modo debug para ver mensajes de las cosas que van ocurriendo
$mail­>SMTPDebug = 2;
//Debo de hacer autenticación SMTP
$mail­>SMTPAuth = true;
$mail­>SMTPSecure = "ssl";
//indico el servidor de Gmail para SMTP
$mail­>Host = "smtp.gmail.com";
//indico el puerto que usa Gmail
$mail­>Port = 465;
//indico un usuario / clave de un usuario de gmail
$mail­>Username = "veronin2912@gmail.com";
$mail­>Password = "alberti647";
$mail­>SetFrom('veronin2912@gmail.com', 'Veronica Nin');
$mail­>AddReplyTo("veronin2912@gmail.com","Veronica Nin");
$mail­>Subject = "IMV - Recordatorio de Pago";
$mail­>MsgHTML("Le recordamos que el vencimiento de su CUOTA MENSUAL es el dia 10 del corriente. Muchas gracias.");
//indico destinatario
$address = "veronica_nin@yahoo.com.ar";
$mail­>AddAddress($address, "Vero");

if(!$mail­>Send()) {
echo "Error al enviar: " . $mail­>ErrorInfo;
} else {
echo "Mensaje enviado!";
} 