<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
</head>
<body>
<form action="calculator.php" method="get">
    <input type="text" name="num1" id="num1">
    <select name="op" id="op">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option selected>/</option>
    </select>
    <input type="text" name="num2" id="num2">
    <button type="submit">Submit</button>
    <?php
    if (isset($_GET['num1'])) {
        $num1 = $_GET['num1'];
        if (isset($_GET['num2'])) {
            $num2 = $_GET['num2'];
            $op = $_GET['op'];
            if ($op) {
                switch ($op) {
                    case '+':
                        $result = $num1 + $num2;
                        break;
                    case '-':
                        $result = $num1 - $num2;
                        break;
                    case '*':
                        $result = $num1 * $num2;
                        break;
                    case '/':
                        $result = $num1 / $num2;
                        break;
                }
                if ($result) {
                    echo "= " . $result;
                }
            }
        }
    }
    ?>
</form>
</body>
</html>