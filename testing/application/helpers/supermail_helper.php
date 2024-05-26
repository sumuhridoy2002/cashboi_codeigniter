<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'Exception.php';
	require 'PHPMailer.php';
	require 'SMTP.php';
	

	
	
	
	function send_email($to,$name,$msg,$subject){
	    $mail = new PHPMailer;
	    
	    $mail->isSMTP();                                      
		$mail->Host = 'smtp.gmail.com';  
		$mail->SMTPAuth = true;                               
		$mail->Username = 'info@sunshine.com.bd';                 
		$mail->Password = 'info!@#123';                          
		$mail->SMTPSecure = 'tls';                            
		$mail->Port = 587;                                    

		$mail->From = 'info@sunshine.com.bd';
		$mail->FromName = 'Sunshine';
		$mail->addAddress($to, $name);     


		$mail->WordWrap = 50;                                 
			// Optional name
		$mail->isHTML(true);                                  

		$mail->Subject = $subject;
		$mail->Body    = $msg;


		if(!$mail->send()) {
			//echo 'Message could not be sent.';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			//echo 'Message has been sent';
		}
	}
	
?>