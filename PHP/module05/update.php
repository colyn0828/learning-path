<html>
<head>
<title>MySQL: Update</title>
</head>

<body>
<?php

$con=mysqli_connect("localhost","mgao7","root","mgao7");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


mysqli_query($con, "UPDATE basics SET name = 'Pebble Flintstone', address = '456 Quarry Blvd',occupation = 'little girl' WHERE bid= '2'") or die(mysqli_error($con)); 


?>








</body>
</html>