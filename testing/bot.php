<?php
	$servername = "localhost";
	$username = "sk6u8n5sh_sunshine_software";
	$password = "M35Bw_jWXWUR";
	$dbname = "sk6u8n5sh_sunshine_software";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$memberPackage='';
	$userName='';
	$mob='';
	
	$currentDate = date('Y-m-d');
 	$searchDate = date('Y-m-d',strtotime($currentDate. ' + 1 days'));

 	$sql = "SELECT * FROM user_payments WHERE DATE(pdate) = '$searchDate' AND sms_status=0 ORDER BY pdate DESC";
 	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
  	while($row = $result->fetch_assoc()) {
    	$up_id= $row["up_id"]; 
			$memberPackage= $row["package"];
    	$sql = "UPDATE user_payments SET sms_status=1 WHERE up_id=$up_id";
			if ($conn->query($sql) === TRUE) {
					echo "Record updated successfully";
			} else {
					echo "Error updating record: " . $conn->error;
			}  
    	$company_id=$row["uid"];
     	$sql = "SELECT * FROM users WHERE uid=$company_id LIMIT 1";
    
			$r = $conn->query($sql);
			if ($r->num_rows > 0) {
					while($p = $r->fetch_assoc()) {
						
							$mob =  $p["mobile"];
							$userName=$p["name"];
							echo '<br>';
					}
			}
			else {
				echo '<br>';
				echo "0 results";
				echo '<br>';
			}
			break;
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	$msg='Your '.$userName.' Account Will be Expired in 1 Days.SunshineApp | Hotline: 01714044180';  
    
	$token = urlencode("hdisolyp-8b0czxjl-jjlheqln-yfcuqywa-pjjec9lh");
	$message = urlencode($msg);
	$to = urlencode($mob);
	$url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=SUNSHINEAPPOTP&sms=$message&msisdn=$to&csms_id=1";
					
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
	exit();


 
 




?> 


