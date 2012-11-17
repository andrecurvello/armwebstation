<?php
//Abertura do banco de dados RF, responsável pela persistência dos dados dos endereços IPs das máquinas RF.
$db = new PDO('sqlite:../db/rf.sqlite');

//Definição do programa utilizado para requisições GET/POST
$cmd = "curl";

//Obtenção das máquinas que irão enviar/receber os dados RF.
#Máquina 1 - Envia
$query = $db->query('SELECT machine1,machine2 FROM rf');
$machines = $query->fetch();
$machine1 = $machines['machine1'];
$machine2 = $machines['machine2'];

if(isset($_GET['mach']) && isset($_GET['msg']) && !isset($_GET['hist'])){
	$emissor = $_GET['mach'];
		if($emissor == "1"){
			$machine = $machine1;
		} else if($emissor == "2"){
			$machine = $machine2;
		}
	//Obtenção da variável msg do tipo GET.
	$msg = $_GET['msg'];
	$msg = str_replace(" ", "%20",$msg);
	//Tratamento dos caracteres de escape
	//Organizando a URL de comando.
	$sendCmd = "$machine/Transfer/rf.php?msg=\"$msg\"";
	//$sendCmd = escapeshellarg($sendCmd);
	//Organizando o
	// comando shell
	$cmdMsg = "$cmd $sendCmd";
	//Aplicando o comando e gravando o resultado em $result
	$result = shell_exec($cmdMsg);
	//Retornando o resultado ao usuário.
	echo "$machine: $result";
	
}

if(isset($_GET['mach']) && isset($_GET['hist']) && !isset($_GET['msg'])){
	
	$receptor = $_GET['mach'];
	
	if($receptor == "1"){
		$machine = $machine1;
	} else if ($receptor == "2"){
		$machine = $machine2;
	} 
	$histCmd = "$machine/Transfer/rf.php?hist=1";
	
	$cmdMsg = "$cmd $histCmd";
	sleep(4);
	$hist = shell_exec($cmdMsg);
	echo "$machine: $hist";

//http://143.107.235.53/Transfer/rf.php?hist

//http://143.107.235.51/Transfer/rf.php?msg=%22E%20ae%20pessoal,%20joinha?????%22
}
?>