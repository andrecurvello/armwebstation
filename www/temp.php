<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
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
			</tr>
			<tr>
				<td><input type="button" value="Ativar" onclick="startTemp($('#tempType').val())"/></td>
			</tr>
			<tr>
				<td><input type="button" value="Pausar" onclick="stopTemp()"/></td>     
			</tr>
		</table>
		<br/>
		<h3>Obtenção de Arquivo de Dados de Temperatura:</h3>
		<form id="getTempFileForm">
			<tr>
				<td>
					<select id="tempTypeSelect" name="type" onchange="changeTemp(this.value);">
						<option value="1">Celsius</option>
						<option value="2">Fahrenheit</option>
					<option value="3">Kelvin</option>
					</select
				</td>
			</tr>
			<tr>
				<td><input type="button" value="Salvar Dados"/></td>
			</tr>
			<tr>
				<td><input type="number" id="tempInterval" size="4"/> Segundos.</td>
			</tr>
		</form>
<br/>
		<!--<br/>Intervalo de Tempo:<input type="number" size="4" id="time"/><br/>-->
	</div>
	<br/>
	Saída dos dados de Temperatura
	<hr/>
	<fieldset>
	<div id="tempData">
		
	</div>
	</fieldset>