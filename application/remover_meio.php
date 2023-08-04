<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
	
    <body>
    <h3>Remover Meio</h3>	
        <form action="update_remover_meio.php" method="post">
			<p>Número do meio: <input type="text" name="numMeio"/></p>
			<p>Nome da Entidade do meio: <input type="text" name="nomeEntidade"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>