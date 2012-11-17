<?php
/*
 * 
 * Colocar aqui variáveis importantes utilizadas?
 */
 
 //$GLOBALS['$dir'] = "";
 $pid = "";
 global $dir;
 
 //------Variáveis para controle do MPlayer
 $mplayer = '/bin/mplayer';
 $file = "/www/files/mplayer.cmd";
 $mpcmd = escapeshellarg($file);
 
 $slave = "-slave -input file=$file";
 $tvout = "-tvout";
 $out = "tvonly"; //Por default, o padrão é tvonly
 
 $status = "/www/files/status.txt";
 
 $geral = "*";
 
 $mjpgFile = '/mjpg-streamer/start_uvc.sh';
 $mjpgFile2 = '/mjpg-streamer/start_uvc2.sh';

 $tempSensor = "/home/plg/TempSensor/tempSensor";
 
 //---- Variáveis para informação do sistema.
 $memFree = "";
 $memUsed = "";
 $memTotal = "";
 
 //Defaul: $lang = pt
 $lang = "pt";
 
 //--------------------------Nome dos menus-----------------------------------//
 $InicialPT = "Inicial";
 $InicialEng = "Home";
 
 $MusicasPT = "Músicas";
 $MusicasEng = "Musics";
 
 $RadioPT = "Rádios";
 $RadioEng = "Radios";
 
 $VideosPT = "Vídeos";
 $VideosEng = "Videos";
 
 $CameraPT = "Câmera";
 $CameraEng = "Camera";
 
 $ImagensPT = "Imagens";
 $ImagensEng = "Images";
 
 $GPS = "GPS";
 
 $InfraPT = "Infravermelho";
 $InfraEng = "Infrared";
 
 $MsgPT = "Mensagem";
 $MsgEng = "Message";
 
 $DocsPT = "Documentos";
 $DocsEng = "Documments";
 
 $AdminPT = "Administração";
 $AdminEng = "Administration";
 
 $SobrePT = "Sobre";
 $SobreEng = "About";
 
 $RFPT = "RF";
 $ContatoPT = "Contato";
 
 $TempPT = "Temperatura";
 
 //---------------------------Setando os Status ------------------------------//
 $tocandoPT = "Tocando ";
 $tocandoEng = "Playing ";
 
 $assistindoPT = "Assistindo ";
 $assistindoEng = "Watching ";
 
 $ouvindoPT = "Ouvindo ";
 $ouvindoEng = "Listening ";
 
 
 //---------------------------Setando os Menus -------------------------------//
  if($lang === "pt"){
 	$Home = $InicialPT;
 	$Musicas = $MusicasPT;
 	$Radios = $RadioPT;
 	$Videos = $VideosPT;
 	$Camera = $CameraPT;
	$Imagens = $ImagensPT;
 	$GPS = $GPS;
 	$Infra = $InfraPT;
 	$Mensagem = $MsgPT;
 	$Docs =  $DocsPT;
 	$Admin = $AdminPT;
 	$Sobre = $SobrePT;
	$Temp = $TempPT;
	$RF = $RFPT;
	$Contato = $ContatoPT;
 }
 
  if($lang === "eng"){
 	$Home = $InicialEng;
 	$Musicas = $MusicasEng;
 	$Radios = $RadioEng;
 	$Videos = $VideosEng;
 	$Camera = $CameraEng;
 	$GPS = $GPS;
 	$Infra = $InfraEng;
 	$Mensagem = $MsgEng;
 	$Docs =  $DocsEng;
 	$Admin = $AdminEng;
 	$Sobre = $SobreEng;
 }
 
 //--------------------------Conteúdos das páginas ---------------------------//
 $nomePT = "Estação de Controle Multimídia Web";
 $nomeEng = "Web Multimedia Control Station Center";
 
 $descricaoPT = "";
 
 $descricaoEng = "";
 

?>