<?php
include '/www/php/variables.php';

$file = "/www/files/pic.hist";

//Link do script de captura
$camShell = "/usbCapture/cameraCapture.sh";

//Pega data atual - Do servidor!
$data = date('d-m-Y--h-i');


//Tipo padrao.
$type = "1";

$camShellCMD = "$camShell $type $data";

//---- Set of variables

/*
 * Testes mostraram que o script não consegue "sair"
 * do controle do mjpg_streamer.
 * Desta forma, fica a critério do PHP o controle sobre
 * o processo do MJPG Streamer para a tirada de fotos.
 */

//Escreve em arquivo txt ultima imagem gravada
function writeLast($img,$file){
//base de escrita de arquivo!	
$fr = fopen($file,'w+');
fwrite($fr,$img);
fclose($fr);
}


//Pega ultima imagem gravada.
function getLast($file){
	$content = file_get_contents($file);
	return $content;
}

function killStream(){
	$pid = shell_exec("pidof mjpg_streamer");
	
	if($pid != null){
	shell_exec("kill $pid &");
	} else {
		
	}
}

function initStream($mjpgFile){
	shell_exec("$mjpgFile &");
}

if(isset($_GET['cap']) && !isset($_GET['type'])){
	killStream();	
	$img = system($camShellCMD);
	initStream($mjpgFile);
	writeLast($img,$file);
}

//Preparar para caso de tirar foto com efeitos.
if(isset($_GET['cap']) && isset($_GET['type'])){
	$type = $_GET['type'];
	
	if($type === "1"){
		killStream();	
		$type = "1";
		$camShellCMD = "$camShell $type $data";
		$img = system($camShellCMD);
		initStream($mjpgFile);
		writeLast($img,$file);
	}
		
	 else if($type === "2"){
		killStream();	
		$type = "2";
		$camShellCMD = "$camShell $type $data";
		$img = system($camShellCMD);
		initStream($mjpgFile);
		writeLast($img,$file);
	}
		
	 else if ($type === "3"){
		killStream();	
		$type = "3";
		$camShellCMD = "$camShell $type $data";
		$img = system($camShellCMD);
		initStream($mjpgFile);
		writeLast($img,$file);
		
	}
}


//Rotina para pegar ultima imagem salva em memória.
if(isset($_GET['last'])){
	$img = getLast($file);
	//Retorna o endereço e nome da ultima imagem.
	echo $img;
}

if(isset($_GET['rmv'])){
	
}

?>