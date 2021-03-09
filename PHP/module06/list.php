<?php
include("includes/header.php");
?>

<html>
<head>
    <title>List Characters</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<?php
$con=mysqli_connect("localhost","mgao7","root","mgao7");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM mga_characters") or die(mysqli_error($con));
while($row = mysqli_fetch_array($result)){
    echo "<div class=\"card text-center\">";
    echo "<img class=\"card-img-top m-auto\" src=\"img/".$row['mga_FirstName'].".png\" alt=\"Card image cap\" style=\"width: 12rem; height: 18rem;\">";
    echo "<div class=\"card-body\">";
    echo "<h2 class=\"card-title\">". $row['mga_LastName']." ". $row['mga_FirstName'];
    echo "</h2>";
    echo "<p class=\"card-text mb-2\" style=\"width: 48rem; margin: 0 auto 3rem;\">". $row['mga_Description'];
    echo "</p>";
    echo "<a class=\"btn btn-primary m-auto\" href=\"index.php\" role=\"button\">Go Home";
    echo "</a>";
    echo "</div>";
    echo "</div>";
}

?>
</body>
</html>