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
	$gender = $_POST['Gender'];
	$years = $_POST['years'];
	$dateJoined = $_POST['dateJoined'];
	$role = $_POST['role'];
	$CWID = $_POST['CWID'];
	$dues = $_POST['dues'];
	
	
	$sql = "INSERT INTO athletes (Name, Gender, Experience, `Date Joined`, isCoxswain, CWID, `Dues Paid`) 
			values ('$name', '$gender', '$years', '$dateJoined', '$role', '$CWID', '$dues')";
	$result = $conn->query($sql);
	
	
	while (ob_get_status()) {
		ob_end_clean();
	}

	header( "Location: http://localhost/rowingDatabase/Roster.php" );
?>