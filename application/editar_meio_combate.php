<html>
	<head>
		<meta charset="UTF-8">
		<title>Projecto 3</title>
	</head>
	<h3>Editar Meio</h3>
    <body>
        <form action="update_editar_meio_combate.php" method="post">
			<p>Número do Meio: <input type="text" name="numMeio"/></p>
			<p>Nome da Entidade: <input type="text" name="nomeEntidade"/></p>
			<p>Novo nome do Meio: <input type="text" name="nomeMeio"/></p>

			<p>Definir meio como meio de:</p>
			<p>Meio de Apoio <input type='checkbox' name='type[meioApoio]' value='meioApoio'/></p>
			<p>Meio de Socorro <input type='checkbox' name='type[meioSocorro]' value='meioSocorro'/></p>
			<p><input type="submit" value="submit"/></p>
		</form>


		<?php
			echo "<a href=\"index.html\"> Voltar</a>\n";
		?>
    </body>
</html>