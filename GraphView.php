
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
    width: 800px;
    height: 400px;
    text-align: center;
}
</style>

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

$sql = "SELECT DISTINCT Date FROM `splits` WHERE Athlete LIKE '%{$name}%'";
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
    $sql = "SELECT * FROM `splits` WHERE Athlete LIKE '%{$name}%' AND Date LIKE '%{$value}%' ";
    $result = mysqli_query($conn, $sql);
    $count = 0;
    $average = 0;
    while($row = mysqli_fetch_assoc($result)) {
      $average = $average + $row['Total Time'];
      $count++;
    }
    $average = $average / $count;
    $timeArray[$index] = $average;
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
              tickSize: 10
            },
            grid:{
                backgroundColor: { colors: ["#FFFFFF", "#646464"] }
              }

    };

    $.plot($("#flotcontainer"), [matrix], options);

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
