<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
</head>
<h3>Inserir Processo de Socorro</h3>
<body>
	<?php
		$numProcessoSocorro = $_REQUEST['numProcessoSocorro'];
		$numTelefone = $_REQUEST['numTelefone'];
		$instanteChamada = $_REQUEST['instanteChamada'];
		$moradaLocal = $_REQUEST['moradaLocal'];
		try
		{
			$host = "db.ist.utl.pt";
        	$user ="ist187668";
    		$password = "1234";
        	$dbname = $user;

        	$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$db->beginTransaction();


			$sql = "SELECT moradaLocal FROM local WHERE moradaLocal = '$moradaLocal';";

			$result = $db->prepare($sql);
        	$result->execute();

        	if ($result->rowCount() == 0) {
        		$sql1 = "INSERT INTO local VALUES ('$moradaLocal');";

				$result1 = $db->prepare($sql1);
        		$result1->execute();
        	}

			$sql1 = "INSERT INTO processoSocorro VALUES ('$numProcessoSocorro');";

			$result1 = $db->prepare($sql1);
        	$result1->execute();

        	
        	$sql = "INSERT INTO eventoEmergencia VALUES ($numTelefone, '$instanteChamada', 'Not Defined', '$moradaLocal', $numProcessoSocorro);";

			$result = $db->prepare($sql);
        	$result->execute();

			echo("Novo Processo de Socorro adicionado com sucesso");

	        $db->commit();

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
