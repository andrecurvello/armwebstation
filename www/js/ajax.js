var interval=0;

function loadPage(page){
	
	$('#content').load(page, function(){
		$.getScript("js/ajax.js");
		$.getScript("js/mediaControl.js");
		$.getScript("js/jquery-1.7.2.min.js");
	});
	
}

function setLang(language){
	if(language==="pt"){
		$.get("index.php?pt");
	} else if (language ==="eng"){
		$.get("index.php?eng");
	}
	
}


function startStream(){
	$.get("php/status.php?m_up");
	setTimeout(loadStatus,2000);
}

function stopStream(){
	$.get("php/status.php?m_down");	
	setTimeout(loadStatus,1500);	
}


function chdir(dir,type){
	
	if(type === "md"){
			$.get("php/foldernav.php?md&chdir="+dir, function(dir){
	$('#folder').html(dir);});
	}
	else if(type ==="img"){
			$.get("php/foldernav.php?img&chdir="+dir, function(dir){
	$('#folder').html(dir);});
	}
	else if(type ==="vd"){
			$.get("php/foldernav.php?vd&chdir="+dir, function(dir){
	$('#folder').html(dir);});
	}
	
}




function clock(){
	//Ver modelo de relogio para colocar. Obter tempo do servidor em AJAX.
	
}

function date(){
	
	
}


function loadStatus(){
	$.get("php/status.php?mjpgs", function(status){
	$('#statusServer').html(status);});
}

function mpStatus(){
	$.get("php/status.php?mpstatus", function(mpstatus){
		$('#mpStatus').html(mpstatus);
	});
}

function currentPlaying(){
	$.get("php/status.php?current", function(current){
		$('#currMedia').html(current);
	});
}

function getCpuLoad(){
	$.get("php/status.php?cpuload",function(cpuload){
		$('#cpuload').html(cpuload);
	});
}


function message(mensagem){
	$.get("php/mensagem.php?msg="+mensagem , function(retData){
		
	});
	
}

//Para lidar com valores de selects:
//$("select#title").val();
//em que title é o id, e val() eh o selecionado.

function snapShot(type){
	$.get("php/camCapture.php?cap&type="+type);
	//carregando...
	//setTimeout("$('#camera').load(\"webcamlink.php\")",4000);
	//$('#camera').load("webcam.php?start");
}

function getLastPic(){
	$.get("php/camCapture.php?last", function(picture){
		//alert(picture); //width=200,height=100
	myWindow=window.open("/pictures/"+picture);
	//myWindow.document.write("<p>"+picture+"</p>");
	myWindow.focus();
	});
}
function delLastPic(){
	$.get("php/camCapture.php?delLast,", function(retValue){
		//Funcao de retorno. Gera janela de aviso com confirmacao de imagem deletada...
		alert("Deseja realmente remover a foto: "+retValue+" ?");
	});
}

function initAjax(){
		setInterval('loadTemp("c")',5000);
		setInterval(loadStatus,5000);
		setInterval(mpStatus,5000);
		setInterval(getCpuLoad,1000);
}

function startVideo(type){
	$.get("php/mplayer?camOut="+type);
}

function formatData(type){
	var pass = prompt("Os dados do tipo "+type+" serão formatados! Digite a senha:");
	$.get("/php/status.php?format="+type+"&pass="+pass);
}

function restartSystem(){
    var pass = prompt("O sistema será reiniciado. Insira a senha: ");
	$.get("/php/status.php?reset="+pass);
}


function sendEmail(name,mail,tel,msg){
	
	//.replace(/\r\n|\r|\n/g,"\n");
	var message = msg.replace(/\r\n|\r|\n/g,"\n");
	$.get("/php/mail.php?nomeCtc="+name+"&mailCtc="+mail+"&telCtc="+tel+"&message="+message,function(status){
		//if(status === "1"){
		//	alert("Email enviado com sucesso!");
		//}
	});
}

function startQtopia(){
	$.get("/php/status.php?startQtopia",function(status){
		
	});
}

function stopQtopia(){
	$.get("php/status.php?stopQtopia",function(status){
		
	});
}

function lcdOn(){
	$.get("php/status.php?lcdon",function(status){
		
	});
}

function lcdOff(){
	$.get("php/status.php?lcdoff",function(status){
		
	});
}

function backLightOn(){
	$.get("php/status.php?backon",function(status){
	
	})
}

function backLightOff(){
	$.get("php/status.php?backoff",function(status){
		
	});
}