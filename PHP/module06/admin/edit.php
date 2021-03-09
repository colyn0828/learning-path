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
    if (strlen($description) < 10 || strlen($description) > 1600) {
        return false;
    }
    else {
        return true;
    }
}
$validateDescription = validate_description($description);




$con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
$id = $_SERVER['QUERY_STRING'];
if ($id!=NULL){
    $sql = mysqli_query($con, "SELECT * FROM mga_characters WHERE $id") or die(mysqli_error($con));
    $rowSql = mysqli_fetch_array($sql);
}


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$description = $_POST['description'];

if (isset($_POST['edit'])) {
    mysqli_query($con, "UPDATE mga_characters SET mga_FirstName = '$firstName',mga_LastName = '$lastName',mga_Description = '$description' WHERE $id") or die(mysqli_error($con));

}

if (isset($_POST['delete'])) {
    mysqli_query($con, "DELETE FROM mga_characters WHERE $id") or die(mysqli_error($con));
    $rowSql['mga_FirstName']="";
    $rowSql['mga_LastName']="";
    $rowSql['mga_Description']="";
}
?>


    <h2>Edit Characters</h2>
    <div class="container d-flex justify-content-between p-2">
        <form class="col-6 p-0" id="myform" name="myform" method="post"
              action="<?php echo htmlspecialchars($url); ?>">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" class="form-control" value="<?php echo $rowSql['mga_FirstName'] ?>">
                <?php
                if (isset($_POST['edit'])) {
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
                <input type="text" name="lastName" class="form-control" value="<?php echo $rowSql['mga_LastName'] ?>">
                <?php
                if (isset($_POST['edit'])) {
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
                <textarea name="description" class="form-control"><?php echo $rowSql['mga_Description'] ?></textarea>
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validateDescription) {
                        if ($description == "") {
                            echo "<div class=\"alert alert-info\">Please enter your Description</div>";
                        } else if (strlen($description) < 10 || strlen($description) > 1600) {
                            echo "<div class=\"alert alert-info\">Please enter a description between 10 and 1600 characters</div>";
                        }
                    }
                }
                ?>
            </div>
            <div class="form-group">
                <label for="edit">&nbsp;</label>
                <input type="submit" name="edit" class="btn btn-info" value="Edit Characters">
            </div>
            <div class="form-group">
                <label for="delete">&nbsp;</label>
                <input type="submit" name="delete" class="btn btn-danger" value="Delete Characters" onclick="return confirm('Are you sure?')">
            </div>
        </form>
        <div class="col-4 border">
            <h3>Characters</h3>
            <?php
            $result = mysqli_query($con, "SELECT * FROM mga_characters") or die(mysqli_error($con));
            $links = $_SERVER['PHP_SELF'];
            while ($row = mysqli_fetch_array($result)) {
                $thisId = $row['id'];
                $thisFirstName = $row['mga_FirstName'];
                $thisLastName = $row['mga_LastName'];
                $editlinks = "\n<div class=\"post-preview\">";
                $editlinks .= "\n<a href=\"$links?id=$thisId\">" . $thisLastName . " " . $thisFirstName . "</a><br/>";
                $editlinks .="</div>";
                echo $editlinks;
            }
            ?>
        </div>
    </div>


<?php
include("../includes/footer.php");
?>