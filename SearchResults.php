
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

	a.button {
		-webkit-appearance: button;
		-moz-appearance: button;
		appearance: button;

		text-decoration: none;
		color: gray;
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
  <h1>Search Results:</h1>
  <h2><?=$_GET['athlete'], " - ", $_GET['type'], " - ", $_GET['date'];?></h2>

    <table class="table table-striped">
    <thead><th align="left">Date</th><th align="left">Athlete</th><th align="left">Type</th><th align="left">Distance</th><th align="left">Split</th><th align="left">Rate</th><th align="left">Time</th></thead>
    <tbody>
		<?//This will be created dynamically in php, but here's an example?>
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
      $name =$_GET['athlete'];
      $type =$_GET['type'];
      $date =$_GET['date'];
      if($name != "All" && $date != "" && $type != "Any")
        $sql = "SELECT * FROM `practices` WHERE Type LIKE '%{$type}%' AND Date LIKE '%{$date}%' AND Athlete LIKE '%{$name}%'";
      if($date == "" && $type == "Any" && $name != "All")
        $sql = "SELECT * FROM `practices` WHERE Athlete LIKE '%{$name}%'";
      if($name == "All" && $type == "Any" &&  $date != "")
        $sql = "SELECT * FROM `practices` WHERE Date LIKE '%{$date}%'";
      if($name == "All" && $date == "" && $type !="Any")
        $sql = "SELECT * FROM `practices` WHERE Type LIKE '%{$type}%'";
      if($name != "All" && $type != "Any" &&  $date == "")
        $sql = "SELECT * FROM `practices` WHERE Athlete LIKE '%{$name}%' AND Type LIKE '%{$type}%'";
      if($name != "All" && $type == "Any" &&  $date != "")
        $sql = "SELECT * FROM `practices` WHERE Date LIKE '%{$date}%' AND Athlete LIKE '%{$name}%'";
      if($name == "All" && $type != "Any" &&  $date != "")
        $sql = "SELECT * FROM `practices` WHERE Date LIKE '%{$date}%' AND Type LIKE '%{$type}%'";

      $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>". $row["Date"]."</td>";
      echo "<td>".$row["Athlete"]."</td>";
      echo "<td>" . $row["Type"]. "</td>";
      echo "<td>" . $row["Total Distance"]. "</td>";
      echo "<td>" . $row["Average Split"]. "</td>";
      echo "<td>" . $row["Average Rate"]. "</td>";
      echo "<td>" . $row["Total Time"]. "</td>";
      echo '<td><form method="post" action="WorkoutView.php">
      			<input type="submit" name="'.$name.'" value="View Splits">
      			<input type="hidden" name="athlete" value="'.$row["Athlete"].'">
            <input type="hidden" name="type" value="'.$row["Type"].'">
          	<input type="hidden" name="date" value="'.$row["Date"].'">
      			</form></td>';

      echo "</tr>";
    }
    ?>

	</tbody>
	</table>

</body>
</html>
