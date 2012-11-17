<?php
session_start();
if($_SESSION['login'] == false){
	echo "<h3>É necessário estar autenticado no sistema para ver este conteúdo!</h3>";
} else {
	if($_SESSION['name'] == "admin"){
?>		
		<h2>Controle de Usuários</h2>
		<hr/>
		
		<table>
			<tr>
			<form method="post" action="pages/users.php">
			<input type="submit" value="Cadastrar Usuário" name="cadastro"/>
			</form>
			</tr>
			<tr>
			<form method="post" action="pages/users.php">
			<input type="submit" value="Listar Usuários" name="listar"/>
			</form>
			</tr>
			<tr>
			<form method="post" action="pages/users.php">
			<input type="submit" value="Remover Usuários" name="remove"/>
			</form>
			</tr>
		</table>

<?php
if(isset($_POST['cadastro'])){
	?>
<div id="cadastroUser">
		<form id="insertUser" method="post" action="">
			<table>
				<tr><td>Nome:</td><td><input type="text" name="name" id="name"/></td></tr>
				<tr><td>Senha:</td><td><input type="text" name="senha" id="senha"/></td></tr>
				<tr><td>E-Mail:</td><td><input type="email" name="email" id="email"/></td></tr>
			</table> 
		<input type="submit" name="insertSubmit" value="Submit"/>
		</form>
</div>
<?
}


?>
<div id="listUsers">
	
	
</div>
	
<?
//Verificar possibilidade de usar include para facilitar layout.
if(isset($_POST['listar'])){
		try{
		$db = new PDO('sqlite:/www/db/login.sqlite');
	    print "<table border=1>";
	    print "<tr><td>Id</td><td>Nome</td><td>Email</td></tr>";
	    $result = $db->query('SELECT * FROM users');
	    foreach($result as $row)
	    {
	      print "<tr><td>".$row['Id']."</td>";
	      print "<td>".$row['name']."</td>";
	      print "<td>".$row['email']."</td>";
	    }
	    print "</table>";
	
	    // close the database connection
	    $db = NULL;
	  }
	  catch(PDOException $e){
	    print 'Exception : '.$e->getMessage();
	  	}
	}

?>	
	
<?		
	} 
	
	else
		echo "<h3>É necessário estar autenticado como administrador!</h3>";
	
?>
<?
} 
?>