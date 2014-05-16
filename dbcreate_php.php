<html>
<head>
<link rel="stylesheet" href="style/style.css" type="text/css"/>
</head>
<?php
$host ="localhost"; // your host name
$username ="root"; // your user name to access MySql
$password = ""; // your password to access MySql
$database = "userpass"; // The name of the database
$databasepf= "portfolio"; // The name of the database for portfolio
 if (!$link  = @mysql_connect($host,$username,$password))
{
die('Could not connect:'. mysql_error());
 }

$sql1= 'CREATE DATABASE '.$database;
if (mysql_query($sql1, $link))
 {
    echo "Database ".$database." created successfully";
	echo "<br>";
	echo "<br>";
	echo "<br>";
} 
else
 {
    echo 'Error creating database: ' . mysql_error(); 
}

$sql2= 'CREATE DATABASE '.$databasepf;
if (mysql_query($sql2, $link))
 {
    echo "Database ".$database." created successfully";
	echo "<br>";
	echo "<br>";
	echo "<br>";
} 

else
 {
    echo 'Error creating database: ' . mysql_error(); 
}
mysql_select_db($database) or die("unable to select the database");

$sql='CREATE TABLE info(
user_id INTEGER AUTO_INCREMENT,
user_name VARCHAR(255) NOT NULL DEFAULT "test",
user_password VARCHAR(150) NOT NULL DEFAULT "test",
fail_count INTEGER NOT NULL DEFAULT 1, 	
login_created TIMESTAMP,
Active VARCHAR(3) NOT NULL DEFAULT "Y",
PRIMARY KEY (user_id)
)';

if (mysql_query($sql, $link)) {
    echo "Database for User-Name and password created successfully\n";
} else {
    echo 'Error creating table: ' . mysql_error() . "\n";
}
mysql_close($link);
?>
</html>