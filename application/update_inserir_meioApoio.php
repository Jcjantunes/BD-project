<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
</head>
<h3>Inserir Meio de Apoio</h3>
<body>
	<?php
		$numMeio = $_REQUEST['numMeio'];
		$nomeMeio = $_REQUEST['nomeMeio'];
		$nomeEntidade = $_REQUEST['nomeEntidade'];
		try
		{
			$host = "db.ist.utl.pt";
        	$user ="ist187668";
    		$password = "1234";
        	$dbname = $user;

        	$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$db->beginTransaction();

			$sql = "SELECT * FROM meio WHERE numMeio = $numMeio AND nomeEntidade = '$nomeEntidade';";

      		$result = $db->prepare($sql);
        	$result->execute();

        	if ($result->rowCount() == 0) {

				$sql1 = "INSERT INTO meio VALUES ($numMeio, '$nomeMeio', '$nomeEntidade');";
			
				$result1 = $db->prepare($sql1);
        		$result1->execute();
        	}    

        	$sql3 = "UPDATE meio SET nomeMeio = '$nomeMeio' WHERE numMeio = $numMeio AND nomeEntidade = '$nomeEntidade';";
			
			$result3 = $db->prepare($sql3);
        	$result3->execute();
						

			$sql2 = "INSERT INTO meioApoio VALUES ($numMeio, '$nomeEntidade');";

        	$result2 = $db->prepare($sql2);
        	$result2->execute();
        	
        	$db->commit();

			echo("Novo Meio de Apoio adicionado com sucesso");

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
