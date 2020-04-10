
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
  <h1>Roster</h1>
  
    <table class="table table-striped">
    <thead><th align="left">Active?</th><th align="left">Name</th><th align="left">Gender</th><th align="left">Squad</th>
	<th align="left">Year</th><th align="left">Date Joined</th><th align="left">Dues</th><th align="left">CWID</th>
	<th align="left">Cox?</th></thead>
    <tbody>
		<?//This will be created dynamically in php, but here's an example?>
		<tr>
			<td>Yes</td>
			<td>Ellie Pope</td>
			<td>Female</td>
			<td>Varsity</td>
			<td>Senior</td>
			<td>S-2019</td>
			<td>Yes</td>
			<td>123456789</td>
			<td>No</td>
			<td><a href="GraphView.php" class="button">View Details</a></td>
		</tr>
	</tbody>
	</table>
  
</body>
</html>