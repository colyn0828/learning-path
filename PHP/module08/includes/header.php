<?php
include("mysql_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script type="text/javascript">
        function emoticon(text) {
            var txtarea = document.myform.entry;
            text = ' ' + text + ' ';
            if (txtarea.createTextRange && txtarea.caretPos) {
                var caretPos = txtarea.caretPos;
                caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text + ' ' : text;
                txtarea.focus();
            } else {
                txtarea.value += text;
                txtarea.focus();
            }
        }
    </script>
    <script>
        function go() {
            // gets form element by the id.
            box = document.getElementById('entryselect');
            destination = box.options[box.selectedIndex].value;
            if (destination) {
                location.href = destination;
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>css/styles.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 fixed-top">
    <a class="navbar-brand" href="<?php echo BASE_URL ?>index.php">Blog</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">ADMIN</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="<?php echo BASE_URL ?>admin/insert.php">Insert</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL ?>admin/edit.php">Edit</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">



    

      

    




