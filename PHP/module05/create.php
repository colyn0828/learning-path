<html>
<head>
<title>MySQL: Create</title>
</head>

<body>
<?php



$con=mysqli_connect("localhost","mgao7","root","mgao7");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


/*
INSERT
mysql_query("INSERT INTO table_name (field1,field2,field3) VALUES (value1, value2, value3)");

*/
mysqli_query($con, "INSERT INTO basics (name,address,occupation) VALUES ('Bam Bam Rubble', '123 Bedrock Ave', 'kid')") or die(mysqli_error($con));

?>

</body>
</html>