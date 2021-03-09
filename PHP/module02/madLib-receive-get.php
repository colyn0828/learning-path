<!DOCTYPE html>
<html>
<head>
    <title>Receiving Form Data</title>
    <head>
        <title>MadLib Activity Forms</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>

        <style type="text/css">

            form { /* Optional: Just to show how you can still style BS4 Forms */
                max-width: 500px;
            }
        </style>

    </head>
</head>
<body>
<div class="container">

    <?php
    if (isset($_GET['firstname'])) {
        $firstname = $_GET['firstname'];
        echo "<p><b>First Name:</b> " . $firstname . "</p>";
    }

    if (isset($_GET['lastname'])) {
        $lastname = $_GET['lastname'];
        echo "<p><b>Last Name:</b> " . $lastname . "</p>";
    }
    if (isset($_GET['color'])) {
        $color = $_GET['color'];
        echo "<p><b>Favourite Color:</b> " . $color . "</p>";
    }
    if (isset($_GET['clothing'])) {
        $clothing = $_GET['clothing'];
        echo "<p><b>Article of Clothing:</b> " . $clothing . "</p>";
    }
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        echo "<p><b>Email:</b> " . $email . "</p>";
    }
    if (isset($_GET['age'])) {
        $age = $_GET['age'];
        echo "<p><b>Age:</b> " . $age . "</p>";
    }
    if (isset($_GET['comments'])) {
        $comments = $_GET['comments'];
        echo "<p><b>Comments:</b> " . $comments . "</p>";
    }
    if (isset($_GET['newsletter'])) { /* From a checkbox. If no value, will return "on" if set; nothing if not. */
        $newsletter = $_GET['newsletter'];
        echo "<p><b>Newsletter:</b> " . $newsletter . "</p>";
    }
    if (isset($_GET['gender'])) {
        $gender = $_GET['gender'];
        echo "<p><b>Gender:</b> " . $gender . "</p>";
    }
    ?>

</div>
</body>
</html>