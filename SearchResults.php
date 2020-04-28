
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
  <b>Filters:<br><br> &nbsp &nbsp Gender &nbsp &nbsp &nbsp Squad</b>
    <form onkeydown=action="SearchResults.php">
	<table class="table table-striped">
	<tbody>
	<tr>
		<input type="hidden" name="date" value="<?=$_GET['date']?>">
		<input type="hidden" name="athlete" value="<?=$_GET['athlete']?>">
		<input type="hidden" name="type" value="<?=$_GET['type']?>">
		<td><select name="gender">
			<option value="Any">Any</option>
			<option value="M">M</option>
			<option value="F">F</option>
		</select></td>
		<td><select name="squad">
			<option value="Any">Any</option>
			<option value="Varsity">Varsity</option>
			<option value="Novice">Novice</option>
		</select></td>
		<td><input type="submit" value="Search"></td>
	</tr>
	</tbody>
	</table>
	</form>

    <table class="table table-striped">
    <thead><th align="left">Date</th><th align="left">Athlete</th><th align="left">Type</th><th align="left">Distance</th><th align="left">Split</th><th align="left">Rate</th><th align="left">Time</th></thead>
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
      $name =$_GET['athlete'];
      $type =$_GET['type'];
      $date =$_GET['date'];

	  //filters
	  $gender =$_GET['gender'];
	  $squad =$_GET['squad'];

	//determine query based on search parameters
  $sql =   "SELECT * FROM practices P LEFT JOIN athletes A ON A.Name = P.Athlete";
	  //Full Search Parameters
      if($name != "All" && $date != "" && $type != "Any")
        $sql = $sql . " WHERE Type LIKE '%{$type}%' AND Date LIKE '%{$date}%' AND Athlete LIKE '%{$name}%'";
      //Name Parameters
	  else if($date == "" && $type == "Any" && $name != "All")
        $sql = $sql . " WHERE P.Athlete LIKE '%{$name}%'";
      //Date Parameters
	  else if($name == "All" && $type == "Any" &&  $date != "")
        $sql = $sql . " WHERE Date LIKE '%{$date}%'";
      //Type Parameters
	  else if($name == "All" && $date == "" && $type !="Any")
        $sql = $sql . " WHERE Type LIKE '%{$type}%'";
      //Name and Type Parameters
	  else if($name != "All" && $type != "Any" &&  $date == "")
        $sql = $sql . " WHERE Athlete LIKE '%{$name}%' AND Type LIKE '%{$type}%'";
      //Name and Date Parameters
	  else if($name != "All" && $type == "Any" &&  $date != "")
        $sql = $sql . " WHERE Date LIKE '%{$date}%' AND Athlete LIKE '%{$name}%'";
      //Date and Type Parameters
	  else if($name == "All" && $type != "Any" &&  $date != "")
        $sql = $sql . " WHERE Date LIKE '%{$date}%' AND Type LIKE '%{$type}%'";

	  //Filtered Parameters
	  if($gender != "Any")
        $sql = $sql . " AND Gender LIKE '%{$gender}%'";
	  if($squad == "Novice")
        $sql = $sql . " AND Experience <= 1";
	  else if($squad == "Varsity")
        $sql = $sql . " AND Experience > 1";

      $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row["Date"]."</td>";
      echo "<td>" . $row["Athlete"]."</td>";
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
