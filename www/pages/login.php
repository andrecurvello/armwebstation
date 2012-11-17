<?php
//session_start();
if($_SESSION['login'] == false)
	{
?>
<h1>LOGIN</h1>
<hr/>
<br/>
<br/>
<h3>Autenticação de Usuário</h3>
<hr/>
<br/>
<br/>
<form method="post" action="php/auth.php" id="login">
	ID: <input type="text" size="20" name="user"/>
	Password: <input type="password" size="20" name="passwd"/> 
	<input type="submit" name="submit" value="Submit"/><br/>
</form>
<? }	else {
	echo "Usuário já autenticado.";
}

?>



