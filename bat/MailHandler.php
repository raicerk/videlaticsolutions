<?php
	//SMTP server settings	
	$host = "mail.glgroup.cl";
    $port = "26";
    $username = "depto.informatica@glgroup.cl";
    $password = "ToQNGL391#.";
	
	
	$messageBody = "";
	
	if($_POST['name']!='false'){
		$messageBody .= '<p>Visitor: ' . $_POST["nombre"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['email']!='false'){
		$messageBody .= '<p>Email Address: ' . $_POST['correo'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}else{
		$headers = '';
	}
	if($_POST['phone']!='false'){		
		$messageBody .= '<p>Phone Number: ' . $_POST['telefono'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}	
	if($_POST['message']!='false'){
		$messageBody .= '<p>Message: ' . $_POST['mensaje'] . '</p>' . "\n";
	}
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
	if($host=="" or $username=="" or $password==""){
		$owner_email = $_POST["owner_email"];
		$headers = 'From:' . $_POST["email"] . "\r\n" . 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
		$subject = 'A message from your site visitor ' . $_POST["name"];
		
		try{
			if(!mail($owner_email, $subject, $messageBody, $headers)){
				throw new Exception('mail failed');
				echo "errororororor";
			}else{
				echo 'mail sent';
			}
		}catch(Exception $e){
			echo $e->getMessage() ."\n";
		}
	}
?>
