<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
</head>
<h3>Remover meio apoio</h3>
<body>
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

		$sql = "DELETE FROM meioApoio WHERE numMeio=$numMeio AND nomeEntidade = '$nomeEntidade';";

		$result = $db->prepare($sql);
		$result->execute();


		$sql1 = "SELECT * FROM meioCombate WHERE numMeio = $numMeio AND nomeEntidade = '$nomeEntidade';";
		$result1 = $db->prepare($sql1);
		$result1->execute();

		$sql2 = "SELECT * FROM meioSocorro WHERE numMeio = $numMeio AND nomeEntidade = '$nomeEntidade';";
		$result2 = $db->prepare($sql2);
		$result2->execute();

		if ($result1->rowCount() == 0 && $result2->rowCount() == 0) {

			$sql3 = "DELETE FROM meio WHERE numMeio = $numMeio AND nomeEntidade = ('$nomeEntidade');";
			$result3 = $db->prepare($sql3);
			$result3->execute();

		}

		$result = $db->prepare($sql);
		$result->execute();

		$db->commit();


		echo("Meio de Apoio com numero de meio $numMeio e nome de entidade = $nomeEntidade removido com sucesso");

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
