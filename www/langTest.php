<?php
session_start();

if(isset($_GET['lang'])){
	$lang=$_GET['lang'];
	
	if($lang=="pt")
		$_SESSION['lang']="pt";
	else if($lang="eng")
		$_SESSION['lang']="eng";
}
?>
<html>
<head>
</head>
<body>
<a href="temp.php?lang=pt">PT</a>
<a href="temp.php?lang=eng">ENG</a>
<br/>
<br/>
<?php
if($_SESSION['lang']=="pt"){
	echo "Ola mundo em pt!";
} else if ($_SESSION['lang']=="eng"){
	echo "Hello world in english!";
}?>
</body>

</html>
