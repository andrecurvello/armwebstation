  <script type="text/javascript">
  //Carrega o diretório principal
  	$(document).ready(function(){
  		$.getScript("js/gps.js");
  		$.get("php/gps.php?pos",function(gps){
		$('#gpsPos').html(gps);
	});
  		
  	});
  	
  </script>  

	<hr/>
	<h2>GPS</h2>
	<hr/>
	<br/>
	<h3>Status de Posição GPS</h3>
	<table>
		<tr><td><div id="gpsPos"></div></td><td><div id="gMaps"></div></td></tr>
	</table>
	
	<br/>
	<hr/>
	<br/>
	<div id="controlGPS">
		<h3>Controle do GPS</h3>
		<table id="tableCtrlGPS">
			<tr>
				<td>Tipo de Dado GPS:</td>
				<td>
					<select id="gpsType">
						<option value="1">GPGGA</option>
						<option value="2">GPGLL</option>
						<option value="3">GPGSA</option>
						<option value="4">GPGSV</option>
						<option value="5">GPRMC</option>
					</select>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>Intervalo de Tempo:</td><td><input type="number" size="4" id="time"/></td>
			</tr>
			<tr>
				<td>
					<input type="button" value="Ativar" onclick="startGps(type,time)"/>
				</td>
				<td>
					<input type="button" value="Pausar" onclick="stopGps()"/>
				</td>
				<td>
					<input type="button" value="Salvar Dados" onclick="getGpsFile(type,time)"/>
				</td>
			</tr>
		</table>
		<br/>
	</div>
	<br/>
	Saída dos dados GPS:
	<hr/>
	<div id="gpsData">
		
	</div>