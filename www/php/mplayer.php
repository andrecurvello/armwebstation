<?php
    session_start();
	include '/www/php/variables.php';

	/*
	 * Setup do MPLAYER em Modo Slave
	 */	
	$command = "$mplayer $slave";
	 
	$posFile = "";
	//Criar uma função de controle de volume.	 

	//Volume inicial, final e mínimo.
    //$vol = 50;
	settype($vol, "integer");
	$maxVolume = 100;
	settype($maxVolume, "integer");
	$minVolume = 0;
	settype($minVolume, "integer");
	
	$dir;
	$files;
	$filePos;
	$index;
	//print_r($dir);
	
	function isRunning(){
		$pidMP = shell_exec("pidof mplayer");
		if ($pidMP != NULL)
			return TRUE;
		else
			return FALSE;
	}

	function killMP(){
		$pidMP = shell_exec("pidof mplayer");
		shell_exec("kill $pidMP");		
	}
	
	//Função para controlar o MPlayer ...
	function play($cmd){
		if(isRunning()){
			killMP();
		} else
		shell_exec($cmd);
	}
	
	function getMedia($media){
		global $pathparts;
		global $dir;
		global $extension;
		global $files;
		global $filePos;
		global $index;
		
		//Pega todos os detalhes do Path do arquivo
		$pathparts = pathinfo($media);
		
		//Pega o diretório...
		$dir = $pathparts['dirname'];
		chdir($dir);
		
		//Pega a extensão do arquivo ... 
		$extension = $pathparts['extension'];
		
		//Pega o nome do arquiv...
		$filename = $pathparts['basename'];
		
		$files = scandir($dir);
		$index = array_search($filename, $files, true);
		//$path_parts = $pathinfo($path);
		//$path_parts['dirname'];
		//$path_parts['basename'];
		//$path_parts['extension'];
		//$path_parts['filename'];
	}
	
		function writeStatus($media,$status){
	//	$tipo = mediaVerify($media);
		$fd = fopen($status,"w+");
		fwrite($fd,$media);
		fclose($fd);
	}

	function mediaVerify($media){
		
		
	}
	
	function notRunning(){
		echo "MPlayer is not running";
	}
	
	
//-------------- Tratamento das requisições GET ---------//	

	if(isset($_GET['play']) && isset($_GET['out'])){
		
     	if(isRunning()){
			killMP();
		}

		$media = $_GET['play'];
		$mode = $_GET['out'];
		
	    $fileplay = escapeshellarg($media);
		//writeStatus($fileplay,$status);		

		//getMedia($media);
		
		//$posFile = array_search($file, $files);
		
		if ($mode == "3") {
				$out = "tvandlcd";
				$cmd = "$command $fileplay -tvout $out";
				writeStatus($fileplay, $status);
				play($cmd);				
			}
			else if ($mode == "2") {
				$out = "tvonly";
				$cmd = "$command $fileplay -tvout $out";
				writeStatus($fileplay, $status);
				play($cmd);
			}
			else if ($mode == "1") {
				$out = "off";
				$cmd = "$command $fileplay";
				writeStatus($fileplay, $status);
				play($cmd);	
			}
	
	} 
	else if(isset($_GET['play']) && !isset($_GET['out'])) {
		if(isRunning()){
			killMP();
		}
		$media = $_GET['play'];
		//getMedia($media);
		//echo $filePos;
		//echo $dir;
		//echo $media;
		//echo "$file<br/>";
		//$posFile = array_search($file, $files);
		//Padrão quando não se determina a saída, é TV.
		$file_play = $files[$index];
		
		$fileplay = escapeshellarg($media);
		
		writeStatus($fileplay,$status);
		$out = "off";
		
		$cmd = "$command $out $fileplay";
		
		play($cmd);	
	}
	
	if(isset($_GET['stop'])){
		if(isRunning())
		killMP();
		else {
			notRunning();
		}
	}
	
	if(isset($_GET['pause'])){
		if(isRunning())
		shell_exec("echo pause > $mpcmd");	
		else {
			notRunning();
		}
	}
	
	//Só funcionam se tiver mais arquivo na fila! Lista do diretorio atual? GET!
	
	if(isset($_GET['nxt'])){
		//Tratar posição do arquivo no vetor de diretório.
		$posFile++;
		$media = realpath($files[$posFile]);		
		$cmd = "$command $out $media";
		play($cmd);	

	}
	
	if(isset($_GET['prv'])){
		//Tratar posição do arquivo no vetor de diretório.
		$posFile--;
		$media = realpath($files[$posFile]);		
		$cmd = "$command $out $media";
		play($cmd);	
	}
	
	if(isset($_GET['vol']) && !isset($_GET['u'])){
		// Só se for pra incrementar ou decrementar de 10 em 10...
		if(isRunning()){
		$volume = $_GET['vol'];
		$vol = $_GET['u'];
		//Comparar duas strings... Ver isso no Manual. ASAP.
		if($volume === "up"){
			if ($vol < 100){
				$vol = $vol;
				} else $vol = $maxVolume;
			$mpvol = escapeshellarg("Volume $vol 100");
			shell_exec("echo $mpvol > $mpcmd");
			}
		
		else if ($volume === "dw"){
			if($vol > 0) {
				$vol = $vol;
				echo $vol;
				} else $vol = $minVolume;
			$mpvol = escapeshellarg("volume $vol 100");
			echo $mpvol;
			shell_exec("echo $mpvol > $mpcmd");
			}
		} else {
			notRunning();
		}
		
	}
	
	if(isset($_GET['vol']) && isset($_GET['u'])){
		if(isRunning()){
		$volume = $_GET['vol'];
		$vol = $_GET['u'];
		//Comparar duas strings... Ver isso no Manual. ASAP.
		if($volume === "up"){
			if ($vol < 100){
				$vol = $vol;
				} else $vol = $maxVolume;
			$mpvol = escapeshellarg("Volume $vol 100");
			shell_exec("echo $mpvol > $mpcmd");
			}
		
		else if ($volume === "dw"){
			if($vol > 0) {
				$vol = $vol;
				} else $vol = $minVolume;
			$mpvol = escapeshellarg("Volume $vol 100");
			echo $mpvol;
			shell_exec("echo $mpvol > $mpcmd");
			}
		} else {
			notRunning();
		}
	}
	
	if(isset($_GET['mute'])){
		if(isRunning())
		shell_exec("echo mute > $mpcmd");
		else {
		notRunning();
		}
	}
	
	if(isset($_GET['camOut'])){
	//testar no muque
	// Dá pra testar primeiro no LCD!!!
	//streamer:
	// transferir wget
	//	mkfifo a.mjpeg wget -O a.mjpeg http://localhost:8080 2&gt;/dev/null & mplayer -cache 32 -demuxer 35 a.mjpeg
	// ou mplayer -demuxer lavf http://localhost:8081/stream.mjpg	
	shell_exec("mkfifo a.mjpeg wget -O a.mjpeg http://localhost:8080 2&> /dev/null & mplayer -cache 32 -demuxer 35 a.mjpeg");
	}

?>