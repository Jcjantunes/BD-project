<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
    <body>
	<h3>Listar os meios de Socorro accionados em processos de socorro originados num dado local de incêndio</h3>
        	<form action="update_listar_meios_local.php" method="post">
			<p>Nome do local de incêndio: <input type="text" name="moradaLocal"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		<?php
		echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>