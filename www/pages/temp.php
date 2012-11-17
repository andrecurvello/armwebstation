  <script type="text/javascript">
  //Carrega o diretório principal
  	$(document).ready(function(){
  		
  		$.get("php/temp.php?temp=C",function(temp){
		$('#tempDiv').html("<h3 style=\"color:blue;\">"+temp+" °C</h3>");
	});
  		
  	});
  	
  </script>  

	<hr/>
	<h2>Temperatura</h2>
	<hr/>
	<h3>Exibição da Temperatura Ambiente</h3>
	<div id="tempDiv"></div>
	<br/>
	<hr/>
	<br/>
	<div id="tempCtrl">
		Tipo de Temperatura
		<table id="tempControl">
			<tr>
				<td>
					<select id="tempType" onchange="changeTemp(this.value);">
						<option value="1">Celsius</option>
						<option value="2">Fahrenheit</option>
						<option value="3">Kelvin</option>
					</select
				</td>
				<td><input type="button" value="Ativar" onclick="startTemp($('#tempType').val())"/></td>
				<td><input type="button" value="Pausar" onclick="stopTemp()"/></td>   
			</tr>
		</table>
		<br/>
	</div>
	<div id="tempFileCtrl">
		<h3>Obtenção de Arquivo de Dados de Temperatura:</h3>
		<form id="getTempFileForm" method="get" action="php/temp.php">
		<table id="formTempFile">
			<tr>
				<td>
					<select id="tempTypeSelect" name="type">
						<option value="C">Celsius</option>
						<option value="F">Fahrenheit</option>
						<option value="K">Kelvin</option>
					</select
				</td>
				<td><input type="hidden" name="file"/></td>
				<td><input type="number" id="tempInterval" name="time" size="4"/> Segundos.</td>
			</tr>
			<tr>
				<td><input type="submit" value="Salvar Dados"/></td>
			</tr>
		</table>
		</form>
		
		<br/>
		<!--<br/>Intervalo de Tempo:<input type="number" size="4" id="time"/><br/>-->
	</div>
	<br/>
	<h3>Saída dos dados de Temperatura</h3>
	<hr/>
	<div id="tempData">
		
	</div>
	