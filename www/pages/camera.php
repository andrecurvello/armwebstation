<?php                           
 session_start();                
 if($_SESSION['login'] == true){                   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	<hr/>
	<h2>Câmera</h2>
	<hr/>
	<br />
 	
<table id="cameras">
	<tr><td>Camera 1</td><td>Camera 2</td></tr>
	<tr><td><img src="http://armweb.no-ip.org:8082/?action=stream" width="320" height="240"/></td><td><img src="http://143.107.235.48:8082/?action=stream" width="320" height="240"/></td></tr>
	<!-- Tive problemas com a porta 8080. Mudei para porta 8082, redirecionei para www padrao. Funciona agora stream direto, sem socket. Tira carga do PHP. Melhora resposta.-->
</table>     
    <br/><br/><br/><br/><br/>
    <div id="controlCamera" align="center">
    	
    <h2>Controle da Câmera 1</h2>
    <hr/>
    <table id="camControl">
    	<tr>
    			  <select id="effect">
			    	<option value="1">Colorida</option>
			    	<option value="2">Preto-e-Branca</option>
    			  </select>
    	</tr>
    	<tr>
    		<input type="button" value="Tirar Foto" onclick="snapShot($('#effect').val());"/>
    	</tr>
    	<tr>
    		<input type="button" value="Visualizar Foto" onclick="getLastPic()"/>
    	</tr>
    	<tr>
    		<input type="button" value="Excluir Foto" onclick="delLastPic()"/>
    	</tr>
    </table>
    <br/>
    <br/>
    <br/>
    <h2>Ativar Streaming</h2>
    <hr/>
    Saída:
    <select id="streamOut">
    	<option value="1">TV</option>
    	<option value="2">LCD</option>
    	<option value="3">TV e LCD</option>
    </select>	
    <input type="button" value="Ativar" onclick="startVideo($('#streamOut').val());"/> 
    </div>
<? }
else {
?>
<h3> É necessário estar autenticado no sistema para ver este conteúdo!</h3>
<? } ?>