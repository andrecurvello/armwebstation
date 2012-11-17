<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

      <h1>ARM WEB MEDIA STATION</h1>
      <h2>Estação de Controle Multimídia Web</h2>

      <h3>Descrição</h3>
      <p>Este é um projeto de Tese de Conclusão de Curso, que visa estudar e desenvolver componentes web e multimídia em cima de uma plataforma ARM, executando sistema operacional GNU/Linux embarcado. Serão estudados componentes que permitam o controle da execução de vídeos e músiscas através da web, a exibição destes conteúdos no display LCD e em televisores e caixas de som, além de componentes como GPS, sensor de temperatura e infravermelho, com a exibição das informações obtidas através da web.</p>
      <p>A idéia por trás deste projeto resite na crescente demanda por equipamentos computacionais que tenham um consumo energético reduzido, o que tem sido muito bem alcançado com a arquitetura de microprocessadores ARM. Além disso, foi possível demonstrar que um equipamento pequeno e razoavelmente barato é capaz de ficar ligado continuamente por dias, data a robustez do sistema operacional GNU/Linux, além de ser também capaz de operar recursos computacionais mais trabalhosos, como o controle de conteúdo multimídia e o controle de <i>streaming</i> de vídeo pela <i>web</i>.</i></p>
 
 <div id="about" style="text-align: center">
 	 <h4>Inicial:</h4> 
 	 <p>É a página inicial do sistema. Possui uma breve apresentação geral. </p>
     <h4>Músicas:</h4> 
     <p> Esta parte lida com o controle de execução e seleção de músicas no sistema. As pastas são exibidas na cor Azul, e as músicas, na cor Preta. </p
     <p>Basta clicar na pasta, para acessar o conteúdo da pasta. E basta clicar na música, que a mesma será executada.</p>
     <p> Vale lembrar que a execução de música se dá no local aonde as caixas de som conectadas à placa estão.</p>
     <h4>Vídeos:</h4> 
     <p> Esta parte lida com o controle de execução e seleção de vídeos no sistema, o que envolve não somente as mídias de vídeo, mas também a forma como serão exibidos.</p>
     <p> As pastas serão exibidas na cor Azul, e os arquivos de vídeo, em cor Preta. Basta clicar na pasta para acessá-la, e nos arquivos, para executá-los.</p>
     <p> A seleção da saída de vídeo se dá pelo seletor localizado na parte superior desta página. Este seletor só funciona para videos executados após a sua seleção.</p>
     <p> Ou seja, se você quiser mostrar um vídeo na TV, selecione TV e clique no vídeo.</p>
     <h4>Câmera:</h4> 
     <p> Esta é a parte de exibição dos streams de vídeo das câmeras USB acopladas à Tiny6410 do Laboratório da Elétrica e à SAM9-... do Laboratório de Aplicações...</p>
     <p> É possível ver os streams de ambas as câmeras, mas somente é possível controlar a Câmera 1, com relação aos recursos de fotografia.</p>
     <p> Para tirar uma foto, selecione o Filtro, colorido ou preto e branco, e clique no botão tirar foto. O stream será pausado, e a foto será tirada.</p>
     <p> Na maioria dos casos, é necessário atualizar a página para o stream da câmera 1 retornar ao normal.</p>
     <h4>Imagens:</h4> 
     <p> </p>
     <h4>GPS:</h4> 
     <p> </p>
     <h4>Temperatura:</h4>
     <p> Mostra a temperatura local, permite mostrar a temperatura em formatos diferentes, tais como Kelvin e Fahrenheit, e é capaz de gerar simples arquivos de relatórios de temperatura.</p> 
     <h4>RF:</h4> 
     <p> É uma parte ainda experimental, mas que cuida de demonstrar a capacidade de utilizar serviços externos...</p>
     <h4>Mensagem:</h4> 
     <p> </p>
     <h4>Documentos:</h4> 
     <p> Esta parte cuida de citar links, documentos, fontes e referências bibliográficas diversas, capazes de auxiliar bastante no desenvolvimento de soluções e sistemas Linux Embarcados.</p>
     <h4>Administração:</h4> 
     <p> É a parte que cuida de mostrar os dados técnicos da estação, além de possuir controles para paralisar ou iniciar o stream da câmera de vídeo, além de permitir ligar ou desligar o display LCD e o backlight do display </p>
     <p> Também é possível ter controles tais como iniciar e fechar o ambiente QTopia, formatar dados da estação e cadastrar novos usuários no sistema. Mas, para tal acesso, é preciso ter credenciais de administrador.</p>
     <h4>Contato:</h4> 
     <p> É a parte responsável por enviar uma mensagem (e-mail) de contato aos mantenedores do projeto.</p>
 </div>    

     
     <h3>Detalhes dos componentes utilizados:</h3>
	<table id="info">
		<tr>
			<td>FriendlyARM Tiny6410</td><td></td>
		</tr>
		<tr>
			<td>Linux</td><td></td>
		</tr>
		<tr>
			<td>Buildroot</td><td></td>
		</tr>
		<tr>
			<td>MPlayer</td><td></td>
		</tr>
		<tr>
			<td>MJPG Streamer</td><td></td>
		</tr>
		<tr>
			<td>Lighttpd</td><td></td>
		</tr>
		<tr>
			<td>PHP</td><td></td>
		</tr>
		<tr>
			<td>Câmera USB</td><td></td>
		</tr>
		<tr>
			<td>GPS</td><td></td>
		</tr>
		<tr>
			<td>Sensor de Temp.</td><td></td>
		</tr>
	</table>
	<br/>
	<br/>
	<br/>
	<br/>
