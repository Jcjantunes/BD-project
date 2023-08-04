<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
</head>
<body>
	<h3>Remover local</h3>
	<?php
	$moradaLocal = $_REQUEST['moradaLocal'];
	
	try {
		$host = "db.ist.utl.pt";
		$user ="ist187668";
    	$password = "1234";
		$dbname = $user;
		$processos = array();
		

		$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$sql = "SELECT numProcessoSocorro FROM eventoEmergencia WHERE moradaLocal = '$moradaLocal';";
		$result = $db->prepare($sql);
		$result->execute();


		foreach($result as $row)
        {
 
        	$numProcessoSocorro = $row['numprocessosocorro'];
            
            if($numProcessoSocorro != null) {
				$sql1 = "SELECT * FROM eventoEmergencia WHERE numProcessoSocorro = $numProcessoSocorro;";
				$result1 = $db->prepare($sql1);
				$result1->execute();

				$contEventoEmergencia = $result1->rowCount();

				if($contEventoEmergencia == 1) {
					array_push($processos, $numProcessoSocorro);
				}
			}

		}



		$db->beginTransaction();

		$sql = "DELETE FROM local WHERE moradaLocal='$moradaLocal';";

		$result = $db->prepare($sql);
		$result->execute();


		
		foreach ( $processos as $value )
		{
			$sql = "DELETE FROM processoSocorro WHERE numProcessoSocorro = $value;";
			$result = $db->prepare($sql);
			$result->execute();
		}
	
    

		$db->commit();


		echo("Local $moradaLocal removido com sucesso");

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
