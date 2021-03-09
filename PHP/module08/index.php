<?php
include("includes/header.php");
include("includes/_functions.php");

//////////// pagination
$con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
$getcount = mysqli_query($con, "SELECT COUNT(*) FROM mga_blog");
$postnum = mysqli_result($getcount, 0);
// this needs a fix for MySQLi upgrade; see custom function below
$limit = 5;
if ($postnum > $limit) {
    $tagend = round($postnum % $limit, 0);
    $splits = round(($postnum - $tagend) / $limit, 0);
    if ($tagend == 0) {
        $num_pages = $splits;
    } else {
        $num_pages = $splits + 1;
    }
    if (isset($_GET['pg'])) {
        $pg = $_GET['pg'];
    } else {
        $pg = 1;
    }
    $startpos = ($pg * $limit) - $limit;
    $limstring = "LIMIT $startpos,$limit";
} else {
    $limstring = "LIMIT 0,$limit";
}
// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field = 0)
{
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
}

?>

    <div class="jumbotron clearfix">
        <h3><?php echo APP_NAME ?></h3>
    </div>
    <div>
        <ul class="list-group">
            <?php
            $con = mysqli_connect("localhost", "mgao7", "root", "mgao7");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $result = mysqli_query($con, "SELECT * FROM mga_blog ORDER BY mga_title $limstring") or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <li class="list-group-item text-light bg-dark mb-3">
                    <div class="d-flex justify-content-between">
                        <span><?php echo $row['mga_title'] ?></span>
                        <span><?php echo date("F j, Y g:i a", strtotime($row['mga_timedate'])) ?></span>
                    </div>
                    <p class="m-0"><?php echo addEmoticons((htmlspecialchars($row['mga_message']))) ?></p>
                    <p class="m-0"><?php echo makeClickableLinks('www.google.com') ?></p>
                </li>
            <?php } ?>
        </ul>
        <div class="pb-5">
            <?php
            if ($postnum > $limit) {
                echo "<strong>Pages:</strong> &nbsp;&nbsp;&nbsp;";
                $n = $pg + 1;
                $p = $pg - 1;
                $thisroot = $_SERVER['PHP_SELF'];
                if ($pg > 1) {
                    echo "<a href=\"$thisroot?pg=$p\"><< prev</a>&nbsp;&nbsp;";
                }
                for ($i = 1; $i <= $num_pages; $i++) {
                    if ($i != $pg) {
                        echo "<a href=\"$thisroot?pg=$i\">$i</a>&nbsp;&nbsp;";
                    } else {
                        echo "$i&nbsp;&nbsp;";
                    }
                }
                if ($pg < $num_pages) {
                    echo "<a href=\"$thisroot?pg=$n\">next >></a>";
                }
                echo "&nbsp;&nbsp;";
            }
            ?>
        </div>
    </div>

<?php
include("includes/footer.php");
?>