<?php
$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$message = $_POST['message'];
$timedate = date('l, F d, Y @ g:i a');
function writeToBlog($thisTitle, $thisSubtitle, $thisMessage, $thisTimedate)
{
    $handle = fopen("blogfile.txt", "r");
    if ($handle) {
        while (!feof($handle)) {
            $buffer = fgets($handle, 4096);
            $existingText .= $buffer;
        }
        fclose($handle);
    }
    $handle = fopen("blogfile.txt", "w");
    $newStuff = "\n<div class=\"post-preview\">";
    $newStuff .= "\n\t<a href='../post.html'>";
    $newStuff .= "\n\t<h2 class=\"post-title\">" . $thisTitle . "</h2>";
    $newStuff .= "\n\t<h3 class=\"post-subtitle\">" . $thisSubtitle . "</h3>";
    $newStuff .= "\n</a>";
    $newStuff .= "\n\t<p class=\"post-timedate\">" . $thisMessage . "</p>";
    $newStuff .= "\n\t<p class=\"post-message\">" . $thisTimedate . "</p>";
    $newStuff .= "\n</div>";
    $allStuff = $newStuff . $existingText;
    fwrite($handle, $allStuff);
    fclose($handle);
}

if (isset($_POST['insertsubmit'])) {
    if ($title != "" && $subtitle != "" && $message != "") {
        writeToBlog($title, $subtitle, $message, $timedate);
    } else {
        $msg = "Please enter a title, subtitle and message";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simple Blog Insert</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="login-form">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h2 class="text-center">Insert New Entry</h2>
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="subtitle" placeholder="Subtitle">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="message" placeholder="Message">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="insertsubmit">Submit</button>
        </div>
    </form>
    <p class="text-center"><a href="../index.php">Home</a></p>
    <?php
    if ($msg) {
        echo "<div class=\"alert alert-info\">$msg</div>";
    }
    ?>
</div>
</body>
</html>