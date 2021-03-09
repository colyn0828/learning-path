<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
/*
fOpen is a way of opening a flatfile (any text file) and writing data to it or reading data from it.
Used to be used a lot when true databases were expensive or difficult.
3 ways to open it:
w = write
a = append (keeps the existing and writes new stuff to the end)
r = read: we need to use the fgets() to actually read the content though

*/

	$handle = fopen("datafile.txt", "w");//open the file for writing
	
	fwrite($handle, "NEW text string here");// write to it
	fclose($handle);// close the file
?>
</body>
</html>
