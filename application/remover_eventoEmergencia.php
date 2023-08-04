<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
	<h3>Remover Evento de Emergência</h3>
    <body>
    	
        <form action="update_remover_eventoEmergencia.php" method="post">
			<p>Número de telefone do Evento de Emergência: <input type="text" name="numTelefone"/></p>
			<p>Instante da chamada do Evento de Emergência: <input type="text" name="instanteChamada"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>