<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Projecto 3</title>
</head>
<h3>Listar Processos de Socorro</h3>
<body>

	<?php
	try
	{
		$host = "db.ist.utl.pt";
    	$user ="ist187668";
    	$password = "1234";
    	$dbname = $user;
    	
    	$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT numprocessosocorro FROM processoSocorro;";
		
		$result = $db->prepare($sql);
    	$result->execute();

    	echo("<table border=\"1\">\n");
    	echo("<tr><td><b>Número Processo de Socorro</b></td></tr>\n");
        
        foreach($result as $row)
        {
            echo("<tr><td>");
            echo($row['numprocessosocorro']);
            echo("</tr></td>\n");
        }

        echo("</table>\n");

		$db = null;
	}
	catch (PDOException $e)
	{
		$db->query("rollback;");
		echo("<p>ERRO: {$e->getMessage()}</p>");
	}
	?>

	<p><a href="index.html">Voltar</a></p>
</body>
</html>
