<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
    <body>
	<h3>Inserir Processo de Socorro</h3>
        	<form action="update_inserir_processo.php" method="post">
			<p>Número do Processo de Socorro: <input type="text" name="numProcessoSocorro"/></p>
			<p>Número de Telefone: <input type="text" name="numTelefone"/></p>
			<p>Instante de Chamada: <input type="text" name="instanteChamada"/></p>
			<p>Morada Local: <input type="text" name="moradaLocal"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>