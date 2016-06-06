<?php
	require "db_connect.php"; //defines $servername, $username, $password, $db, $conn (holds the connection)
	
	//header('Content-type: application/json'); //we encode our result in json

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully";

	if (isset($_GET["id"])) { //da mettere in sicurezza!
		$sql = "SELECT * FROM Devices WHERE id=" . $_GET["id"]; //da mettere in sicurezza!
	} elseif (isset($_GET["category"])) {
		//TODO (divides between smartphones, tablets, etc..)
	}
	else { //do we use this?
		$sql = "SELECT * FROM Devices";
	}
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $res[] = $row; //adds $row to the $res array
	    }
	    echo json_encode($res);
	} else {
	    echo "0 results"; //maybe print a better message
	}

	$conn->close();
?> 