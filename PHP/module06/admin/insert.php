<?php
include("../includes/header.php");

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$description = $_POST['description'];

// Name validation
function validate_name($firstName)
{
    $firstName = trim($firstName);
    if (strlen($firstName) < 3 || strlen($firstName) > 20) {
        return false;
    }
    else {
        return true;
    }
}
$validateFirstName = validate_name($firstName);
$validateLastName = validate_name($lastName);


// Description validation
function validate_description($description)
{
    $firstName = trim($description);
    if (strlen($description) < 10 || strlen($description) > 300) {
        return false;
    }
    else {
        return true;
    }
}
$validateDescription = validate_description($description);






if (isset($_POST['insert'])){
    $con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    mysqli_query($con, "INSERT INTO mga_characters (mga_FirstName,mga_LastName,mga_Description) VALUES ('$firstName', '$lastName', '$description')") or die(mysqli_error($con));
}
?>
    <h2>Insert New Characters</h2>
    <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
                if (!$validateFirstName) {
                    if ($firstName == "") {
                        echo "<div class=\"alert alert-info\">Please enter your name</div>";
                    } else if (strlen($firstName) < 3 || strlen($firstName) > 20) {
                        echo "<div class=\"alert alert-info\">Please enter a name between 3 and 20 characters</div>";
                    }
                }
            }
            ?>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
                if (!$validateLastName) {
                    if ($lastName == "") {
                        echo "<div class=\"alert alert-info\">Please enter your name</div>";
                    } else if (strlen($lastName) < 3 || strlen($lastName) > 20) {
                        echo "<div class=\"alert alert-info\">Please enter a name between 3 and 20 characters</div>";
                    }
                }
            }
            ?>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control"></textarea>
            <?php
            if (isset($_POST['insert'])) {
                if (!$validateDescription) {
                    if ($description == "") {
                        echo "<div class=\"alert alert-info\">Please enter your Description</div>";
                    } else if (strlen($description) < 10 || strlen($description) > 300) {
                        echo "<div class=\"alert alert-info\">Please enter a description between 10 and 300 characters</div>";
                    }
                }
            }
            ?>
        </div>
        <div class="form-group">
            <label for="insert">&nbsp;</label>
            <input type="submit" name="insert" class="btn btn-info" value="Insert">
        </div>
    </form>

<?php
include("../includes/footer.php");
?>