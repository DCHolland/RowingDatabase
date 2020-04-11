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
	$r = Array();
	$s = Array();
	$d = Array();
	$tt = Array();
	array_push($r, $_POST['r1']);  array_push($s, $_POST['s1']);  array_push($d, $_POST['d1']);
	array_push($r, $_POST['r2']);  array_push($s, $_POST['s2']);  array_push($d, $_POST['d2']);
	array_push($r, $_POST['r3']);  array_push($s, $_POST['s3']);  array_push($d, $_POST['d3']);
	array_push($r, $_POST['r4']);  array_push($s, $_POST['s4']);  array_push($d, $_POST['d4']);
	array_push($r, $_POST['r5']);  array_push($s, $_POST['s5']);  array_push($d, $_POST['d5']);
	array_push($r, $_POST['r6']);  array_push($s, $_POST['s6']);  array_push($d, $_POST['d6']);
	array_push($r, $_POST['r7']);  array_push($s, $_POST['s7']);  array_push($d, $_POST['d7']);
	array_push($r, $_POST['r8']);  array_push($s, $_POST['s8']);  array_push($d, $_POST['d8']);
	array_push($r, $_POST['r9']);  array_push($s, $_POST['s9']);  array_push($d, $_POST['d9']);
	array_push($r, $_POST['r10']); array_push($s, $_POST['s10']); array_push($d, $_POST['d10']);
	array_push($r, $_POST['r11']); array_push($s, $_POST['s11']); array_push($d, $_POST['d11']);
	array_push($r, $_POST['r12']); array_push($s, $_POST['s12']); array_push($d, $_POST['d12']);
	array_push($r, $_POST['r13']); array_push($s, $_POST['s13']); array_push($d, $_POST['d13']);
	array_push($r, $_POST['r14']); array_push($s, $_POST['s14']); array_push($d, $_POST['d14']);
	array_push($r, $_POST['r15']); array_push($s, $_POST['s15']); array_push($d, $_POST['d15']);
	array_push($r, $_POST['r16']); array_push($s, $_POST['s16']); array_push($d, $_POST['d16']);
	array_push($r, $_POST['r17']); array_push($s, $_POST['s17']); array_push($d, $_POST['d17']);
	array_push($r, $_POST['r18']); array_push($s, $_POST['s18']); array_push($d, $_POST['d18']);
	array_push($r, $_POST['r19']); array_push($s, $_POST['s19']); array_push($d, $_POST['d19']);
	array_push($r, $_POST['r20']); array_push($s, $_POST['s20']); array_push($d, $_POST['d20']);
	$count = 0;
	
	//splits converted to seconds
	function convertToSeconds($mins) {
		return round($mins, -2)/100*60+($mins-round($mins, -2));
	}

	//calculated total time based on givens
	function totalTime($split, $dist) {
		return $dist/500*$split;
	}
	
	for ($i=0;$i<20;$i++) {
		if ($d[$i]!="" && $s[$i]!="" && $r[$i]!="") {
			$s[$i]=convertToSeconds($s[$i]);
			$tt[$i]=totalTime($s[$i], $d[$i]);
			$num=$i+1;
			$sql = "INSERT INTO splits (Athlete, Date, Type, `Split Number`, `Average Rate`, `500 Split`, Distance, `Total Time`) 
				values ('$athlete', '$date', '$type', '$num', '$r[$i]', '$s[$i]', '$d[$i]', '$tt[$i]')";
			$result = $conn->query($sql);
			$count++;
		}
	}
	
	
	//total time calc, total distance calc, average split calc, average rate calc
	//$totalDistance = $d1+$d2+$d3+$d4+$d5+$d6+$d7+$d8+$d9+$d10+$d11+$d12+$d13+$d14+$d15+$d16+$d17+$d18+$d19+$d20;
	//$avgRate = ($r1+$r2+$r3+$r4+$r5+$r6+$r7+$r8+$r9+$r10+$r11+$r12+$r13+$r14+$r15+$r16+$r17+$r18+$r19+$r20)/$count;
	//Total Time
	//Average Split
	
	$sql = "INSERT INTO practices (Athlete, Date, Type, `Total Time`, `Total Distance`, `Average Split`, `Average Rate`) 
			values ('$athlete', '$date', '$type', '', '$totalDistance', '', '$avgRate')";
	$result = $conn->query($sql);
	
	
	while (ob_get_status()) {
		ob_end_clean();
	}

	header( "Location: http://localhost/rowingDatabase/AddWorkout.php" );
?>