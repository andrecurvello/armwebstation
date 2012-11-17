var tempId;
var intervalTemp=0;
function loadTemp(type){
	
	//Ver uso e aplicação de switch em JavaScript
	
	if(type === "c"){
	$.get("php/temp.php?temp=C", function(temp){		
		$('#temp').html(temp + " °C");});
	} 
	else if(type ==="f"){
	$.get("php/temp.php?temp=F", function(temp){	
		$('#temp').html(temp + " °F");});	
	} else if (type === "k") {
			$.get("php/temp.php?temp=K", function(temp){	
		$('#temp').html(temp + " K");});
	}


}

function loadTempPG(type){
	
	if(type === "c"){
	$.get("php/temp.php?temp=C", function(temp){		
		$('#tempDiv').html("<h3 style=\"color:blue;\">"+temp+" °C</h3>");});
	} 
	else if(type === "f"){
	$.get("php/temp.php?temp=F", function(temp){	
		$('#tempDiv').html("<h3 style=\"color:blue;\">"+temp+" °F</h3>");});	
	} else if (type === "k") {
			$.get("php/temp.php?temp=K", function(temp){	
		$('#tempDiv').html("<h3 style=\"color:blue;\">"+temp+" K</h3>");});
	}
}

function changeTemp(type){
	clearInterval(tempId);
	if(type === "1"){
		loadTempPG("c");
	}
	if(type === "2"){
		loadTempPG("f");
	}
	if(type === "3"){
		loadTempPG("k");
	}
	else ;
}

function loadTempAll(type){
	intervalTemp = intervalTemp+1;
	//Definindo 10 amostrar na div de saída.
	if (intervalTemp === 10){
		intervalTemp=0;
		$('#tempData').empty();
	}
	
	if(type === "c"){
	$.get("php/temp.php?temp=C", function(temp){		
		$('#tempDiv').html("<h3 style=\"color:blue;\">"+temp+" °C</h3>");
		$('#tempData').append("<p style=\"text-align:center;\">"+temp+" °C</p>");}
		);
	} 
	else if(type === "f"){
	$.get("php/temp.php?temp=F", function(temp){	
		$('#tempDiv').html("<h3 style=\"color:blue;\">"+temp+" °F</h3>");
		$('#tempData').append("<p style=\"text-align:center;\">"+temp+" °F</p>");}
		);	
	} else if (type === "k") {
		$.get("php/temp.php?temp=K", function(temp){	
		$('#tempDiv').html("<h3 style=\"color:blue;\">"+temp+" K</h3>");
		$('#tempData').append("<p style=\"text-align:center;\">"+temp+" K</p>");}
		);
	}
}



function startTemp(type){
	//Limpa a Div de Relatorio
	$('#tempData').empty();
	
	clearInterval(tempId);
	
	//Avalia cada tipo de temperatura e faz os requests no dado tempo.
	if(type === "1"){
	tempId = setInterval("loadTempAll(\"c\")",5000);
	}
	if(type === "2"){
	tempId = setInterval("loadTempAll(\"f\")",5000);
	}
	if(type === "3"){
	tempId = setInterval("loadTempAll(\"k\")",5000);
	}
	else ;
}

//Função para parar os requests Ajax.
function stopTemp(){
	clearInterval(tempId);
}