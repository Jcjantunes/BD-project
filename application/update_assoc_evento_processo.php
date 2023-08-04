<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
</head>
<h3>Associar Processo de socorro a um Evento de Emergencia</h3>
<body>
	<?php
		$numTelefone = $_REQUEST['numTelefone'];
		$instanteChamada = $_REQUEST['instanteChamada'];
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
      
			$sql = "UPDATE eventoEmergencia SET numProcessoSocorro = $numProcessoSocorro WHERE numTelefone = $numTelefone AND instanteChamada = ('$instanteChamada');";

			$result = $db->prepare($sql);
        	$result->execute();
        	$db->commit();

			echo("Novo Processo de Socorro associado a um Evento de Emergencia");

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
