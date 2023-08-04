<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
</head>
<body>
<h3>Listar os Meios accionados num Processo de Socorro</h3>
	<?php
		$numProcessoSocorro = $_REQUEST['numProcessoSocorro'];
		try
		{
			$host = "db.ist.utl.pt";
        	$user ="ist187668";
    		$password = "1234";
        	$dbname = $user;

        	$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
			$sql = "SELECT nummeio, nomemeio, nomeentidade FROM acciona NATURAL JOIN meio WHERE numProcessoSocorro = $numProcessoSocorro;";
		
			$result = $db->prepare($sql);
	    	$result->execute();

	    	echo("<table border=\"1\">\n");
	    	echo("<tr><td><b>Número do Meio</b></td>
	    		<td><b>Nome do Meio</b></td>
	    		<td><b>Nome da Entidade</b></td></tr>\n");
	        
	        foreach($result as $row)
	        {
	            echo("<tr><td>");
	            echo($row['nummeio']);
	            echo("</td><td>");
	            echo($row['nomemeio']);
	            echo("</td><td>");
	            echo($row['nomeentidade']);
	            echo("</tr></td>\n");
	        }

	        echo("</table>\n");

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
