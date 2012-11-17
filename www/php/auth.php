<?php

//Carregando o banco de dados...
$db = new PDO('sqlite:/www/db/login.sqlite');
$users = $db->query('SELECT * FROM users');


session_start();

if(isset($_POST['submit'])){
	if(isset($_POST['user']) && isset($_POST['passwd'])){
		$user = $_POST['user'];
		$passwd = $_POST['passwd'];
		foreach ($users as $row) {
			if($user == $row['name'] && $passwd == $row['password']){
				$_SESSION['login'] = true;
				$_SESSION['name'] = $row['name'];
				
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://armweb.no-ip.org">';  
				
			} else {
				$_SESSION['login'] = false;
				echo "Falha no login! Tente novamente!";
			}
		}
	}
}

if(isset($_GET['logout']) && ($_SESSION['login'] = true)){
	session_destroy();
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://armweb.no-ip.org">';  
	
}
?>