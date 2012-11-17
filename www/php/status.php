<?php
session_start();
/**
 * Escrever aqui funções de avaliação de espaço
 * livre em disco, espaço total, espaço usado
 * processo, uso de ram (/proc)
 * Se o mjpg_streamer está ativo,
 * o que está em execução, etc.
 * 
 * Cada parâmetro ele retorna uma coisa diferente.
 * 
 */
 include '/www/php/variables.php';

 //Procurar aquelas funções que identificam padrões!
 function typeOfMedia($status){
 	$pathinfo = pathinfo($status);
	$type = $pathinfo['extension'];
	return $type;
 }
 
 function readMedia($status){
 	$type = typeOfMedia($status);
	if ($type === "mp3"){
		echo "Musica! $status";
	}
	else if ($type === "avi"){
		echo "Vídeo! $status";
	}
 }


 if(isset($_GET['mjpgs'])){
 	
	$mjpgStatus = shell_exec("pidof mjpg_streamer");
	 
	if(strlen($mjpgStatus)===0){
		echo "<p style=\"color:red; text-align:center;\">MJPG Streamer DOWN</p>";
	}
	else {
		echo "<p style=\"color:blue; text-align:center;\">MJPG Streamer UP</p>";
	}
	
 }

 if(isset($_GET['m_up'])){
	shell_exec($mjpgFile);
 }
 
 if(isset($_GET['m_down'])){
 	$pid = shell_exec('pidof mjpg_streamer');
	shell_exec("kill $pid &");
 }
 
 if(isset($_GET['current'])){
 	$current = file_get_contents($status);
	echo $current;
 } 
 
 if(isset($_GET['mpstatus'])){
 	$pidMp = shell_exec("pidof mplayer");
	if(isset($pidMp)){
		//Ver o que estah em execução
		echo "<p style=\"color:blue; text-align:center;\">MPlayer is Up</p>";
	}
	else echo "<p style=\"color:red; text-align:center;\">MPlayer is Down</p>";
 }
 
 if(isset($_GET['cpuload'])){

	$load = sys_getloadavg();
 	$load = (floatval($load[0]));
	$load = $load*100;
	echo "<p style=\"text-align:center;\">$load %</p>";
 }


//Rotina para reinicar a placa. É necessário autenticar com senha.
 if (isset($_GET['reset'])){
 	$pass = $_GET['reset'];
     if($pass == "1234"){ //Melhorar para pegar do DB.
      echo "Reboot";
      sleep(1);
 	  shell_exec("reboot");
     }
 }
 
 //Rotina para iniciar o QTopia
 if (isset($_GET['startQtopia'])){
 	shell_exec("qtopia");
	
	$pidQt = shell_exec("pidof qtopia");
	
	if(isset($pidQt)){
		echo 1;
	}
	else echo 0;
 }
 
 //Rotina para finalizar o QTopia
 if (isset($_GET['stopQtopia'])){
 	
	$pidQt = shell_exec("pidof qtopia");
	
	if(isset($pidQt)){
		shell_exec("kill $pidQt");
		echo 1;
	}
	
	if(!isset($pidQt)){
		echo 1;
	}
	else echo 0;
 }
 
 //Rotina para ligar o LCD
 if (isset($_GET['lcdon'])){
 	
	shell_exec("echo 127 > /dev/backlight-1wire");
	 echo 1;
 }
 
 //Rotina para desligar o LCD
 if (isset($_GET['lcdoff'])){
 	
	shell_exec("echo 0 > /dev/backlight-1wire");
	echo 1;
 }
 
 
 //Rotina para ligar o backlight do display LCD
 if (isset($_GET['backon'])){
	shell_exec("echo 127 > /dev/backlight");
	echo 1;
 }
 
 
 //Rotina para desligar o backlight do display LCD
 if (isset($_GET['backoff'])){
 	shell_exec("echo 0 > /dev/backlight");
 }
 
 if (isset($_GET['killMP'])){
     $pidofMP = shell_exec("pidof mplayer");
     shell_exec("kill $pidofMP");
 }
 
?>