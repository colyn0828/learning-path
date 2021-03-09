<?php
include("includes/header.php");
?>

    <div class="jumbotron clearfix">
        <h1 class="text-center"><?php echo APP_NAME ?></h1>
    </div>
    <div class="d-flex justify-content-between m-auto">
        <ul class="list-group pb-5">
            <?php
            $con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $result = mysqli_query($con, "SELECT * FROM mga_contacts order by mga_BusinessName asc") or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <li class="list-group-item border-0 d-flex justify-content-between">
                    <span class="mr-2"><?php echo $row['mga_BusinessName'] ?></span>
                    <a href="<?php echo BASE_URL ?>companyprofile.php?id=<?php echo $row['id']?>">View Profile</a>
                </li>
            <?php } ?>
        </ul>

        <div class="col-4">
            <h4>Tags</h4>
            <?php
            $con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($con, "SELECT * FROM mga_contacts") or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <a href="#" class="text-info"><?php echo $row['mga_Tags'] ?></a>
            <?php } ?>
        </div>
    </div>
<?php
include("includes/footer.php");
?>