<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
  <script type="text/javascript">
  //Carrega o diretório principal
  	$(document).ready(function(){
  		
  		$.get("php/foldernav.php?md&chdir=/sdcard/mp3", function(data){
  			$('#folder').html(data);
  		});
  		
  	});
  	
  </script>  

	<hr/>
	<h2>Músicas</h2>
	<hr/>
	
	<div id="folder">
		
	</div>