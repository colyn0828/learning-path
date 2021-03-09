<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php


	$handle = fopen("datafile.txt", "r");
	if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle, 4096);
		$existingText .= $buffer; // once again, we use the append method of building a var
		
    }
	echo $existingText ;
	fclose($handle);
}
?>


</body>
</html>
