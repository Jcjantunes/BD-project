<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
    <body>
		<h3>Remover Meio de Socorro</h3>
        <form action="update_remover_meio_socorro.php" method="post">
			<p>Numero do meio de combate: <input type="text" name="numMeio"/></p>
			<p>Nome de entidade do meio de combate: <input type="text" name="nomeEntidade"/></p>
			<p><input name="submit" input type="submit" value="submit"/></p>
		</form>

		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>