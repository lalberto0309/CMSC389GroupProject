<?php
    function getNameAndImage($quizNumber, $result, $host, $user, $password, $database) {
		$db_connection = new mysqli($host, $user, $password, $database);
		if ($db_connection->connect_error) {
			die($db_connection->connect_error);
		}
		
		/* Query */
		$query = "select name,image from quiz".$quizNumber." where value=\"$result\"";
				
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
				$result->data_seek(0);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				return array("name" => $row['name'],
							 "image" => $row['image']);
			}
		}
		
		/* Freeing memory */
		$result->close();
		
		/* Closing connection */
		$db_connection->close();
    }
?>