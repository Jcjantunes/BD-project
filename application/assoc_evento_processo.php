<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
	<h3>Associar Processo de socorro a um Evento de Emergencia</h3>
    <body>
        	<form action="update_assoc_evento_processo.php" method="post">
			<p>numTelefone: <input type="text" name="numTelefone"/></p>
			<p>instanteChamada: <input type="text" name="instanteChamada"/></p>
			<p>Numero do processo socorro: <input type="text" name="numProcessoSocorro"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		  <?php
echo "<a href=\"index.html\"> Voltar</a>\n";
?>
    </body>
</html>