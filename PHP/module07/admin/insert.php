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
    $description = trim($description);
    if (strlen($description) < 10 || strlen($description) > 300) {
        return false;
    } else {
        return true;
    }
}
$validateDescription = validate_description($description);


if (isset($_POST['insert'])) {
    $con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if ($validateBusinessName && $validatePersonName && $validateEmail && $validateCity && $validateAddress && $validatePostal && $validateUrl && $validatePhone && $validateDescription && $validateTags){
        $sql = "INSERT INTO mga_contacts (mga_BusinessName,mga_PersonName,mga_EmailAddress,mga_Url,mga_Phone,mga_Address,mga_City,mga_Province,mga_Postal,mga_Description,mga_Resume,mga_Tags)
VALUES ('$businessName', '$personName', '$email','$url','$phone','$address','$city','$province','$postal','$description','$resume','$tags')";
        mysqli_query($con, $sql) or die(mysqli_error($con));
    }

}
?>

    <h2>Insert New Contacts</h2>
    <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group form-inline justify-content-between">
            <label for="businessName">Business Name*</label>
            <input type="text" name="businessName" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
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
            <input type="text" name="personName" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
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
            <input type="email" name="email" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
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
            <input type="text" name="url" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
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
            <input type="text" name="phone" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
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
            <input type="text" name="address" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
                if (!$validateAddress) {
                    echo "<div class=\"col-12 alert alert-info\">Please enter your address</div>";
                }
            }
            ?>
        </div>

        <div class="form-group form-inline justify-content-between">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
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
            <input type="text" name="postal" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
                if (!$validatePostal) {
                    echo "<div class=\"col-12 alert alert-info\">Please select your postal code</div>";
                }
            }
            ?>
        </div>

        <div class="form-group form-inline justify-content-between">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
            <?php
            if (isset($_POST['insert'])) {
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
            <input type="text" name="tags" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
                if (!$validateTags) {
                    if ($tags == "") {
                        echo "<div class=\"col-12 alert alert-info\">Please enter your tag</div>";
                    } else {
                        echo "<div class=\"col-12 alert alert-info\">Please enter a tag between 3 and 20 characters</div>";
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