<?php
/**
 * Escrever aqui funções de controle
 * do aplicativo de sensor de temperatura.
 * 
 * Abre, pega retorno do valor em console,
 * fecha,
 * e echo...
 * 
 */
include '/www/php/variables.php';

//Função que pega uma string, e retorna um arquivo texto ao usuário.
function returnData($string){
	date_default_timezone_set('America/Sao_Paulo');
	$dataInfo = date("d-m-Y--H-i-s");
	
	header('Content-type: application/txt; charset=utf-8');
	header('Content-Disposition: attachment; filename="tempData.txt"');
	echo $string;
	echo "\r\n";
}

//Tratamento de requisições simples de temperatura
if(isset($_GET['temp'])){
	$tempType = $_GET['temp'];
	
	if($tempType === 'C'){
		$temp = shell_exec($tempSensor);
		echo $temp;
		
	} else if($tempType === 'F'){
		$temp = shell_exec($tempSensor);
		$temp = ($temp/5)*9+32;
		echo $temp;
		
	} else if($tempType === 'K'){
		$temp = shell_exec($tempSensor);
		$temp = $temp + 273;
		echo $temp;
	}

}

//Conjunto de parâmetros GET para montagem do arquivo de temperatura.
if(isset($_GET['type']) && isset($_GET['file']) && isset($_GET['time'])){
	
	$type = $_GET['type'];
	$time = (int)$_GET['time'];
	$dataInfo = date("d-m-Y--H-i-s");
	$timeAval = date("H-i-s");
	
	$string = "### Relatório de Dados de Temperatura ###\n\r";
	$string .= "$dataInfo\n\r";
	$tempAux = "";
	$temp = "";
	

	
	if($type === 'C'){
		for($i = 0; $i <= $time; $i++){
			$timeAval = date("H-i-s");
			$tempAux = shell_exec($tempSensor);
			$string .= "$timeAval: $tempAux\n\r";  
			sleep(1);
			$timeAval = date("H-i-s");
			$tempAux = shell_exec($tempSensor);
			$string .= "$timeAval: $tempAux\n\r"; 
			sleep(1);
		}
		
		//Chama a função de retornar o arquivo ao usuário, com a string gerada.
		returnData($string);	
	} 
	else if($type === 'F'){
		for($i = 0; $i <= $time; $i++){
			$tempAux = shell_exec($tempSensor);
			$temp .= ($tempAux/5)*9+32 ."\r\n";
			sleep(1);
			$tempAux = shell_exec($tempSensor);
			$temp .= ($tempAux/5)*9+32 ."\r\n";
		}
		//Chama a função de retornar o arquivo ao usuário, com a string gerada.
		returnData($temp);
		
	} else if($type === 'K'){
		for($i = 0; $i <= $time; $i++){
			$tempAux = shell_exec($tempSensor);
			$temp .= $tempAux + 273 ."\r\n";
			sleep(1);
			$tempAux = shell_exec($tempSensor);
			$temp .= $tempAux + 273 ."\r\n";
		}
		//Chama a função de retornar o arquivo ao usuário, com a string gerada.
		returnData($temp);
	}	

}

?>