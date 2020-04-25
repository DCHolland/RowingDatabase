
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
    $sql = "SELECT * FROM `practices` WHERE Athlete LIKE '%{$name}%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["Athlete"]. " - Name: " . $row["Date"]. " " . $row["Type"]. "<br>";
      }
    }
    ?>
    <table class="table table-striped">
    <thead><th align="left">Date</th><th align="left">Athlete</th><th align="left">Type</th><th align="left">Distance</th><th align="left">Split</th><th align="left">Rate</th><th align="left">Time</th></thead>
    <tbody>
		<?//This will be created dynamically in php, but here's an example?>
		<tr>
			<td>04/03/2020</td>
			<td>Ellie Pope</td>
			<td>Test</td>
			<td>2000</td>
			<td>1:53</td>
			<td>29</td>
			<td>7:42</td>
			<td><a href="WorkoutView.php" class="button">View Splits</a></td>
		</tr>
	</tbody>
	</table>

</body>
</html>
