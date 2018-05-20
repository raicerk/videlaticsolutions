<?php
	
	$messageBody = "";
	
	if($_POST['nombre']!='false'){
		$messageBody .= '<p>Nombre: ' . $_POST["nombre"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['correo']!='false'){
		$messageBody .= '<p>Correo electronico: ' . $_POST['correo'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}else{
		$headers = '';
	}
	if($_POST['telefono']!='false'){		
		$messageBody .= '<p>Numero de telefono: ' . $_POST['telefono'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}	
	if($_POST['mensaje']!='false'){
		$messageBody .= '<p>Mensaje: ' . $_POST['mensaje'] . '</p>' . "\n";
	}
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
	$headers = 'From:' . "jvmora@raicerk.cl" . "\r\n" . 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
	$subject = 'Contacto desde Videlatic Solutions: ' . $_POST["nombre"];
	
	try{
		if(!mail("jvmora@raicerk.cl", $subject, $messageBody, $headers)){
			throw new Exception('mail failed');
			echo "errororororor";
		}else{
			echo 'success';
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
?>
