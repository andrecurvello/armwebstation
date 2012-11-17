<?php
/*
 * Aqui ficam as rotinas de controle de GPS
 * Devem controlar o PYNMEA ou algum outro tipo
 * de parser de dados NMEA.
 * Abre serial, obtem valores, etc...
 * Display na tela.
 */

include '/www/php/variables.php';

$gpsShell = "/www/files/gps.py";
$data = shell_exec($gpsShell);

#### Agrupamento de funções de Parsing de Dados NMEA
function gps($gpsShell){
	$data = shell_exec("$gpsShell GPGGA");
		
	$gpsData = explode(",",$data);

	//print_r($gpsData);
	$type = $gpsData[0];
	$time = $gpsData[1];
	$latitude = $gpsData[2];
	$latType = $gpsData[3];
	$longitude = $gpsData[4];
	$longType = $gpsData[5];
	$fixQ = $gpsData[6];
	$sattelites = $gpsData[7];
	$horDil = $gpsData[8];
	$altitude = $gpsData[9];
	$geoid = $gpsData[10];
	$checksum = $gpsData[13];
	
	## Tratamento da Hora
	$hours = substr($time, 0,2);
	$minutes = substr($time, 2,2);
	$seconds = substr($time, 4,2);
	
	### Tratamento da Latitude
	$latDeg = (int) substr($latitude,0,2);
	$latMin = substr($latitude,2);
	
	### Tratamento da Longitude
	$longDeg = (int) substr($longitude,0,3);
	$longMin = substr($longitude,3);
	
	echo "<table>";
	echo "<tr><td>Tipo de Dado:</td><td>$type</td></tr>";
	echo "<tr><td>Horário UTC:</td><td>$hours".":".$minutes.":".$seconds."</td></tr>";
	echo "<tr><td>Latitude:</td><td> $latDeg"."°"." $latMin"."'". " $latType</td></tr>";
	echo "<tr><td>Longitude:</td><td> $longDeg"."°"." $longMin"."'"." $longType</td></tr>";
	echo "<tr><td>Número de Satélites:</td><td>$sattelites</td></tr>";
	echo "<tr><td>Altitude:</td><td> $altitude metros</td></tr>";
	echo "</table>";
}

### Retorna a String pura, nao trabalhada.
function rawGPS($gpsShell,$type){
	return shell_exec("$gpsShell $type");
}

# GPS Fix Data
function gpgga($gpsShell){
	$data = shell_exec("$gpsShell GPGGA");
		
	$gpsData = explode(",",$data);

	//print_r($gpsData);
	$type = $gpsData[0];
	$time = $gpsData[1];
	$latitude = $gpsData[2];
	$latType = $gpsData[3];
	$longitude = $gpsData[4];
	$longType = $gpsData[5];
	$fixQ = $gpsData[6];
	$sattelites = $gpsData[7];
	$horDil = $gpsData[8];
	$altitude = $gpsData[9];
	$geoid = $gpsData[10];
	$checksum = $gpsData[13];
	
	## Tratamento da Hora
	$hours = substr($time, 0,2);
	$minutes = substr($time, 2,2);
	$seconds = substr($time, 4,2);
	
	### Tratamento da Latitude
	$latDeg = (int) substr($latitude,0,2);
	$latMin = substr($latitude,2);
	
	### Tratamento da Longitude
	$longDeg = (int) substr($longitude,0,3);
	$longMin = substr($longitude,3);
	
	echo "$type<br/>";
	echo $hours."H ". $minutes."M ".$seconds."S "."UTC<br/>";
	echo "$latitude<br/>";
	echo "$latDeg °<br/>";
	echo "$latMin'<br/>";
	echo "$latType<br/>";
	echo "$longitude<br/>";
	echo "$longDeg °<br/>";
	echo "$longMin'<br/>";
	echo "$longType<br/>";
	echo "$sattelites satélires<br/>";
	echo "$altitude metros<br/>";
}

# GPS Minimum recommended Data
function gprmc($gpsShell){
	$data = shell_exec("$gpsShell GPGGA");
		
	$gpsData = explode(",",$data);

	//print_r($gpsData);
	$type = $gpsData[0];
	$time = $gpsData[1];
	$status = $gpsData[2];
	$latitude = $gpsData[3];
	$latType = $gpsData[4];
	$longitude = $gpsData[5];
	$longType = $gpsData[6];
	$speedGround = $gpsData[7];
	$trackAngle = $gpsData[8];
	$date = $gpsData[9];
	$magnetData = $gpsData[10];
	$magnetType = $gpsData[11];
	$checksum = $gpsData[12];
}

# GPS detailed satellite data
function gpgsv($gpsShell){
	$data = shell_exec("$gpsShell GPGSV");
		
	$gpsData = explode(",",$data);

	//print_r($gpsData);
	$type = $gpsData[0];
	$sentences = $gpsData[1];
	$sattelites = $gpsData[2];
	$satPRN = $gpsData[3];
	$elevationDeg = $gpsData[4];
	$azimutDeg = $gpsData[5];
	$SNR = $gpsData[6];
	
}

function gpgsa($gpsShell){
	
}

function gpgll($gpsShell){
	
}

### Função que gera arquivo TXT
function returnTXT($gpsData){
	header('Content-type: application/txt');
	header('Content-Disposition: attachment; filename="gpsData.txt"');
	echo $gpsData;
	echo "\r\n";
}

### Agrupamento de requisições GET
if (isset($_GET['pos'])){
	gps($gpsShell);
}

### Irá pegar apenas uma string do tipo selecionado.
if (isset($_GET['type']) && !isset($_GET['time'])){
	$type = $_GET['type'];
}

### Irá pegar strings do tipo selecionado no dado tempo, ou quantidade.
if (isset($_GET['type']) && isset($_GET['time'])){
	$type = $_GET['type'];
	$time = $_GET['time'];
}

### Irá gerar o arquivo do tipo selecionado no tempo dado.
if (isset($_GET['type']) && isset($_GET['file']) && isset($_GET['time'])){
	$type = $_GET['type'];
	$time = $_GET['time'];
}

### Irá gerar o arquivo do tipo selecionado...
if (isset($_GET['type']) && isset($_GET['file']) && !isset($_GET['time'])){
	$type = $_GET['type'];
	$time = 10; //10 seconds - Basic interval. Or not.
}

?>