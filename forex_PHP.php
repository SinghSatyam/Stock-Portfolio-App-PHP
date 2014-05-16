<html>
<head>
<link rel="stylesheet" href="style/style.css" type="text/css"/>
</head>
<?php
$from   = "$_POST[from]"; 
$to    = "$_POST[to]";



$url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
$handle = @fopen($url, 'r');

if ($handle) {
    $result = fgets($handle, 4096);
    fclose($handle);
}
$allData = explode(',',$result); /* Get all the contents to an array */
$dollarValue = $allData[1];

echo "1 ".$from."  =  ".$dollarValue." ".$to;

?>
</html>