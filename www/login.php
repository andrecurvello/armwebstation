<?php
session_start();
//Carregando o banco de dados...
$db = new PDO('sqlite:./db/login.sqlite');
$users = $db->query('SELECT * FROM users');

if($_SESSION['login'] == FALSE)
	{
?>
<!DOCTYPE HTML>
<h1>LOGIN</h1>
<hr/>
<br/>
<br/>
<h3>Autenticação de Usuário</h3>
<hr/>
<br/>
<br/>
<form method="post" action="<? echo $_SERVER['PHP_SELF']; ?>" id="login">
	ID: <input type="text" size="20" name="user"/>
	Password: <input type="password" size="20" name="passwd"/> 
	<input type="submit" name="submit" value="Submit"/><br/>
</form>
<? }	
if(isset($_POST['submit'])){
	if(isset($_POST['user']) && isset($_POST['passwd'])){
		$user = $_POST['user'];
		$passwd = $_POST['passwd'];
		foreach ($users as $row) {
			if($user == $row['name'] && $passwd == $row['password']){
				$_SESSION['login'] = TRUE;
				$_SESSION['name'] = $row['name'];
				
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://armweb.no-ip.org">';  
				
			} else {
				$$_SESSION['login'] = FALSE;
				echo "Falha no login! Tente novamente!";
			}
		}
	} else
		$_SESSION['login'] = FALSE;

}

if(isset($_GET['logout']) && ($_SESSION['login'] = TRUE)){
	session_destroy();
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://armweb.no-ip.org">';  
	
}
?>


