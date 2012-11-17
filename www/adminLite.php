<?php
include "php/variables.php";

function uptime(){
	
	$upAux = shell_exec("cat /proc/uptime");
	$uptime = explode(" ",$upAux);
	//A partir de agora, uptime principal é $uptime[0];
	$secondsAux = $uptime[0];
	$seconds = intval($secondsAux % 60);
	
	$minutes = intval($secondsAux / 60 % 60);
	
	$hours = intval($secondsAux / 3600 % 24);
	
	$days = intval($secondsAux / 86400);  
	
	
	if ($days > 0) {
    $uptimeString .= $days;
    $uptimeString .= (($days == 1) ? " dia" : " dias");
  	}
  	if ($hours > 0) {
    $uptimeString .= (($days > 0) ? ", " : "") . $hours;
    $uptimeString .= (($hours == 1) ? " hora" : " horas");
  	}
  	if ($mins > 0) {
    $uptimeString .= (($days > 0 || $hours > 0) ? ", " : "") . $mins;
    $uptimeString .= (($mins == 1) ? " minuto" : " minutos");
  	}
  	if ($secs > 0) {
    $uptimeString .= (($days > 0 || $hours > 0 || $mins > 0) ? ", " : "") . $secs;
    $uptimeString .= (($secs == 1) ? " segundo" : " segundos");
  	}
	
  	return $uptimeString;
}

?>
<script type="text/javascript">
	$(document).ready(function(){
		loadStatus();
	});
</script>

<h2>Administração</h2>
<hr/>
<h3>Dados da Estação:</h3>
<table id="stationData">
	<tr>
		<td>Tempo em operação:</td> <td><?php echo uptime(); ?></td>
	</tr>
	<tr>
		<td>Processador:</td><td>ARM 1176JZF-S</td>
	</tr>
	<tr>
		<td>Frequência Proc.:</td> <td><?php
		$cpufreqAux= shell_exec("cat /proc/cpuinfo | grep BogoMIPS");
		$cpufreq = explode(":", $cpufreqAux);
		echo "$cpufreq[1] Mhz";
			?>
		</td>
	</tr>
	<tr>
		<td>Sistema Operacional:</td> <td><?php echo shell_exec("uname -r");?></td>
	</tr>
	<tr>
		<td>Memória RAM Total:</td> <td><?php 
			$ramAux = shell_exec("free | grep Mem");
			$vecRam = explode("    ", $ramAux);
			echo round($vecRam[1]/1024,2) ." MB";
			
			?></td>
	</tr>
	<tr>
		<td>Memória RAM Disponível:</td> <td><?php echo round($vecRam[4]/1024,2) ." MB";?></td>
	</tr>
	<tr>
		<td>Memória RAM Utilizada:</td> <td><?php echo round($vecRam[3]/1024,2) ." MB";?></td>
	</tr>
	<tr>
		<td>Número de Processos Ativos:</td> <td><?php echo shell_exec("ps | wc -l");?></td>
	</tr>
	<tr>
		<td>Memória FLASH Total:</td> <td><?php echo round(disk_total_space("/sdcard")/1024/1024,2) ." MB"; ?></td>
	</tr>
	<tr>
		<td>Memória FLASH Utilizada:</td> <td><?php echo round((disk_total_space("/sdcard")-disk_free_space("/sdcard"))/1024/1024,2) ." MB";?></td>
	</tr>
	<tr>
		<td>Memória FLASH Disponível:</td> <td><?php echo round(disk_free_space("/sdcard")/1024/1024,2) ." MB"; ?></td>
	</tr>
	<tr>
		<td>Uso da Banda de Rede:</td> <td><?php ?></td>
	</tr>
	<tr>
		<td>Mídia em Execução:</td>
	</tr>
	<tr>
		<td id="midia"></td>
	</tr>
</table>
<hr/>
<div id="mjpgCtrl" alig="center">
<h3>MJPG Streamer Control</h3>
<table>
	<tr><td><input type="button" onclick="startStream();" value="Iniciar Stream" /></td>
		<td><input type="button" onclick="stopStream();" value="Pausar Stream" /></td>
	</tr>
</table>
</div>
<hr/>
<h3>Controle da Temporização de Captura de Fotos:</h3><br/>
<table>
	<tr>
		<td>Configuração Atual: </td><td id="tmpAtual"></td>
	</tr>
	<tr>
		<td>Alterar (Minutos): </td><td><input type="number" id="camTime" size="3"/></td>
	</tr>
	<tr><td><input type="button" value="Aplicar" onclick="alterTimeCam($('#camTime').val()"/></td></tr>
</table>

<h3>Formatar Dados?</h3>
<select id="format">
	<option id="m">Músicas</option>
	<option id="v">Vídeos</option>
	<option id="i">Imagens</option>
	<option id="a">TUDO</option>
</select>
<input type="button" value="Aplicar" onclick="formatData($('#format').val());"/>
<br/>
<hr/>
<h3>Controle de Sistema</h3>
<table>
<tr>
	<td><input type="button" value="Iniciar QTopia" onclick="startQtopia()"/></td>
	<td><input type="button" value="Fechar QTopia" onclick="stopQtopia()"/></td>
</tr>
<tr>
	<td><input type="button" value="Ligar Display LCD" onclick="lcdOn()"/></td>
	<td><input type="button" value="Desligar Display LCD" onclick="lcdOff()"/></td>
</tr>
<tr>
	<td><input type="button" value="Ligar Backlight" onclick="backLightOn()"/></td>
	<td><input type="button" value="Desligar Backlight" onclick="backLightOff()"/></td>
</tr>
<tr>
	<td><input type="button" value="Reiniciar Sistema" onclick="restartSystem();"/></td>
</tr>
</table>
<br/><br/><br/>
