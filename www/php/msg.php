<?php
	include '/www/php/variables.php';
	
	$lcdShell = ""; //executavel que gera coisa na tela...
	$buzzerShell = ""; //executavel que apita aviso de mensagem...
	
	$size = 140; //Número máximo de caracteres permitiros para exibição de mensagem.
	
	### Função que verifica a quantidade de caracteres da mensagem. Há um limite para exibição!
	function verifyMsg($msg,$size){
		
		$sizeString = strlen($msg);
		
		if ($sizeString <= $size)
			return true;
		else {
			return false;
		}
		
	}
	
	function verifyType($type){
		
	}
	
	if(isset($_GET['msg']) && isset($_GET['type'])){
		$msg = $_GET['msg'];
		$type = $_GET['type'];
			
		
		if(verifyMsg($msg,$size)){
			if(verifyType($type)){
				
			$statusMsg = shell_exec("$lcdShell $type $msg");
			$statusBuzz = shell_exec("$buzzerShell 10");
			
			### Para ter feedback do status, em caso de êxito ou não.
			echo $statusMsg;
			echo $statusBuzz;
			} else {
				echo "Error: Invalid Type";
			}
			
		}
		else {
			echo "Error: Invalid length of message";
		}
		
	}
	
	if(isset($_GET['msg']) && !isset($_GET['type'])){
		$msg = $_GET['msg'];
		$type = "lcd"; //Tipo básico quando não é passado parâmetro.
	
	}


?>