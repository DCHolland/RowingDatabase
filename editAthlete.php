
<!DOCTYPE HTML>
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
$name = $_POST['Name'];
?>


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
  <h1><?php echo (str_repeat('&nbsp;', 5)); echo ($name . " - Edit Athlete Info")?></h1>
    <table class="table table-striped">
    <thead><th align="left">Gender</th><th align="left">Experience</th><th align="left">Date Joined</th>
	<th align="left">Role</th><th align="left">CWID</th><th align="left">Dues Paid</th>
	</thead>
    <tbody>
	<?php
	$query = "SELECT * FROM athletes WHERE Name LIKE '%{$name}%'";
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
					  <td>'.$gender.'</td>
					  <td>'.$squad.'</td>
					  <td>'.$dateJoined.'</td>
					  <td>'.$cox.'</td>
					  <td>'.$CWID.'</td>
					  <td>'.$paid.'</td>
					  <td><form method="post" action="editAthlete.php">
						<input type="submit" name="'.$name.'" value="Edit">
						<input type="hidden" name="Name" value="'.$name.'">
					  </form></td>
				  </tr>';
		}
	}
	?>
	</tbody>
</body>
</html>
