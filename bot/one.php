<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'Exception.php';
	require 'PHPMailer.php';
	require 'SMTP.php';

	$mail = new PHPMailer;
	$servername = "localhost";
	$username = "sk6u8n5sh_sunshine_software";
	$password = "M35Bw_jWXWUR";
	$dbname = "sk6u8n5sh_sunshine_software";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$memberPackage='';
	$userName='';
	$mob='';
	$email='';
	
	$currentDate = date('Y-m-d');
 	$searchDate = date('Y-m-d',strtotime($currentDate. ' + 1 days'));

 	$sql = "SELECT * FROM user_payments WHERE DATE(pdate) = '$searchDate' AND sms_status=0 AND pstatus=1 ORDER BY pdate DESC";
 	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
  	while($row = $result->fetch_assoc()) {
    	$up_id= $row["up_id"]; 
			$memberPackage= $row["package"];
    	$sql = "UPDATE user_payments SET sms_status=1 WHERE up_id=$up_id";
			if ($conn->query($sql) === TRUE) {
					//echo "Record updated successfully";
			} else {
				//	echo "Error updating record: " . $conn->error;
			}  
    	$company_id=$row["uid"];
     	$sql = "SELECT * FROM users WHERE uid=$company_id LIMIT 1";
    
			$r = $conn->query($sql);
			if ($r->num_rows > 0) {
					while($p = $r->fetch_assoc()) {
						
							$mob =  $p["mobile"];
							$userName=$p["name"];
							$email=$p["email"];
							echo '<br>';
					}
			}
			else {
				//echo 'no result found';
			}
			break;
		}
		$conn->close();
		$msg='Your '.$userName.' Account Will be Expired in 1 Days.SunshineApp | Hotline: 01714044180';  
		
		$token = urlencode("hdisolyp-8b0czxjl-jjlheqln-yfcuqywa-pjjec9lh");
		$message = urlencode($msg);
		$to = urlencode($mob);
		$url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
						//var_dump($url);exit();
		$data = array(
			'to'      => "$to",
			'message' => "$message",
			'token'   =>"$token"
						);
									
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$smsresult = curl_exec($ch);

		$mail->isSMTP();                                      
		$mail->Host = 'smtp.gmail.com';  
		$mail->SMTPAuth = true;                               
		$mail->Username = 'info@sunshine.com.bd';                 
		$mail->Password = 'info!@#123';                          
		$mail->SMTPSecure = 'tls';                            
		$mail->Port = 587;                                    

		$mail->From = 'info@sunshine.com.bd';
		$mail->FromName = 'sunshine.com.bd';
		$mail->addAddress($email, $userName);     


		$mail->WordWrap = 50;                                 
			// Optional name
		$mail->isHTML(true);                                  

		$mail->Subject = 'Account Expired Alert';
		$mail->Body    = $msg;


		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
		
				

	} else {
		//echo 'no result found';
	}
	
	exit();


 
 




?> 
