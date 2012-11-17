<html>
<head>

<html>
<head>

<title><?php system("hostname"); ?> - Server Information</title>

</head>
<body>

<center>

<h1>Raspberry Pi Information</h1>
<div align="left">
 <pre>
 
 <h2>Uptime:</h2>
 <?php system("uptime"); ?>
 
 <h2>System Information:</h2>
 <?php system("uname -a"); ?>
 
 
 <h2>Memory Usage (MB):</h2>
 <?php system("free -m"); ?>
 
 
 <h2>Disk Usage:</h2>
 <?php system("df -h"); ?>
 
 
 <h2>CPU Information:</h2>
 <?php system("cat /proc/cpuinfo | grep \"model name\\|processor\""); ?>
 <?php system("cat /proc/cpuinfo | grep \"BogoMIPS\\|BogoMips\""); ?>
 
 <h2>CPU usage:</h2> 
 <?php system("top -b -n1");?>
 <?php 
 $cpu = shell_exec("top -b -n1 | grep CPU:");
 $vetCpu = "";
 ?>
 </align>
 </pre>
 </div>
 </div>
