<?php
//esconder erros e warnings do php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
include "create_termo_pdf.php";
//starter another place
//session_start();

function sendEmailPart(){

	//require_once __DIR__ . '\\vendor\\phpmailer\\phpmailer\\src\\Exception.php';
	//require_once __DIR__ . '\\vendor\\phpmailer\\phpmailer\\src\\PHPMailer.php';
	//require_once __DIR__ . '\\vendor\\phpmailer\\phpmailer\\src\\SMTP.php';

	require_once __DIR__ ."/vendor/autoload.php";

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	//use PHPMailer\PHPMailer\PHPMailer;
	//use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	//require '/vendor/autoload.php';

	$mail = new PHPMailer\PHPMailer\PHPMailer(true);                              // Passing `true` enables exceptions
	try {
		//Server settings
		$mail->SMTPDebug = 0;                                 // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->SMTPSecure = "tls";
		$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->Port = 587;                                    // TCP port to connect to
		$mail->Username = 'projetosofiafalacoleta@gmail.com';                          // SMTP username
		$mail->Password = '#S0f!@F@l@k013t@#';                       // SMTP password
//		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted

		//Recipients
		$mail->setFrom('projetosofiafalacoleta@gmail.com', 'Projeto Sofia Fala - Coleta');
		$mail->addAddress($_SESSION['email'], 'Doacao de voz para o Projeto Sofia Fala - Coleta');     // Add a recipient
    $mail->addAddress('projetosofiafalacoleta@gmail.com');

		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments, se for salvar cadastro, envie o termo em pdf
		if(strcmp($_SESSION['tipo_email'],'Sv')==0){
			create_termo();
			$mail->addAttachment(__DIR__.'/termos_saves/termo-'.$_SESSION['id'].'.pdf','termo_aceite.pdf');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		}


		//Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $_SESSION["email_subj"];
		$mail->Body    = $_SESSION["email_body"];
		$mail->AltBody = $_SESSION["email_abody"];

		$mail->send();
		//echo 'Message has been sent';

		//encerrar sessão
		session_destroy();
	} catch (Exception $e) {
		//encerrar sessão
		session_destroy();
		//echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
}
?>
