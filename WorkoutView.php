
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
  <h1>Workout View:</h1>
  <h2><?=$_POST['athlete'], " - ",$_POST['type'], " - ", $_POST['date'];?></h2>
  <table class="table table-striped">
  <thead><th align="left">Date</th><th align="left">Athlete</th><th align="left">Type</th><th align="left">Split Number</th><th align="left">Average Rate</th><th align="left">500 Split</th><th align="left">Distance</th><th align="left">Total Time</th></thead>
  <tbody>
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
  $name =$_POST['athlete'];
  $type =$_POST['type'];
  $date =$_POST['date'];
  $sql = "SELECT * FROM `splits` WHERE Type LIKE '%{$type}%' AND Date LIKE '%{$date}%' AND Athlete LIKE '%{$name}%'";
  $result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>". $row["Date"]."</td>";
  echo "<td>".$row["Athlete"]."</td>";
  echo "<td>" . $row["Type"]. "</td>";
  echo "<td>" . $row["Split Number"]. "</td>";
  echo "<td>" . $row["Average Rate"]. "</td>";
  echo "<td>" . $row["500 Split"]. "</td>";
  echo "<td>" . $row["Distance"]. "</td>";
  echo "<td>" . $row["Total Time"]. "</td>";


  echo "</tr>";
}
  ?>
</tbody>
</table>
</body>
</html>
