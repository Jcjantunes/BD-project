<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
    <body>
	<h3>Listar os Meios accionados num Processo de Socorro</h3>
        	<form action="update_listar_meios_accionados.php" method="post">
			<p>Número do Processo de Socorro: <input type="text" name="numProcessoSocorro"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>