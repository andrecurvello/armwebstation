<?php


//modo mais dificil esse mundo de echo...
// concentrar scripts php e facilitar a vida com html/js!
echo "<html>";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/s>";

echo "</head>";
echo "<body>";

/*
echo "<script type=\"text/javascript\">
var digital = new Date();
digital.setHours("; echo date("H,i,s"); echo ");";

echo "
function clock();
var hours = digital.getHours();
var minutes = digital.getMinutes();
var seconds = digital.getSeconds();
digital.setSeconds(seconds+1);

";

 * */
 
$dir = "/sdcard";
chdir($dir);

$files = scandir($dir);

print_r($files);

echo getcwd();

echo "<br/>Verficia diretorio";
echo "<br/>";

echo count($files);
echo "<br/>";
echo "Espaço disponível em disco: <br/>";
$free = disk_free_space($dir)/1024/1024 . "MB";
echo $free;
//echo sprintf('%1.2f', $var...);
echo "<br/>";

echo "Espaco total em disco: <br/>";
$total = disk_total_space($dir)/1024/1025 . "MB";
echo $total;
echo "<br/>";
echo is_dir($files[3]);


echo "<br/>";

$mems = shell_exec("free | grep Mem");
print_r($mems);
$vec = explode("    ", $mems);
print_r($vec);


function decodeSize($bytes){
	
	$type = array("B", "KB", "MB", "GB", "TB");
	$index = 0;
	
	while($bytes >= 1024){
		$bytes/=1024;
		$index++;		
	}
	return ("".$bytes." ".$type[$index]);
	
}


echo "<br/>";
echo "Testando abertura de arquivo <br/>";
echo file_get_contents("/www/coisa.txt");
file_put_contents("/www/coisa.txt", "ola");
echo file_get_contents("/www/coisa.txt");
echo "<br/>";
echo "Testando abertura unica de arquivo";
//Pode-se usar somente uma variavel para armazenar isso, em tempo de execucao,
//alterando o valor conforme necessario.
$status = fopen("/www/status.txt", "w+");
$musica = "Apeeee";
fwrite($status,$musica);
echo "<br/>" . $musica;
fclose($status);
echo file_get_contents("/www/status.txt");

//se quiser ler arquivos na raca
//$conteudo = fread($handle,filesize($filename)); 
//

echo "<br/>";
echo "Teste de comandos shell: <br/>";
$cmd = "ls";

/*
 * Esqueleto para diferenciar arquivos de pastas
for($i = 0; $i < count($files); i++){
if(is_dir($dir[i]))
 echo ...set directory link with color... chdir se clicar...
 else
 echo ... set file link with color...
}

 * 
 * */
print_r(shell_exec($cmd));
echo "<br/>";
echo shell_exec("uptime");
echo "<br/>";

$treco = shell_exec("cat /proc/cpuinfo | grep BogoMIPS");
$array = explode(":", $treco);
echo $array[1];
echo "<br/>";

chdir('mp3');
echo "<br/>";
echo getcwd();
echo "<br/>";
echo "<div id=\"clock\"></div>";
echo "</body>";
echo "</html>";

?>