<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
	</head>

	<body>

	<h3>Remover Meio</h3>
	
	<?php

	$numMeio = $_REQUEST['numMeio'];
	$nomeEntidade = $_REQUEST['nomeEntidade'];

	
	try {
		$host = "db.ist.utl.pt";
		$user ="ist187668";
    	$password = "1234";
		$dbname = $user;
		

		$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$db->beginTransaction();

		$sql = "DELETE FROM meio WHERE numMeio = $numMeio AND nomeEntidade = ('$nomeEntidade');";
		$result = $db->prepare($sql);
		$result->execute();


		$db->commit();

		echo("Meio com o numero $numMeio e a entidade $nomeEntidade removido com sucesso.");
		
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
