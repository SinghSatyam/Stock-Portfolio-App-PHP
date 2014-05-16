<?php
$host ="localhost"; // your host name
$username ="root"; // your user name to access MySql
$password = ""; // your password to access MySql
$database = "portfolio"; //
session_start();

if (!$link = @mysql_connect($host,$username,$password))
{
die('Could not connect:'. mysql_error());
}

mysql_select_db($database) or die("Unable to select the database");
$user_name=$_SESSION['user_name'];

$sql="SELECT port_stcode FROM ".$user_name."";
$result = mysql_query($sql);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

while ($row = mysql_fetch_assoc($result)) {
   
   $stcode=$row['port_stcode'];
    
	$url = "http://quote.yahoo.com/d/quotes.csv?s=".$row['port_stcode']."&f=k2vm2ohgl1p&e=.csv";
	$filesize = 2000;
	$handle = fopen($url, "r");
	$raw_quote_data = fread($handle, $filesize);
	fclose($handle);
	$quote = explode(",", $raw_quote_data);
	$changeprc= str_replace("\"", "", $quote[0]);
	$voltraded= str_replace("\"", "", $quote[1]);
	$daysrange= str_replace("\"", "", $quote[2]);
	$openprc=str_replace("\"", "", $quote[3]);
	$highprc= str_replace("\"", "", $quote[4]);
	$lowprc= str_replace("\"", "", $quote[5]);
	$lasttrade= str_replace("\"", "", $quote[6]);
	$prvcls= str_replace("\"", "", $quote[7]);
	
	$sql = " UPDATE ".$user_name." SET
	port_changeprc='$changeprc',port_voltraded='$voltraded',port_daysrange='$daysrange',port_openpr='$openprc',port_highpr='$highprc',port_lowpr='$lowprc',port_lasttrade='$lasttrade',port_prvcls='$prvcls'	 WHERE port_stcode='$stcode';";
	
	if (mysql_query($sql,$link)) {
echo "Refreshing done successfully";
} else {
echo "<h3 align='center'>Error </h3>".mysql_error() . "\n";
}
   
}

 header( 'Location: portfolio_home.php' ) ;
mysql_free_result($result);

?>
