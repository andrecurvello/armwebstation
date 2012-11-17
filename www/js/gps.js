var gpsTime;

function getGpsData(){
	switch ($("select#gpsType").val()){
		case 1:
		
			break;
		case 2:
		
			break;
		
		case 3:
		
			break;
		
		case 4:
		
			break;
		case 5:
		
			break;
		default:
	}
	
}

function gpsPosition(){
	$.get("php/gps.php?pos",function(gps){
		$('#gpsPos').html(gps);
	});
	
}

function startGps(){
	gpsTime = setInterval(getGpsData(),1000);	
}

function stopGps(){
	clearInterval(gpsTime);	
}

function getGpsFile(type,time){
	$.get("php/gps.php?type="+type+"&time="+time+"&file",function(retData){
		
	});
}

function getGpsFile(type){
	$.get("php/gps.php?type="+type+"&time="+time+"&file",function(retData){
		
	});
}

function aviso(){
	alert("O tempo de resposta pode demorar, tenha paciência!");
}
