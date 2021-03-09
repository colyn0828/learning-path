<?php 

include("/home/mgao7/public_html/dmit2025/module03/secure-login-2020/data.php");

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['mysubmit'])){
	if (($username == $username_good) && (password_verify($password, $pw_enc))){
		session_start(); // starts a session, or continues an existing session; MUST be here when using sessions
		$_SESSION['muziyuan7'] = session_id(); // the name of the session: Best if its a randomly typed value (no spaces, special chars) and then copied throughout. This way, its doubtful that the user has an existing session from a previous site they visited. Don' call it 'login', or 'name' or anything else common.
		// MAKE SURE YOU CREATE YOUR OWN SESSIONS VARIABLE NAME OR ELSE OTHER STUDENT WILL BE GRANTED ACCESS IF THEY CREATE THE SAME ONE WITH THEIR SCRIPT.
		$msg = "Welcome " . $username;
		header("Location:welcome.php"); // redirects user to welcome page
	}else {
		
		if($username != "" && $password !=""){
			$msg = "Invalid Login"; // just for testing; in a real site, we wouldn't echo something before the doctype, body, etc.
		}else{
			$msg = "Please enter a Username and Password";
		}
	}
}
?>


 <!-- 

Note: All this styling is in place for a standalone lesson in creating a Secure Login. It must be replaced by whatever template you are using for your application.

  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simple Blog Login</title>
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
        <h2 class="text-center">Log in</h2>
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="mysubmit">Log in</button>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>
    </form>
    <p class="text-center"><a href="#">Create an Account</a></p>
    <?php
    if($msg){
        echo "<div class=\"alert alert-info\">$msg</div>";
    }
    ?>
</div>
</body>
</html>