<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
    <body>
	<h3>Inserir Meio de Apoio</h3>
        	<form action="update_inserir_meioApoio.php" method="post">
			<p>Número do Meio: <input type="text" name="numMeio"/></p>
			<p>Nome do Meio: <input type="text" name="nomeMeio"/></p>
			<p>Nome da Entidade: <input type="text" name="nomeEntidade"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>