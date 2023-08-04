<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
</head>

<body>
	<h3>Remover Evento Emergencia</h3>	
	<?php

	$numTelefone = $_REQUEST['numTelefone'];
	$instanteChamada = $_REQUEST['instanteChamada'];

	
	try {
		$host = "db.ist.utl.pt";
		$user ="ist187668";
    	$password = "1234";
		$dbname = $user;
		

		$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$sql = "SELECT numProcessoSocorro FROM eventoEmergencia WHERE numTelefone = $numTelefone AND instanteChamada = '$instanteChamada';";
		$result = $db->prepare($sql);
		$result->execute();



		foreach($result as $row)
        {
 
        	$numProcessoSocorro = $row['numprocessosocorro'];
        }


        if($numProcessoSocorro != null) {
			$sql = "SELECT * FROM eventoEmergencia WHERE numProcessoSocorro = $numProcessoSocorro";
			$result = $db->prepare($sql);
			$result->execute();

			$contEventoEmergencia = $result->rowCount();
		}



		$db->beginTransaction();

		$sql = "DELETE FROM eventoEmergencia WHERE numTelefone = $numTelefone AND instanteChamada = '$instanteChamada';";

		$result = $db->prepare($sql);
		$result->execute();

		
		if( $numProcessoSocorro != null && $contEventoEmergencia == 1  ) {

			$sql = "DELETE FROM processoSocorro WHERE numProcessoSocorro = $numProcessoSocorro ";
			$result = $db->prepare($sql);
			$result->execute();
		}


		$db->commit();
		echo("Evento emergencia com o numero de telefone $numTelefone e o instante chamada $instanteChamada removido com sucesso.");

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
