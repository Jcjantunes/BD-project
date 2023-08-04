<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
	</head>

	<body>

	<h3>Remover Entidade</h3>
	
	<?php

	$nomeEntidade = $_REQUEST['nomeEntidade'];

	
	try {
		$host = "db.ist.utl.pt";
		$user ="ist187668";
    	$password = "1234";
		$dbname = $user;
		

		$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$db->beginTransaction();

		$sql = "DELETE FROM entidademeio WHERE nomeEntidade = '$nomeEntidade' ;";
		$result = $db->prepare($sql);
		$result->execute();


		$db->commit();

		echo("Entidade com o nome $nomeEntidade removida com sucesso.");
		
		$db = null;
	}
	catch (PDOException $e)
	{
		$db->rollBack();
		echo("<p>ERRO: {$e->getMessage()}</p>");
	}
	?>

	<p><a href="index.html">Voltar</a></p>
</body>
</html>
