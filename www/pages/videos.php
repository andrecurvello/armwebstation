<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
  <script type="text/javascript">
  //Carrega o diretório principal
  	$(document).ready(function(){
  		
  		$.get("php/foldernav.php?vd&chdir=/sdcard/videos", function(data){
  			$('#folder').html(data);
  		});
  		
  	});
  	
  </script>  

	<hr/>
	<h2>Vídeos</h2>
	<hr/>
	<div id="outputControl">
	<h2>Seleção de Saída de Vídeo:</h2>
		<select name="Saída" id="out">
			<option id="tv">TV</option>
			<option id="lcd">LCD</option>
			<option id="tvlcd">TV-LCD</option>
		</select>
	</div>
	
	<div id="folder">
		
	</div>