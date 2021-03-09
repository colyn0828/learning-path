<?php
include("../includes/header.php");

session_start();
if (isset($_SESSION['muziyuan7'])) {
    $txtMsg = "You are now logged in";
} else {
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


$con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
$url = $_SERVER['REQUEST_URI'];
$id = $_SERVER['QUERY_STRING'];
if ($id != NULL) {
    $selSql = "SELECT * FROM mga_blog WHERE $id";
    $sql = mysqli_query($con, $selSql) or die(mysqli_error($con));
    $rowSql = mysqli_fetch_array($sql);
}

if (isset($_POST['edit'])) {
    $editSql = "UPDATE mga_blog
                SET mga_title = '$title',
                mga_message = '$entry' WHERE $id";
    mysqli_query($con, $editSql) or die(mysqli_error($con));
}

if (isset($_POST['delete'])) {
    $delSql = "DELETE FROM mga_blog WHERE $id";
    mysqli_query($con, $delSql) or die(mysqli_error($con));
}
?>

    <h2 class="mb-3 text-secondary">Edit Entry</h2>
    <div class="container d-flex justify-content-between p-2">
        <form class="col-6 p-0" id="myform" name="myform" method="post"
              action="<?php echo htmlspecialchars($url); ?>">
            <div class="form-group form-inline justify-content-between">
                <select class="form-control" name="entryselect" id="entryselect" onchange="go()">
                    <?php
                    $con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $option = mysqli_query($con, "SELECT * FROM mga_blog") or die(mysqli_error($con));
                    while ($optSql = mysqli_fetch_array($option)) {
                        ?>
                        <option id="<?php echo $optSql['bid'] ?>" value="<?php echo $_SERVER['PHP_SELF'] ?>?bid=<?php echo $optSql['bid'] ?>"
                            <?php if($_GET['bid'] == $optSql['bid']) echo"selected"; ?>>
                            <?php echo $optSql['mga_title'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <script>
                // $(function() {
                //     if (localStorage.getItem('entryselect')) {
                //         $("#entryselect option").eq(localStorage.getItem('entryselect')).prop('selected', true);
                //     }
                //
                //     $("#entryselect").on('change', function() {
                //         localStorage.setItem('entryselect', $('option:selected', this).index());
                //     });
                // });
            </script>

            <div class="form-group">
                <label for="title" class="font-weight-bold text-info">Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $rowSql['mga_title'] ?>">
                <?php
                if (isset($_POST['insert'])) {
                    if (!$validateTitle) {
                        if ($title == "") {
                            echo "<div class=\"col-12 alert alert-info\">Please enter your title</div>";
                        } else {
                            echo "<div class=\"col-12 alert alert-info\">Please enter a title between 5 and 20 characters</div>";
                        }
                    } else {
                        echo "<div class=\"col-12 alert alert-success\">Validate title successfully</div>";
                    }
                }
                ?>
            </div>

            <div class="form-group">
                <label for="entry" class="font-weight-bold text-info">Entry</label>
                <textarea name="entry" class="form-control"><?php echo $rowSql['mga_message'] ?></textarea>
                <?php
                if (isset($_POST['insert'])) {
                    if (!$validateEntry) {
                        if ($entry == "") {
                            echo "<div class=\"col-12 alert alert-info\">Please enter your emoticon</div>";
                        } else {
                            echo "<div class=\"col-12 alert alert-info\">Please enter a emoticon between 10 and 300 characters</div>";
                        }
                    } else {
                        echo "<div class=\"col-12 alert alert-success\">Validate entry successfully</div>";
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
                <label for="edit">&nbsp;</label>
                <input type="submit" name="edit" class="btn btn-info" value="Edit Entries">
            </div>
            <div class="form-group">
                <label for="delete">&nbsp;</label>
                <input type="submit" name="delete" class="btn btn-danger" value="Delete Entries"
                       onclick="return confirm('Are you sure?')">
            </div>
        </form>
    </div>


<?php
include("../includes/footer.php");
?>