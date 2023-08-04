<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
</head>
<h3>Editar nome do Meio</h3>
<body>
	<?php
		$numMeio = $_REQUEST['numMeio'];
		$nomeEntidade = $_REQUEST['nomeEntidade'];
		$nomeMeio = $_REQUEST['nomeMeio'];
		try
		{
			$host = "db.ist.utl.pt";
        	$user ="ist187668";
    		$password = "1234";
        	$dbname = $user;

        	$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			$db->beginTransaction();

			$sql = "UPDATE meio SET nomeMeio = '$nomeMeio' WHERE numMeio = $numMeio AND nomeEntidade = '$nomeEntidade';";

			$result = $db->prepare($sql);
        	$result->execute();

        	if($_POST['type']['meioSocorro'] == 'meioSocorro') {
        		$sql = "INSERT INTO meioSocorro VALUES ($numMeio, '$nomeEntidade');";
        		$result = $db->prepare($sql);
        		$result->execute();
        	}

        	if($_POST['type']['meioCombate'] == 'meioCombate') {
        		$sql = "INSERT INTO meioCombate VALUES ($numMeio, '$nomeEntidade');";
        		$result = $db->prepare($sql);
        		$result->execute();
        	}

        	$db->commit();

	        echo("Nome do Meio editado com sucesso para $nomeMeio");

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
