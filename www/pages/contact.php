<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
  <script type="text/javascript">
  //Carrega o diretório principal  	
  </script>  

	<hr/>
	<h2>Contato</h2>
	<hr/>
	<h3>Formulário para Contato</h3>
	<hr/>
	<br/>
	<div id="contactDiv">
	<table>
	<tr>
		<td>Nome: </td><td><input type="text" size="40" id="nomeCtc"/></td>
	</tr>
	<tr>
		<td>E-mail: </td><td><input type="text" size="40" id="mailCtc"/></td>
	</tr>
	<tr>
		<td>Telefone: </td><td><input type="text" size="12" id="telCtc"/></td>
	</tr>
	<tr>
		<td>Texto: </td><td><textarea cols="30" rows="8" id="message"></textarea></td>
	</tr>
	<tr>
		<td><input type="button" value="Enviar" onclick="sendEmail($('#nomeCtc').val(),$('#mailCtc').val(),$('#telCtc').val(),$('#message').val())"/></td>
	</tr>
	
	</table>
	</div>
	<br/>
	<hr/>