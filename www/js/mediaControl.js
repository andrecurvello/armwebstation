var volume=50; //Obter volume via get de sessão?
var status;

function play(file){
	$.get("php/mplayer.php?play="+file);	
}

function playVideo(file,type){
	$.get("php/mplayer.php?play="+file+"&out="+type);
}

function stop(){
	$.get("php/mplayer.php?stop");
}


function pause(){
	$.get("php/mplayer.php?pause");
}

function next(){
	$.get("php/mplayer.php?nxt");
}


function prev(){
	$.get("php/mplayer.php?prv");
}

function volumeUp(){
	if(volume === 100){
		volume = 100;
		$.get("php/mplayer.php?vol=up&u="+volume);
		$('#volume').html(volume);
	} 
	else {
	volume+=10;
	$.get("php/mplayer.php?vol=up&u="+volume);
	$('#volume').html(volume);
	}
	//Mudar status do volume no p id.
}

function volumeDown(){
	if(volume === 0){
		volume = 0;
		$.get("php/mplayer.php?vol=dw&u="+volume);
		$('#volume').html(volume);
	}else{
	volume-=10;
	$.get("php/mplayer.php?vol=dw&u="+volume);
	$('#volume').html(volume);
	}
	//Mudar status do volume no p id.
}

function mute(){
	$.get("php/mplayer.php?mute");
}

function killMP(){
	$.get("php/status.php?killMP")/
}

