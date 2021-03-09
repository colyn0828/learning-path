<?php
include("../includes/header.php");

session_start();
if(isset($_SESSION['muziyuan7'])) {
    $txtMsg = "You are now logged in";
}else {
    header("Location:login.php");
}

$businessName = $_POST['businessName'];
$personName = $_POST['personName'];
$email = $_POST['email'];
$url = $_POST['url'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$province = $_POST['province'];
$postal = $_POST['postal'];
$description = $_POST['description'];
$resume = (int)$_POST['resume'];
$tags = $_POST['tags'];

// Name validation
function validate_name($name)
{
    $name = trim($name);
    if (strlen($name) < 3 || strlen($name) > 20) {
        return false;
    } else {
        return true;
    }
}
$validateBusinessName = validate_name($businessName);
$validatePersonName = validate_name($personName);
$validateTags = validate_name($tags);

// Email validation
function validate_email($email)
{
    $email = trim($email);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
$validateEmail = validate_name($email);

// Address validation
function validate_country($address)
{
    $address = trim($address);
    if ($address == "") {
        return false;
    } else {
        return true;
    }
}
$validateCity = validate_country($city);
$validateAddress = validate_country($address);
$validatePostal = validate_country($postal);

// Web URL validation
function validate_url($url)
{
    $url = trim($url);
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return true;
    } else {
        return false;
    }
}
$validateUrl = validate_url($url);

// Phone Number validation
function validate_phone($phone)
{
    $phone = trim($phone);
    if (filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
        return true;
    } else {
        return false;
    }
}
$validatePhone = validate_phone($phone);

// Description validation
function validate_description($description)
{
    $firstName = trim($description);
    if (strlen($description) < 10 || strlen($description) > 300) {
        return false;
    } else {
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
if ($id != NULL) {
    $selSql = "SELECT * FROM mga_contacts WHERE $id";
    $sql = mysqli_query($con, $selSql) or die(mysqli_error($con));
    $rowSql = mysqli_fetch_array($sql);
}

if (isset($_POST['edit'])) {
    $editSql = "UPDATE mga_contacts
            SET mga_BusinessName = '$businessName',
                mga_PersonName = '$personName',
                mga_EmailAddress = '$email',
                   mga_Url = '$url',
                mga_Phone = '$phone',
                mga_Address = '$address',
                mga_City = '$city',
                   mga_Postal = '$postal',
                mga_Description = '$description',
                mga_Resume = '$resume',
                mga_Tags = '$tags' WHERE $id";
    mysqli_query($con, $editSql) or die(mysqli_error($con));
}

if (isset($_POST['delete'])) {
    $delSql = mysqli_query($con, "DELETE FROM mga_contacts WHERE $id") or die(mysqli_error($con));
    $rowSql = mysqli_fetch_array($delSql);
    $rowSql['mga_BusinessName'] = "";
    $rowSql['mga_PersonName'] = "";
    $rowSql['mga_EmailAddress'] = "";
    $rowSql['mga_Url'] = "";
    $rowSql['mga_Phone'] = "";
    $rowSql['mga_Address'] = "";
    $rowSql['mga_City'] = "";
    $rowSql['mga_Postal'] = "";
    $rowSql['mga_Description'] = "";
    $rowSql['mga_Resume'] = "";
    $rowSql['mga_Tags'] = "";
}
?>

    <h2>Edit Contacts</h2>
    <div class="container d-flex justify-content-between p-2">
        <form class="col-6 p-0" id="myform" name="myform" method="post"
              action="<?php echo htmlspecialchars($url); ?>">
            <div class="form-group form-inline justify-content-between">
                <label for="businessName">Business Name*</label>
                <input type="text" name="businessName" class="form-control" value="<?php echo $rowSql['mga_BusinessName']; ?>">
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validateBusinessName) {
                        if ($businessName == "") {
                            echo "<div class=\"col-12 alert alert-info\">Please enter your business name</div>";
                        } else {
                            echo "<div class=\"col-12 alert alert-info\">Please enter a business name between 3 and 20 characters</div>";
                        }
                    }
                }
                ?>
            </div>

            <div class="form-group form-inline justify-content-between">
                <label for="personName">Person Name</label>
                <input type="text" name="personName" class="form-control" value="<?php echo $rowSql['mga_PersonName'] ?>">
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validatePersonName) {
                        if ($personName == "") {
                            echo "<div class=\"col-12 alert alert-info\">Please enter your name</div>";
                        } else {
                            echo "<div class=\"col-12 alert alert-info\">Please enter a name between 3 and 20 characters</div>";
                        }
                    }
                }
                ?>
            </div>

            <div class="form-group form-inline justify-content-between">
                <label for="email">Email Address*</label>
                <input type="email" name="email" class="form-control" value="<?php echo $rowSql['mga_EmailAddress'] ?>">
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validateEmail) {
                        if ($email == "") {
                            echo "<div class=\"col-12 alert alert-info\">Please enter your email address</div>";
                        } else {
                            echo "<div class=\"col-12 alert alert-info\">Please enter valid email address</div>";
                        }
                    }
                }
                ?>
            </div>

            <div class="form-group form-inline justify-content-between">
                <label for="url">Website address (URL)*</label>
                <input type="text" name="url" class="form-control" value="<?php echo $rowSql['mga_Url'] ?>">
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validateUrl) {
                        if ($url == "") {
                            echo "<div class=\"col-12 alert alert-info\">Please enter your web site address</div>";
                        } else {
                            echo "<div class=\"col-12 alert alert-info\">Please enter a valid web site address</div>";
                        }
                    }
                }
                ?>
            </div>

            <div class="form-group form-inline justify-content-between">
                <label for="phone">Phone Number*</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $rowSql['mga_Phone'] ?>">
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validatePhone) {
                        if ($phone == "") {
                            echo "<div class=\"col-12 alert alert-info\">Please enter your phone number</div>";
                        } else {
                            echo "<div class=\"col-12 alert alert-info\">Please enter a valid phone number</div>";
                        }
                    }
                }
                ?>
            </div>

            <div class="form-group form-inline justify-content-between">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $rowSql['mga_Address'] ?>">
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validateAddress) {
                        echo "<div class=\"col-12 alert alert-info\">Please enter your address</div>";
                    }
                }
                ?>
            </div>

            <div class="form-group form-inline justify-content-between">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" value="<?php echo $rowSql['mga_City'] ?>">
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validateCity) {
                        echo "<div class=\"col-12 alert alert-info\">Please enter your city name</div>";
                    }
                }
                ?>
            </div>

            <div class="form-group form-inline justify-content-between">
                <label for="province">Province</label>
                <select class="form-control" name="province">
                    <option>Alberta</option>
                    <option>British Columbia</option>
                    <option>Manitoba</option>
                    <option>New Brunswick</option>
                    <option>Newfoundland and Labrador</option>
                    <option>Nova Scotia</option>
                    <option>Ontario</option>
                    <option>Prince Edward Island</option>
                    <option>Quebec</option>
                    <option>Saskatchewan</option>
                    <option>Northwest Territories</option>
                    <option>Nunavut</option>
                    <option>Yukon</option>
                </select>
            </div>

            <div class="form-group form-inline justify-content-between">
                <label for="postal">Postal</label>
                <input type="text" name="postal" class="form-control" value="<?php echo $rowSql['mga_Postal'] ?>">
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validatePostal) {
                        echo "<div class=\"col-12 alert alert-info\">Please select your postal code</div>";
                    }
                }
                ?>
            </div>

            <div class="form-group form-inline justify-content-between">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"><?php echo $rowSql['mga_Description'] ?></textarea>
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validateDescription) {
                        if ($description == "") {
                            echo "<div class=\"col-12 alert alert-info\">Please enter your Description</div>";
                        } else {
                            echo "<div class=\"col-12 alert alert-info\">Please enter a description between 10 and 300 characters</div>";
                        }
                    }
                }
                ?>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="resume" value="1">
                <label class="form-check-label" for="resume">Resume</label>
                <?php
                if (isset($_POST['insert'])){
                    if ($_POST['resume']==""){
                        echo "<div class=\"col-12 alert alert-info\">The checkbox is not checked</div>";
                    }
                }
                ?>
            </div>

            <div class="form-group form-inline justify-content-between">
                <label for="tags">Tags</label>
                <input type="text" name="tags" class="form-control" value="<?php echo $rowSql['mga_Tags'] ?>">
                <?php
                if (isset($_POST['edit'])) {
                    if (!$validateTags) {
                        if ($tags == "") {
                            echo "<div class=\"alert alert-info\">Please enter your tag</div>";
                        } else {
                            echo "<div class=\"alert alert-info\">Please enter a tag between 3 and 20 characters</div>";
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
                <input type="submit" name="delete" class="btn btn-danger" value="Delete Characters"
                       onclick="return confirm('Are you sure?')">
            </div>
        </form>
        <div class="col-4 border">
            <h3>Characters</h3>
            <?php
            $result = mysqli_query($con, "SELECT * FROM mga_contacts order by mga_BusinessName asc") or die(mysqli_error($con));
            $links = $_SERVER['PHP_SELF'];
            while ($row = mysqli_fetch_array($result)) {
                $thisId = $row['id'];
                $thisBusinessName = $row['mga_BusinessName'];
                $editlinks = "\n<div class=\"post-preview\">";
                $editlinks .= "\n<a href=\"$links?id=$thisId\">" . $thisBusinessName . "</a><br/>";
                $editlinks .= "</div>";
                echo $editlinks;
            }
            ?>
        </div>
    </div>


<?php
include("../includes/footer.php");
?>