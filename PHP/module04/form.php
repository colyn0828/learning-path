<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$url = $_POST['url'];
$comments = $_POST['comments'];

// Name validation
function validate_name($name)
{
    $name = trim($name);
    if (strlen($name) < 3 || strlen($name) > 20) {
        return false;
    }
    else {
        return true;
    }
}
$validateName = validate_name($name);

// Email validation
function validate_email($email)
{
    $email = trim($email);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }
}
$validateEmail = validate_name($email);

// Password validation
function validate_password($password)
{
    $password = trim($password);
    if (strlen($password) < 3 || strlen($password) > 20) {
        return false;
    } else {
        return true;
    }
}
$validatePassword= validate_name($password);

// Country validation
function validate_country($country)
{
    $country = trim($country);
    if ($country == "") {
        return false;
    } else {
        return true;
    }
}
$validateCountry = validate_country($country);

// Web URL validation
function validate_url($url)
{
    $url = trim($url);
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return true;
    }
    else {
        return false;
    }
}
$validateUrl = validate_url($url);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PHP Form Validation</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <style type="text/css">
        .container {
            max-width: 960px;
        }

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }

        .border-top-gray {
            border-top-color: #adb5bd;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }

        .lh-condensed {
            line-height: 1.25;
        }

        .btn {
            width: 80px !important;
        }

        .required label:before {
            content: '*';
            color: red;
        }
    </style>
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <h2>DMIT2025-PHP/MYSQL</h2>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <h4 class="mb-3">PHP Form Validation</h4>
            <form class="needs-validation was-validated" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                  method="post">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 required">
                            <label for="name">Name: </label>
                            <input type="text" class="form-control" id="name" name="name">
                            <?php
                            if (isset($_POST['submit'])) {
                                if (!$validateName) {
                                    if ($name == "") {
                                        echo "<div class=\"alert alert-info\">Please enter your name</div>";
                                    } else if (strlen($name) < 3 || strlen($name) > 20) {
                                        echo "<div class=\"alert alert-info\">Please enter a name between 3 and 20 characters</div>";
                                    }
                                }
                            }
                            ?>
                        </div>

                        <div class="mb-3 required">
                            <label for="email">Email address: </label>
                            <input type="text" class="form-control" id="email" name="email"
                                   placeholder="you@example.com">
                            <?php
                            if (isset($_POST['submit'])) {
                                if (!$validateEmail) {
                                    if ($email == "") {
                                        echo "<div class=\"alert alert-info\">Please enter your email address</div>";
                                    }
                                    else {
                                        echo "<div class=\"alert alert-info\">Please enter a correct email address</div>";
                                    }
                                }

                            }
                            ?>
                        </div>

                        <div class="mb-3 required">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control" id="password" name="password">
                            <?php
                            if (isset($_POST['submit'])) {
                                if (!$validatePassword) {
                                    if ($password == "") {
                                        echo "<div class=\"alert alert-info\">Please enter your password</div>";
                                    } else if (strlen($password) < 3 || strlen($password) > 20) {
                                        echo "<div class=\"alert alert-info\">Please enter a password between 3 and 20 characters</div>";
                                    }
                                }
                            }
                            ?>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address: </label>
                            <input type="text" class="form-control" id="address" name="address"
                                   placeholder="1234 Main St">
                        </div>

                        <div class="mb-3">
                            <label for="city">City: </label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Edmonton">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="province">Province: </label>
                            <select class="custom-select d-block w-100" id="province">
                                <option value="">-select a province-</option>
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

                        <div class="mb-3 required">
                            <label for="country">Country: </label>
                            <select class="custom-select d-block w-100" id="country" name="country">
                                <option value="">-select a country-</option>
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Brazil</option>
                                <option>Italy</option>
                                <option>Germany</option>
                                <option>Portugal</option>
                            </select>
                            <?php
                            if (isset($_POST['submit'])) {
                                if (!$validateCountry) {
                                    echo "<div class=\"alert alert-info\">Please select your country</div>";
                                }
                            }
                            ?>
                        </div>

                        <div class="mb-3">
                            <label for="comments">Comments: </label>
                            <textarea class="form-control" name="comments" id="comments"></textarea>
                        </div>

                        <div class="mb-3 required">
                            <label for="url">Website URL: </label>
                            <input type="text" class="form-control" id="url" name="url"
                                   placeholder="http://website.com">
                            <?php
                            if (isset($_POST['submit'])) {
                                if (!$validateUrl) {
                                    if ($url == "") {
                                        echo "<div class=\"alert alert-info\">Please enter your Website URL</div>";
                                    }
                                    else {
                                        echo "<div class=\"alert alert-info\">Please enter a correct Website URL</div>";
                                    }
                                }

                            }
                            ?>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="male" id="male" checked>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="female" id="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="subscription">
                                <label class="form-check-label" for="subscription">
                                    Subscribe to Newsletter
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        if ($validateName && $validateEmail && $validatePassword && $validateCountry && $validateUrl) {
            echo "<div class=\"alert alert-info\">If we can read this, then the form has validated successfully, and we can do whatever we want to with the data.</div>";
        }
    }
    ?>
</div>
</body>
</html>