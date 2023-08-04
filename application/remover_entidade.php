<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
	
    <body>
    <h3>Remover Entidade</h3>	
        <form action="update_remover_entidade.php" method="post">
			<p>Nome da entidade: <input type="text" name="nomeEntidade"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>