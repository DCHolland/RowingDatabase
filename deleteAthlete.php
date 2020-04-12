<?php
    //Format - $_POST['athlete'];
	
	$servername = "localhost";
	$username = "micah.swedberg";
	$password = "password";
	$dbname = "okstatecrewergtracker";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	//Import Data from addWorkout.php
	$name = $_POST['Name'];
	
	
	$sql = "DELETE FROM athletes 
			WHERE Name=\"".$name."\"";
	$result = $conn->query($sql);
	
	
	while (ob_get_status()) {
		ob_end_clean();
	}
	
	echo $sql;

	//header( "Location: http://localhost/rowingDatabase/Roster.php" );
?>