<html>
<head>
<title>MySQL Basics - Read</title>
</head>

<body>
<?php
/*
Connecting to your MySQL server.
"localhost" refers to the same computer as this current script.


*/
$con=mysqli_connect("localhost","mgao7","root","mgao7");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



// reading from a DB: SELECT
// * means to retrieve all the fields; can use "field1, field2,etc") instead
$result = mysqli_query($con, "SELECT * FROM basics") or die(mysqli_error($con));

while($row = mysqli_fetch_array($result)){
		echo "<hr>";
		echo $row['bid']. "<br>";
		echo $row['name']. "<br>";
		echo $row['address']. "<br>";
		echo $row['occupation']. "<br>";
}



?>
</body>
</html>