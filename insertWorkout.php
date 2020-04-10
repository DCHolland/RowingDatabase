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
	
	//Import Data from addWorkout.php
	$athlete = $_POST['athlete'];
	$date = $_POST['date'];
	$type = $_POST['type'];
	$r1 = $_POST['r1']; $s1 = $_POST['s1']; $d1 = $_POST['d1'];
	$r2 = $_POST['r2']; $s2 = $_POST['s2']; $d2 = $_POST['d2'];
	$r3 = $_POST['r3']; $s3 = $_POST['s3']; $d3 = $_POST['d3'];
	$r4 = $_POST['r4']; $s4 = $_POST['s4']; $d4 = $_POST['d4'];
	$r5 = $_POST['r5']; $s5 = $_POST['s5']; $d5 = $_POST['d5'];
	$r6 = $_POST['r6']; $s6 = $_POST['s6']; $d6 = $_POST['d6'];
	$r7 = $_POST['r7']; $s7 = $_POST['s7']; $d7 = $_POST['d7'];
	$r8 = $_POST['r8']; $s8 = $_POST['s8']; $d8 = $_POST['d8'];
	$r9 = $_POST['r9']; $s9 = $_POST['s9']; $d9 = $_POST['d9'];
	$r10 = $_POST['r10']; $s10 = $_POST['s10']; $d10 = $_POST['d10'];
	$r11 = $_POST['r11']; $s11 = $_POST['s11']; $d11 = $_POST['d11'];
	$r12 = $_POST['r12']; $s12 = $_POST['s12']; $d12 = $_POST['d12'];
	$r13 = $_POST['r13']; $s13 = $_POST['s13']; $d13 = $_POST['d13'];
	$r14 = $_POST['r14']; $s14 = $_POST['s14']; $d14 = $_POST['d14'];
	$r15 = $_POST['r15']; $s15 = $_POST['s15']; $d15 = $_POST['d15'];
	$r16 = $_POST['r16']; $s16 = $_POST['s16']; $d16 = $_POST['d16'];
	$r17 = $_POST['r17']; $s17 = $_POST['s17']; $d17 = $_POST['d17'];
	$r18 = $_POST['r18']; $s18 = $_POST['s18']; $d18 = $_POST['d18'];
	$r19 = $_POST['r19']; $s19 = $_POST['s19']; $d19 = $_POST['d19'];
	$r20 = $_POST['r20']; $s20 = $_POST['s20']; $d20 = $_POST['d20'];
	
	
	//calcs based on entry
	//$tt1 = $_GET['s1'] $_GET['d1'] ...
	
	
	//if distance not null
	//split 1
	//Working:
	$sql = "INSERT INTO splits (Athlete) value ('Taylor Stoll')";
	
	//Not Working
	//$sql = "INSERT INTO splits (Athlete, Date, Split Number, Average Rate, 500 Split, Distance, Total Time) 
		//values ('$athlete', '$date', '$type', '1', '$r1', '$s1', '$d1', '')";
	
	$result = $conn->query($sql);
	
	while (ob_get_status()) {
		ob_end_clean();
	}

	header( "Location: http://localhost/rowingDatabase/AddWorkout.php" );
?>