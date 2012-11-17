<?php

$mailShell = "/www/files/mail.py";

if (isset($_GET['nomeCtc']) && isset($_GET['mailCtc']) && isset($_GET['telCtc']) && isset($_GET['message'])){
	$nomeCtc = $_GET['nomeCtc'];
	$mailCtc = $_GET['mailCtc'];
	$telCtc = $_GET['telCtc'];
	$msg = $_GET['message'];
	
	$message = "\nNOME: $nomeCtc\r\n
	\nE-Mail: $mailCtc\r\n
	\nTelefone: $telCtc\r\n
	\nMensagem: \r\n $msg";
	
	$subject = "Recado: ".date("d-m-Y--H-i-s");
	$status = shell_exec("$mailShell \"$subject\" \"$message\"");
	
	echo $status;	
}

?>