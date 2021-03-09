<?php
include("includes/header.php");
?>

<h2>Search</h2>
<form class="form-inline mt-2 mt-md-0 mb-5" name="searchForm" method="post">
    <label for="search">&nbsp;</label>
    <input class="form-control mr-sm-2 form-control" type="text" placeholder="Search Term" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="searchSubmit">Search</button>
</form>

<?php
$con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$searchTerm = $_POST['search'];

if (isset($_POST['search'])) {
    $result = mysqli_query($con, "SELECT * FROM mga_contacts WHERE mga_BusinessName LIKE '%$searchTerm%' OR mga_PersonName LIKE '%$searchTerm%'
OR mga_EmailAddress LIKE '%$searchTerm%' OR mga_Url LIKE '%$searchTerm%' OR mga_Phone LIKE '%$searchTerm%' OR mga_Address LIKE '%$searchTerm%' 
OR mga_City LIKE '%$searchTerm%' OR mga_Province LIKE '%$searchTerm%' OR mga_Postal LIKE '%$searchTerm%' OR mga_Description LIKE '%$searchTerm%' OR mga_Tags LIKE '%$searchTerm%'") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class=\"card text-center\">";
//        echo "<img class=\"card-img-top m-auto\" src=\"img/" . $row['mga_BusinessName'] . ".png\" alt=\"Card image cap\" style=\"width: 12rem; height: 18rem;\">";
        echo "<div class=\"card-body\">";
        echo "<h2 class=\"card-title\">" . $row['mga_BusinessName'];
        echo "</h2>";
        echo "<p class=\"card-text mb-2\" style=\"width: 48rem; margin: 0 auto 3rem;\">" . $row['mga_Description'];
        echo "</p>"; ?>
<a class="btn btn-primary m-auto" href="<?php BASE_URL ?>companyprofile.php?id=<?php echo $row['id'] ?>" role="button">View Profile</a>
        <?php echo "</div>";
        echo "</div>";
    }
}
?>


