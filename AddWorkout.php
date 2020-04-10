
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
	
	table {
		border: 1px solid black;
	}
	
	th, td {
		padding: 5px;
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
  <h1>Add Workout</h1>
  <form onkeydown="return event.key != 'Enter';">
		<b>Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" id="date" name="date" value=<?=date("Y-m-d");?>>
	<br><br>
		<b>Athlete</b>&nbsp;&nbsp;&nbsp;
		<input type="text" id="athlete" name="athlete">
	<br><br>
		<b>Workout Type</b>
		<select id="type" name="type">
			<option value="Steady State">Steady State</option>
			<option value="Intervals - Time">Intervals - Time</option>
			<option value="Intervals - Distance">Intervals - Distance</option>
			<option value="Rate Ramp">Rate Ramp</option>
			<option value="Test">Test</option>
			<option value="Other">Other</option>
		</select>
	</form>
	
	<br> <br>
	<h2>Splits</h2>
  <table class="table table-striped">
    <thead><th>#</th><th>Distance</th><th>Split</th><th>Rate</th></thead>
    <tbody>
		<tr>
			<td>1</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>2</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>3</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>4</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>5</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>6</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>7</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>8</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>9</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>10</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>11</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>12</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>13</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>14</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>15</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>16</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>17</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>18</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>19</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
		<tr>
			<td>20</td>
			<td><input type="number" /></td>
			<td><input type="time" /></td>
			<td><input type="number" /></td>
		</tr>
    </tbody>
  </table>
  <br><br>
  <form method="get" action="AddWorkout.php">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit"  onclick="return confirm('Submit Workout?')" value="Submit">
  </form>
  <br><br><br>
</body>
</html>