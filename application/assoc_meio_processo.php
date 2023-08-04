<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
	<h3>Associar Processo de socorro a um meio</h3>
    <body>
        	<form action="update_assoc_meio_processo.php" method="post">
			<p>Numero do Meio: <input type="text" name="numMeio"/></p>
			<p>Nome da Entidade: <input type="text" name="nomeEntidade"/></p>
			<p>Numero do processo socorro: <input type="text" name="numProcessoSocorro"/></p>
			<p><input type="submit" value="submit"/></p>
		</form>

		  <?php
echo "<a href=\"index.html\"> Voltar</a>\n";
?>
    </body>
</html>