<?php
include("includes/header.php");
$id = $_SERVER['QUERY_STRING'];

$con=mysqli_connect("localhost","mgao7","root","mgao7");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con, "SELECT * FROM mga_contacts where $id") or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
?>

<div class="jumbotron clearfix">
    <h1 class="text-center"><?php echo APP_NAME ?></h1>
</div>
<h4 class="text-info"><?php echo $row['mga_BusinessName'] ?></h4>
<ul class="list-group">
    <li class="list-group-item border-0 pl-0"><span class="font-weight-bold">Email: </span><a href="mailto: <?php echo $row['mga_EmailAddress'] ?>"><?php echo $row['mga_EmailAddress'] ?></a></li>
    <li class="list-group-item border-0 pl-0"><span class="font-weight-bold">Phone (Main): </span><?php echo $row['mga_Phone'] ?></li>
    <li class="list-group-item border-0 pl-0"><span class="font-weight-bold">Website: </span><a href="<?php echo $row['mga_Url'] ?>" target="_blank"><?php echo $row['mga_Url'] ?></a></li>
    <li class="list-group-item border-0 pl-0"><span class="font-weight-bold">Address: </span><?php echo $row['mga_Address'] ?></li>
    <li class="list-group-item border-0 pl-0"><span class="font-weight-bold">City: </span><?php echo $row['mga_City'] ?></li>
    <li class="list-group-item border-0 pl-0"><span class="font-weight-bold">Province: </span><?php echo $row['mga_Province'] ?></li>
    <li class="list-group-item border-0 pl-0"><span class="font-weight-bold">Postal: </span><?php echo $row['mga_Postal'] ?></li>
    <li class="list-group-item border-0 pl-0"><span class="font-weight-bold">Description: </span><?php echo $row['mga_Description'] ?></li>
</ul>
<p></p>
<p></p>
