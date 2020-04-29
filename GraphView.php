
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
$name = $_POST['name'];
$type = $_POST['type'];

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
  <h1><?php echo (str_repeat('&nbsp;', 5)); echo ($name . " - Athlete Stats")?></h1>
  <form method="post" action="graphView.php">
  <input type="submit" name="'.$name.'" value="Steady State">
    <input type="hidden" name="name" value = "<?php echo $name?>">
    <input type="hidden" name="type" value = "Steady State">
  </form></td>
    <form method="post" action="graphView.php">
  <input type="submit" name="'.$name.'" value="Intervals Time">
    <input type="hidden" name="name" value = "<?php echo $name?>">
    <input type="hidden" name="type" value = "Intervals - Time">
  </form></td>
  <form method="post" action="graphView.php">
    <input type="submit" name="'.$name.'" value="Intervals Distance">
    <input type="hidden" name="name" value = "<?php echo $name?>">
    <input type="hidden" name="type" value = "Intervals - Distance">
  </form></td>
    <form method="post" action="graphView.php">
  <input type="submit" name="'.$name.'" value="Rate Ramp">
    <input type="hidden" name="name" value = "<?php echo $name?>">
    <input type="hidden" name="type" value = "Rate Ramp">
  </form></td>
  <form method="post" action="graphView.php">
    <input type="submit" name="'.$name.'" value="Test">
    <input type="hidden" name="name" value = "<?php echo $name?>">
    <input type="hidden" name="type" value = "test">
  </form></td>

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
    width: 800px;
    height: 400px;
    text-align: center;
}
</style>

<?php
$sql = "SELECT DISTINCT Date FROM `splits` WHERE Athlete LIKE '%{$name}%' AND Type LIKE '%{$type}%'";
$result = mysqli_query($conn, $sql);
$count = 0;
while($row = mysqli_fetch_assoc($result)) {
  $count++;
}
$array = array_fill(0,$count,0);
$timeArray = array_fill(0,$count,0);

$result = mysqli_query($conn, $sql);
$i =0;
while($row = mysqli_fetch_assoc($result)) {
  $array[$i] =$row["Date"];
  $i++;
}

sort($array);
$index =0;
foreach($array as $value){
    $sql = "SELECT * FROM `splits` WHERE Athlete LIKE '%{$name}%' AND Date LIKE '%{$value}%'  AND Type LIKE '%{$type}%'";
    $result = mysqli_query($conn, $sql);
    $count = 0;
    $average = 0;
    while($row = mysqli_fetch_assoc($result)) {
      $average = $average + $row['Total Time'];
      $count++;
    }
    $average = $average / $count;
    $timeArray[$index] = $average/60;
    $index++;
}

?>


<script type="text/javascript">
$(function () {


  var dateArray = <?php echo json_encode($array); ?>;
   var timeArray = <?php echo json_encode($timeArray); ?>;
   var matrix = [];
   var matrix2 = [];

   for(var i=0; i<dateArray.length; i++) {
       matrix[i] = new Array(dateArray.length);
       matrix2[i] = new Array(dateArray.length);

   }
   for (i = 0; i < dateArray.length; i++) {
     matrix[i][0] = i;
     matrix2[i][0] = i;
     matrix[i][1] = timeArray[i];
     matrix2[i][1] = dateArray[i];
  }

    var options = {
            series:{
                bars:{show: true}
            },
            bars:{
                  barWidth:.9,

            },
            xaxis:{
              show: true,
              ticks: matrix2
            },
            yaxis:{
			  show: true,
              tickSize: 1
            },
            grid:{
                backgroundColor: { colors: ["#FFFFFF", "#646464"] }
              }

    };

    $.plot($("#flotcontainer"), [matrix], options);

});
</script>
<br></b>
<h1><?php echo (str_repeat('&nbsp;', 20)); echo ("Graph for : " . $type)?></h1>

<b>Minutes<br><br></b>

<div id="legendPlaceholder"></div>
<div id="flotcontainer"></div>
<?php echo(str_repeat('&nbsp;', 10)); echo("<b>Date</b><br><br>");?>
<?="<h2>&nbsp Athlete Info</h2>"?>
</body>
</html>
