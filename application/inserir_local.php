<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>

    <body>
    	<h3>Inserir local</h3>
        <form action="update_inserir_local.php" method="post">
			<p>Nome do novo local: <input type="text" name="moradaLocal"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>