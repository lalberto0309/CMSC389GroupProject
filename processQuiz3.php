<?php  
	require_once("support1.php");
	require_once("dbLogin.php");

	//Retrieve Quiz Result
	


	$db_connection = new mysqli($host, $user, $password, $database);
	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	} else {
		echo "Connection to database established<br><br>";
	}
	
	/* Query */
	$query = "select * from quiz3";
			
	/* Executing query */
	$result = $db_connection->query($query);
	if (!$result) {
		die("Retrieval failed: ". $db_connection->error);
	} else {
		/* Number of rows found */
		$num_rows = $result->num_rows;
		if ($num_rows === 0) {
			echo "Empty Table<br>";
		} else {
			for ($row_index = 0; $row_index < $num_rows; $row_index++) {
				$result->data_seek($row_index);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				
				echo "Name: {$row['name']}, Id: {$row['id']} <br>";
			}
		}
	}
	
	/* Freeing memory */
	$result->close();
	
	/* Closing connection */
	$db_connection->close();


?>