<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
    <body>
		<h3>Remover local</h3>
        <form action="update_remover_local.php" method="post">
			<p>Nome do local: <input type="text" name="moradaLocal"/></p>
			<p><input name="submit" input type="submit" value="submit"/></p>
		</form>

		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>