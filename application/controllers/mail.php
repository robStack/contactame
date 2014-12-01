<?php
	class Mail extends Controller{

		public function index(){
			require '../vendor/phpmailer/PHPMailerAutoload.php';
 
			$mail = new PHPMailer;
			 
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'megas.roberto@gmail.com';                   // SMTP username
			$mail->Password = 'BersekHellsing#89';               // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
			$mail->Port = 467;                                    //Set the SMTP port number - 587 for authenticated TLS
			$mail->setFrom('amit@gmail.com', 'Amit Agarwal');     //Set who the message is to be sent from
			$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
			$mail->addAddress('megas.roberto@gmail.com', 'Josh Adams');  // Add a recipient
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			$mail->isHTML(true);                                  // Set email format to HTML
			 
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			 
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML('<h1>Mensaje</h1>');
			 
			if(!$mail->send()) {
			   echo 'Message could not be sent.';
			   echo 'Mailer Error: ' . $mail->ErrorInfo;
			   exit;
			}
			 
			echo 'Message has been sent';
		}
	}