<h1>MENSAGEM LCD</h1>
<hr/>
<br/>
<br/>
<h3>Digite a mensagem que deseja enviar:</h3>
<textarea id="textMsg" name="msg" cols="40" rows="6">
</textarea>
<br/>
<br/>
<input type="button" value="Enviar" onclick="sendTxtMsg($('#textMsg').val())"/>
<input type="button" value="Notificar" onclick="actBuzz()"/>
<hr/>
<br/>
<h3>Historico de Mensagens</h3>
<input type="button" value="Obter" onclick="getMsgHist()"/>
