<?php

/*
 * Quando um usuáro muda de página, o diretório é mudado.
 * Isso altera a variável dir.
 * Desta forma, não é necessário carregar tooodo o diretório principal nos comandos. Apenas os índices.
 * Estes índices devem ser validados, de modo que somente arquivos de mídia sejam executados.
 * 
 */

include '/www/php/variables.php';

/*
 * Construir rotinas de validação para impedir recursos que não devem ser acessados.
 * 
 */
 
 //Função de verificar extensões.
 function isMedia($file){
	
 }
 
function navMedia($chdir){
	$dir = realpath($chdir);
	chdir($dir);
	echo "<p>Diretório: $dir</p>";
	//print_r($dir);
	$files = scandir($dir);
	//print_r($files);
	
	if(is_dir($files[1])){
		$retDir = realpath($files[1]);
		if(strcmp('/sdcard', $retDir)===0){}
		else if(strcmp('/sdcard',$retDir)<0)
		echo "<br/><input type=\"button\" value=\"Voltar\" onclick=\"chdir('$retDir','md');\"/><br/>";
	}
	
	
	for($i = 2; $i < count($files) ; $i++){
		if(is_dir($files[$i])){
			$aux = realpath($files[$i]);		
			echo "<p><a style=\"color:#00f;\" href=\"#\" onclick=\"chdir('$aux','md');\"> $files[$i] </a></p>";		
		}
		
		//Mostrar apenas arquivos com extensões permitívies (ver análise de perfil...)
		if(is_file($files[$i])){
			$aux = realpath($files[$i]);
		echo "<p><a style=\"color:#000;\" href=\"#\" onclick=\"play('$aux');\">$files[$i]</a></p>";	
		}
			
	}
}


function navVideos($chdir){
	$dir = realpath($chdir);
	chdir($dir);
	echo "<p>Diretório: $dir</p>";
	//print_r($dir);
	$files = scandir($dir);
	//print_r($files);
	
	if(is_dir($files[1])){
		$retDir = realpath($files[1]);
		if(strcmp('/sdcard', $retDir)===0){}
		else if(strcmp('/sdcard',$retDir)<0)
		echo "<br/><input type=\"button\" value=\"Voltar\" onclick=\"chdir('$retDir','vd');\"/><br/>";
	}
	
	
	for($i = 2; $i < count($files) ; $i++){
		if(is_dir($files[$i])){
			$aux = realpath($files[$i]);		
			echo "<p><a style=\"color:#00f;\" href=\"#\" onclick=\"chdir('$aux','vd');\"> $files[$i] </a></p>";		
		}
		
		//Mostrar apenas arquivos com extensões permitívies (ver análise de perfil...)
		if(is_file($files[$i])){
			$aux = realpath($files[$i]);
		echo "<p><a style=\"color:#000;\" href=\"#\" onclick=\"playVideo('$aux',$('#out').val());\">$files[$i]</a></p>";	
		}
			
	}
}
 
 function navPics($chdir){
 	$dir = realpath($chdir);
	chdir($dir);
	echo "<p>Diretório: $dir</p>";

	$files = scandir($dir);
	//Arrumando a questão de nome do diretório.
	$dirAux = str_replace("/sdcard", "", $dir);
	
	if(is_dir($files[1])){
		$retDir = realpath($files[1]);
		if(strcmp('/sdcard', $retDir)===0){}
		else if(strcmp('/sdcard',$retDir)<0)
		echo "<br/><input type=\"button\" value=\"Voltar\" onclick=\"chdir('$retDir','img');\"/><br/>";
	}
	
	$auxVar=0;
	
	echo "<table id=\"picTable\">";
	echo "<tr>";
	for($i = 2; $i < count($files) ; $i++){
		if(is_dir($files[$i])){
			$aux = realpath($files[$i]);		
			echo "<td><a style=\"color:#00f;\" href=\"#\" onclick=\"chdir('$aux','img');\"> $files[$i] </a></td></tr><tr>";		
		}
		
		//Mostrar apenas arquivos com extensões permitívies (ver análise de perfil...)
		if(is_file($files[$i]) && $auxVar != 3){
			$pathParts = pathinfo($files[$i]);
			$aux = $pathParts['basename'];
		echo "<td><a style=\"color:#000;\" href=\"$dirAux/$aux\"><img src=\"$dirAux/$aux\" width=160 heigth=120/>$aux</a></td>";
		$auxVar = $auxVar + 1;	
		} else if(is_file($files[$i]) && $auxVar==3){
			echo "</tr>";
			$auxVar = 0;
			echo "<tr><td><a style=\"color:#000;\" href=\"$dirAux/$aux\"><img src=\"$dirAux/$aux\" width=160 heigth=120/>$aux</a></td>";
			
		}
			
	}
	echo "</td>";
	echo "</table>";
	
 }
 
 if(isset($_GET['img']) && isset($_GET['chdir'])){
 	$dirPics=$_GET['chdir'];
 	navPics($dirPics);
 }
 
 
if(isset($_GET['md']) && isset($_GET['chdir'])){
	$chdir = $_GET['chdir'];
	if(is_dir($chdir)){
		navMedia($chdir);
	}
		
	else echo "error";
}

if(isset($_GET['vd']) && isset($_GET['chdir'])){
	$chdir = $_GET['chdir'];
	if(is_dir($chdir)){
		navVideos($chdir);
	}
		
	else echo "error";
}
//$path_parts = $pathinfo($path);
//$path_parts['dirname'];
//$path_parts['basename'];
//$path_parts['extension'];
//$path_parts['filename'];

?>