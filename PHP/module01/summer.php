<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Summer Vacation</title>
    <style type="text/css">
        body {
            font-family: verdana;
            background-color: #ccc;
        }

        #container {
            text-align: center;
            width: 800px;
        }

        .category {
            padding: 10px;
            margin: 10px;
            background-color:#fff;
        }

    </style>
</head>
<body>
<div class="container">
    <?php
    $firstname = "Welcome to 2021";
    echo $firstname;
    echo "<h1>What I Did on My Summber Vacation</h1>\n";
    echo "<br style=\"clear:both\">";
    echo "<div class=\"category\">\n";
    echo "<img src=\"matcha.jpg\" alt=\"matcha\">\n";
    echo "\t\t<p>Learnt to create an advertisement</p>\n";
    echo "\t\t<p>learnt to use PS</p>\n";
    echo "<ul>\n";
    echo "\t\t<li>Worked with basic HTML, CSS, PHP, MySQL for a site</li>\n";
    echo "\t\t<li>Updated work in real time</li>\n";
    echo "</ul>";
    ?>
</div>
</body>
</html>