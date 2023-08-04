<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
	
    <body>
    <h3>Remover processo de socorro</h3>	
        <form action="update_remover_processo.php" method="post">
			<p>Número do processo de socorro: <input type="text" name="numProcesso"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>