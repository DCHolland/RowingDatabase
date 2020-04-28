<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>OKState Crew Workout Tracker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php date_default_timezone_set('America/Chicago');?>
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
  <h1>Search Workouts</h1>
    <form onkeydown="return event.key != 'Enter';" action="SearchResults.php">
		<b>Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" id="date" name="date">
	<br><br>
		<b>Athlete</b>&nbsp;&nbsp;&nbsp;
		<input type="text" id="athlete" name="athlete" value="All" onClick="this.setSelectionRange(0, this.value.length)">
	<br><br>
		<b>Workout Type</b>
		<select id="type" name="type">
			<option value="Any">Any</option>
			<option value="Steady State">Steady State</option>
			<option value="Intervals - Time">Intervals - Time</option>
			<option value="Intervals - Distance">Intervals - Distance</option>
			<option value="Rate Ramp">Rate Ramp</option>
			<option value="Test">Test</option>
			<option value="Other">Other</option>
		</select>
	<br><br>
		<input type="hidden" name="gender" value="Any">
		<input type="hidden" name="squad" value="Any">
		<input type="submit" value="Search">
	</form>
</body>
</html>