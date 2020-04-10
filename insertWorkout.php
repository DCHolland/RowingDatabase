<?php
    //Format - $_GET['athlete'];
	
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
	
	//$sql = "INSERT INTO practices (Date, Type, Total Time, Total Distance, Average Split, Average Rate)"
	
	
	
	while (ob_get_status()) {
		ob_end_clean();
	}

	header( "Location: http://localhost/rowingDatabase/AddWorkout.php" );
?>