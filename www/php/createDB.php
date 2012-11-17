<?php

#Organização das variáveis a serem primeiramente inseridas no Banco de Dados:
$root = "admin";
$password = "admin";
$email = "tiny6410@gmail.com";
$machine1 = "143.107.235.53";
$machine2 = "143.107.235.51";
$tempDefault = "C";
$timerCamera = 30;

  try
    {
       //Iniciando as bases de dados.
       $db1 = new PDO('sqlite:../db/admin.sqlite');
	   $db2 = new PDO('sqlite:../db/rf.sqlite');
	   $db3 = new PDO('sqlite:../db/login.sqlite');
          
       //Criando as bases de dados
       $db1->exec("CREATE TABLE IF NOT EXISTS admin (Id INTEGER PRIMARY KEY, temperature TEXT, timerCamera INTEGER, )");  
	   $db2->exec("CREATE TABLE IF NOT EXISTS rf (Id INTEGER PRIMARY KEY, machine1 TEXT, machine2 TEXT)");
	   $db3->exec("CREATE TABLE IF NOT EXISTS users (Id INTEGER PRIMARY KEY, name TEXT, password TEXT, email TEXT)");  
                    
					//http://143.107.235.53/Transfer/rf.php?hist

//http://143.107.235.51/Transfer/rf.php?msg=%22E%20ae%20pessoal,%20joinha?????%22
       //Inserindo os dados iniciais
       $db1->exec("INSERT INTO admin (temperature,timerCamera) VALUES ('$tempDefault','$timerCamera');");
       $db2->exec("INSERT INTO rf (machine1,machine2) VALUES ('$machine1','$machine2');");
       $db3->exec("INSERT INTO users (name,password,email) VALUES ('$root','$password','$email');");
	   
	   
	   #Fechar a conexão com o banco de dados.
	   $db = NULL;
	   } catch(PDOException $e)
		{
		print 'Exception : '.$e->getMessage();
		}
                                                         
/*       //now output the data to a simple html table...
       print "<table border=1>";
       print "<tr><td>Id</td><td>Breed</td><td>Name</td><td>Age</td></tr>";
       $result = $db->query('SELECT * FROM Dogs' );
		foreach($result as $row)
		{
		print "
		<tr>
		<td>".$row['Id']."</td>";
		print "<td>".$row['Breed']."</td>";
		print "<td>".$row['Name']."</td>";
		print "<td>".$row['Age']."</td>
		</tr>";
		}
		print "</table>";

		// close the database connection
		$db = NULL;
		}
		catch(PDOException $e)
		{
		print 'Exception : '.$e->getMessage();
		}*/
?>
