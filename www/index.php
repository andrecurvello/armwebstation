<?php 
session_start();
include '/www/php/variables.php';
if (isset($_GET['pt']))
	$_SESSION['lang'] = "pt";
else if (isset($_GET['eng']))
	$_SESSION['lang'] = "eng";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title>Arm Web Media Station</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!--[if IE 6]>
    <link rel="stylesheet" href="fix.css" type="text/css" />
    <![endif]-->
   	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/rf.js"></script>
    <script type="text/javascript" src="js/gps.js"></script>
    <script type="text/javascript" src="js/temp.js"></script>
  	<script type="text/javascript" src="js/mediaControl.js"></script>
  
  <script type="text/javascript">
  	$(document).ready(function(){
		loadStatus();
		getCpuLoad();
		loadTemp("c");
		mpStatus();
		initAjax();  		
  	});  	
  </script>
  
  </head>

  <body>
    <div id="sidebar" align="center">
    <div align="left"><a href="./?l=pt" id="pt">  Português</a>
    <a href="./?l=eng" id="eng">  English</a><br/>
    <? if (isset($_SESSION['login'])){
	    	echo "<br/>".$_SESSION['name'];
			echo "<br/><a href=\"/php/auth.php?logout\">Logout</a>";
	    } else {
	        echo "<a href=\"./?p=login\" id=\"login\">Login</a>";
	    }
    
    ?>
    </div>
      <h1>ARM WEB MEDIA STATION</h1>
      <h2> <? echo $nomePT; ?>
      	
      	</h2>

      <div id="menu" align="center">
        <a class="active" href=<? echo "./?p=home";?> ><? echo $Home;?></a>
        <a href=<? echo "./?p=musicas";?>><? echo $Musicas;?></a>
        <a href=<? echo "./?p=videos";?> ><? echo $Videos;?></a>
        <a href=<? echo "./?p=camera";?> ><? echo $Camera;?></a>
        <a href=<? echo "./?p=images";?> ><? echo $Imagens;?></a>
        <a href=<? echo "./?p=gps";?> ><? echo $GPS;?></a>
        <a href=<? echo "./?p=temp";?> ><? echo $Temp;?></a>
        <a href=<? echo "./?p=rf";?> ><? echo $RF;?></a>
        <a href=<? echo "./?p=message";?> ><? echo $Mensagem;?></a>
        <a href=<? echo "./?p=docs";?> ><? echo $Docs;?></a>
        <a href=<? echo "./?p=admin";?> ><? echo $Admin;?></a>
        <a href=<? echo "./?p=about";?> ><? echo $Sobre;?></a>
       	<a href=<? echo "./?p=contact";?> ><? echo $Contato; ?></a>
      </div>

      <h3 style="text-align: center;">Versão</h3>
      <p style="text-align: center;">v3.5 (Oct 13, 2012)</p>
    </div>

    <div id="content" align="center">
 	<?php
	if(!isset($_GET['p'])){
		include('pages/home.php');
	} else
	include('pages/'.$_GET['p'].'.php');

	?>
    </div>
    
    <div id="control" align="center">
	<table>
		<tr>
			<td>Temperatura Local:</td><td id="temp"></td>
		</tr>
	</table>
    	<hr/>
    	<h1>Status</h1>
    	<hr/>
    <div id="cpuReport">
    	Carga da CPU
    	<p id="cpuload"></p>
    </div>	
    	<hr />
    <div id="status">
    	 MJPEG Stream Status:
    <br/>
    <p id="statusServer"></p>	
    
    </div>	
    	
    <hr/>
    <div id="mediaControl" align="center">
    <h2>Controle</h2>
    <table>
    	<tr>
    		<td><input type="button" value="Play" onclick="play();"/></td>
    		<td><input type="button" value="Pause" onclick="pause();"/></td>
   			<td><input type="button" value="Stop" onclick="stop();"/></td>
    	</tr>
    	<tr>
    		<td><input type="button" value="Next" onclick="next();"/></td>	
    		<td><input type="button" value="Prev" onclick="prev();"/></td>	
    	</tr>
    	<tr>
    		<td><input type="button" value="Vol+" onclick="volumeUp();"/></td>
    	</tr>
    	<tr>
    		<td>Volume:</td><td><p id="volume">50</p></td>
    	</tr>
    	<tr>
    		<td><input type="button" value="Vol-" onclick="volumeDown();"/></td>
    	</tr>
    	<tr>
    		<td><input type="button" value="Mute" onclick="mute()"/></td>
    	</tr>    	
	</table>
	<hr/>
	</div>
	
	<div id="current" style="text-align: center;">
		<h2>Mídia em Execução</h2>
		<div id="mpStatus"></div>	
		<div id="currMedia"></div>
	</div>
	
    </div>
    
    <div id="footer" align="center">
    	Universidade de São Paulo - Escola de Engenharia de São Carlos
    </div>
    </body>
</html>
