<?php
include("../includes/header.php");
include("../includes/_functions.php");

session_start();
if(isset($_SESSION['muziyuan7'])) {
    $txtMsg = "You are now logged in";
}else {
    header("Location:login.php");
}


$title = $_POST['title'];
$entry = $_POST['entry'];

// Title validation
function validate_title($title)
{
    $title = trim($title);
    if (strlen($title) < 5 || strlen($title) > 20) {
        return false;
    } else {
        return true;
    }
}
$validateTitle = validate_title($title);

// Entry validation
function validate_entry($entry)
{
    $entry = trim($entry);
    if (strlen($entry) < 10 || strlen($entry) > 300) {
        return false;
    } else {
        return true;
    }
}
$validateEntry = validate_entry($entry);



if (isset($_POST['insert'])) {
    $con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if ($validateTitle && $validateEntry){
        $sql = "INSERT INTO mga_blog (mga_title, mga_message) VALUES ('$title', '$entry')";
        mysqli_query($con, $sql) or die(mysqli_error($con));
    }
}
?>

    <h2 class="mb-3 text-secondary">Insert a Blog Entry</h2>
    <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group">
            <label for="title" class="font-weight-bold text-info">Title</label>
            <input type="text" name="title" class="form-control">
            <?php
            if (isset($_POST['insert'])) {
                if (!$validateTitle) {
                    if ($title == "") {
                        echo "<div class=\"col-12 alert alert-info\">Please enter your title</div>";
                    } else {
                        echo "<div class=\"col-12 alert alert-info\">Please enter a title between 5 and 20 characters</div>";
                    }
                }
                else {
                    echo "<div class=\"col-12 alert alert-success\">Insert title successfully</div>";
                }
            }
            ?>
        </div>

        <div class="form-group">
            <label for="entry" class="font-weight-bold text-info">Entry</label>
            <textarea name="entry" class="form-control"></textarea>
            <?php
            if (isset($_POST['insert'])) {
                if (!$validateEntry) {
                    if ($entry == "") {
                        echo "<div class=\"col-12 alert alert-info\">Please enter your emoticon</div>";
                    } else {
                        echo "<div class=\"col-12 alert alert-info\">Please enter a emoticon between 10 and 300 characters</div>";
                    }
                }
                else {
                    echo "<div class=\"col-12 alert alert-success\">Insert entry successfully</div>";
                }
            }
            ?>
        </div>

        <div class="m-2 d-flex flex-row-reverse">
            <a href="javascript:emoticon(':{')" class="mr-2">
                <img src="../emoticons/icon_confused.gif" alt="" width="15" height="15" border="0">
            </a>
            <a href="javascript:emoticon(':)')" class="mr-2">
                <img src="../emoticons/icon_smile.gif" alt="" width="15" height="15" border="0">
            </a>
            <a href="javascript:emoticon(':(')" class="mr-2">
                <img src="../emoticons/icon_sad.gif" alt="" width="15" height="15" border="0">
            </a>
            <a href="javascript:emoticon(':o')" class="mr-2">
                <img src="../emoticons/icon_eek.gif" alt="" width="15" height="15" border="0">
            </a>
        </div>

        <div class="form-group">
            <label for="insert">&nbsp;</label>
            <input type="submit" name="insert" class="btn btn-info" value="Insert">
        </div>
    </form>

<?php
include("../includes/footer.php");
?>