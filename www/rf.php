<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
  <script type="text/javascript">
  //Carrega o diretório principal
 	<?php
 	session_start();
	?> 
	
  	$(document).ready(function(){
  		$.getScript("js/rf.js");
  	});

  </script>  

	<hr/>
	<h2>Radio Frequência</h2>
	<hr/>
	<?php
	if($_SESSION['login'] == FALSE){
		echo "<h3>É necessário estar autenticado no sistema para ver este conteúdo!</h3>";
	}
	else {
?>
	<h3>Controle de Mensagens RF</h3>
	<div id="rfDiv"></div>
	<br/>
	<hr/>
	<br/>
	<div id="rfControl">
		<table id="emissorTable">
			<tr><td>Emissor:</td>
				<td>
					<select id="emissorSelect">
						<option value="1">Máquina 1</option>
						<option value="2">Máquina 2</option>
					</select>
				</td>
			</tr>
		</table>
		<table id="emissorTableText">
			<tr><td>Texto:</td></tr>
			<tr><td><textarea id="textArea" name="textArea" cols="40" rows="3" onKeyDown="countChars(96)" onKeyUp="countChars(96)">
					</textarea>
				</td>
			</tr>
			<tr><td><input disabled size="3" value="96" name="txtLen" id="txtLen"/></td></tr>
			<tr><td><input type="button" value="Enviar Mensagem" onclick="sendRf($('#emissorSelect').val(),$('#textArea').val())"/></td></tr>
		</table>
	</div>
	<br/>
	<br/>
	
	<table id="receptorTable">
		<tr><td>Receptor: </td>
			<td>	<select id="receptor">
					<option value="1">Máquina 1</option>
					<option value="2">Máquina 2</option>
				</select>
			</td>
			
		</tr>
		</table>
		<table>
		<tr><td><input type="button" value="Receber Dados" onclick="receiveRf($('#receptor').val())"/>
		</table>
	<hr/>
        <h4 style="text-align:center; font-size:18px;">Mensagens Obtidas</h4>
	<div id="tempData">
		
	</div>
	<?
	}
?>