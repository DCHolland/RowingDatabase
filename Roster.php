
<!DOCTYPE HTML>
<?php
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
	$query = "SELECT * FROM athletes ORDER BY Gender, Experience DESC";
?>

<html lang="en">
<head>
  <title>OKState Crew Workout Tracker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
	body {
		font-family: Arial, Helvetica, sans-serif;
	}
	.navbar {
		overflow: hidden;
		background-color: #333;
	}
	.navbar a {
	  float: left;
	  font-size: 26px;
	  color: white;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	  margin-top: 8px;
	}
	
	.logo-image{
		width: 124px;
		height: 50px;
		overflow: hidden;
		margin-top: -16px;
		margin-bottom: -6px;
	}
	
	th, td {
		padding: 18px;
	}
	
  </style>
</head>

<body style="background-color:orange;" class="container">
<div class="navbar">
  <a class="navbar-brand" href="https://okstatecrew.org">
      <div class="logo-image">
            <img src="okstaterowing-white.png" class="img-fluid">
      </div>
  </a>
  <a href="AddWorkout.php">Add</a>
  <a href="SearchHome.php">Search</a>
  <a href="Roster.php">Roster</a>
</div>
  <h1>Roster</h1>
  
    <table class="table table-striped">
    <thead><th align="left">Name</th><th align="left">Gender</th><th align="left">Experience</th><th align="left">Date Joined</th>
	<th align="left">Role</th><th align="left">CWID</th><th align="left">Dues Paid</th>
	</thead>
    <tbody>
	<?php  //This will be created dynamically in php, but here's an example
	if ($result = $conn->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$name = $row["Name"];
			$gender = $row["Gender"];
			$experience = $row["Experience"];
			$dateJoined = $row["Date Joined"];
			$isCox = $row["isCoxswain"];
			$CWID = $row["CWID"];
			$dues = $row["Dues Paid"];
			
			if ($isCox==1) $cox="Coxswain"; else $cox="Rower";
			if ($dues==1) $paid="Yes"; else $paid="<b>No</b>";
			if ($experience>1) $squad="Varsity"; else $squad="Novice";
	 
			echo '<tr> 
					  <td>'.$name.'</td> 
					  <td>'.$gender.'</td> 
					  <td>'.$squad.'</td> 
					  <td>'.$dateJoined.'</td> 
					  <td>'.$cox.'</td> 
					  <td>'.$CWID.'</td> 
					  <td>'.$paid.'</td> 
					  <td><form method="post" action="graphView.php">
						<input type="submit" name="'.$name.'" value="View Details">
					  </form></td>
					  <td><form method="post" action="deleteAthlete.php">
						<input type="submit" name="'.$name.'" value="Delete">
					  </form></td>
				  </tr>';
		}
		$result->free();
	} 
	?>
  <form action="insertAthlete.php" method="post" onkeydown="return event.key != 'Enter';">
		</tbody>
		</table>
		
		<table class="table table-striped">
		<thead><th align="left">Name</th><th align="left">Gender</th><th align="left">Experience</th><th align="left">Date Joined</th>
		<th align="left">Role</th><th align="left">CWID</th><th align="left">Dues Paid</th>
		</thead>
		<tBody>
		<tr>
			<td><input type="text" name="Name"/></td>
			<td><input type="text" size=1 maxlength=1 name="Gender"/></td>
			<td><select name="years">
				<option value=1>Novice</option>
				<option value=2>2 Years</option>
				<option value=3>3 Years</option>
				<option value=4>4+ Years</option>
			</select></td>
			<td><input type="date" name="dateJoined"/></td>
			<td><select name="role">
				<option value=0>Rower</option>
				<option value=1>Coxswain</option>
			</select></td>
			<td><input type="number" size=6 maxlength=9 name="CWID"/></td>
			<td><select name="dues">
				<option value=0>No</option>
				<option value=1>Yes</option>
			</select></td>
			<td><input type="submit" name="submit"/></td>
		</tr>
		
		</tbody>
		</table>
	</form>
</body>
</html>