<?php
//Iniciando a sessão
session_start();
if(isset($_POST['user']) && isset($_POST['passwd'])){
//Carregando o banco de dados de usuários.
$db = new PDO('sqlite:../db/login.sqlite');
//Obtendo os usuários disponíveis.
$users = $db->query('SELECT * FROM users' );

$_SESSION['login'] = TRUE;

}
else {
	$_SESSION['login'] = FALSE;
}
?>

<!DOCTYPE HTML>
<h1>LOGIN</h1>
<hr/>
<br/>
<br/>
<h3>Autenticação de Usuário</h3>
<hr/>
<form id="login">
	ID: <input type="text" size="20" id="user"/>
	Password: <input type="password" size="20" id="passwd"/>
</form>
<br/>

<hr/>
<br/>
<div id="irOut">
	
</div>