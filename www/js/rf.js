function sendRf(emissor,txt){
	var message = txt.replace(/\r\n|\r|\n/g," ");
	$.get("php/rf.php?mach="+emissor+"&msg="+message,function(result){
		$('#tempData').html(result);
	});
}



// function sendRf(emissor,txt){
 // var msg = txt.replace(/\r\n|\r|\n/g,"\n");
	// $.get("php/rf.php?mach="+emissor+"&msg="+msg,function(result){
		// alert(result);
	// });
// }

function receiveRf(receptor){
	$.get("php/rf.php?mach="+receptor+"&hist=1",function(hist){
		$('#tempData').html(hist);
});
}

function countChars(size) {
     var l = size;
     var str = document.getElementById("textArea").value;
     var len = str.length;
     if(len <= l) {
          document.getElementById("txtLen").value=l-len;
     } else {
          document.getElementById("textArea").value=str.substr(0, 140);
     }
}