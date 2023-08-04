<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
</head>
<h3>Inserir Evento de Emergência</h3>
<body>
	<?php
		$numTelefone = $_REQUEST['numTelefone'];
		$instanteChamada = $_REQUEST['instanteChamada'];
		$nomePessoa = $_REQUEST['nomePessoa'];
		$moradaLocal = $_REQUEST['moradaLocal'];
		$numProcessoSocorro = $_REQUEST['numProcessoSocorro'];
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

        	if ($numProcessoSocorro != null) {
        		$sql2 = "SELECT numProcessoSocorro FROM processoSocorro WHERE numProcessoSocorro = $numProcessoSocorro;";

        		$result2 = $db->prepare($sql2);
        		$result2->execute();

        		if ($result2->rowCount() == 0) {
	        		$sql3 = "INSERT INTO processoSocorro VALUES ('$numProcessoSocorro');";

					$result3 = $db->prepare($sql3);
	        		$result3->execute();
        		}
        	}

        	$sql4 = "INSERT INTO eventoEmergencia VALUES ($numTelefone, '$instanteChamada', '$nomePessoa', '$moradaLocal', $numProcessoSocorro);";

        	$result4 = $db->prepare($sql4);
	        $result4->execute();
        	
        	$db->commit();

			echo("Novo Evento de Emergência adicionado com sucesso");

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
