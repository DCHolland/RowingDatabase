
<!DOCTYPE HTML>
<html lang="en">
<head>
  <script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.js"></script>
  <script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.canvaswrapper.js"></script>
  <script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.colorhelpers.js"></script>
  <script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.flot.js"></script>

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
  <h1>GraphView.php</h1>

<script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.canvaswrapper.js"></script>
<script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.colorhelpers.js"></script>
<script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.flot.js"></script>
<script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.flot.saturated.js"></script>
<script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.flot.symbol.js"></script>

<script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.flot.browser.js"></script>
<script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.flot.drawSeries.js"></script>
<script language="javascript" type="text/javascript" src="/rowingDatabase/flot/jquery.flot.uiConstants.js"></script>

<style type="text/css">
#flotcontainer {
    width: 600px;
    height: 200px;
    text-align: left;
}
</style>

<script type="text/javascript">
$(function () {
    var data1 = [[0,150],[1,15],[2,200],[3,75],[4,180],[5,175]]

    var options = {
            series:{
                bars:{show: true}
            },
            bars:{
                  barWidth:.9
            },
            grid:{
                backgroundColor: { colors: ["#FFFFFF", "#646464"] }
            }
    };

    $.plot($("#flotcontainer"), [data1], options);

});
</script>
<div id="legendPlaceholder"></div>
<div id="flotcontainer"></div>
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

echo 'Histogram Data for: ' . $name .' ';


?>

</body>
</html>
