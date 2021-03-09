<html>
<head>
<title>MySQL: Delete</title>
</head>

<body>
<?php

$con=mysqli_connect("localhost","mgao7","root","mgao7");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


mysqli_query($con, "DELETE FROM basics WHERE bid='3'") or die(mysqli_error($con));

?>








</body>
</html>