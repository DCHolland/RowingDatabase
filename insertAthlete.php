<?php
    //Format - $_POST['athlete'];
	
	//This document serves double purpose in both adding new athletes and modifying established athletes
	// by first removing any duplicate athlete present before inserting the athlete using the given info
	
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
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$years = $_POST['years'];
	$dateJoined = $_POST['dateJoined'];
	$role = $_POST['role'];
	$CWID = $_POST['CWID'];
	$dues = $_POST['dues'];
	
	//remove duplicate athletes
	$sql = "DELETE FROM athletes 
			WHERE Name=\"".$name."\"";
	$result = $conn->query($sql);
	
	//insert new athletes
	$sql = "INSERT INTO athletes (Name, Gender, Experience, `Date Joined`, isCoxswain, CWID, `Dues Paid`) 
			values ('$name', '$gender', '$years', '$dateJoined', '$role', '$CWID', '$dues')";
	$result = $conn->query($sql);
	
	
	while (ob_get_status()) {
		ob_end_clean();
	}

	header( "Location: http://localhost/rowingDatabase/Roster.php" );
?>