<?php
$host ="localhost"; // your host name
$username ="root"; // your user name to access MySql
$password = ""; // your password to access MySql
$database = "userpass"; 
$timestamp=time();// The name of the database
if (!$link = @mysql_connect($host,$username,$password))
{
die('Could not connect:'. mysql_error());
}

mysql_select_db($database) or die("unable to select the database");
session_start();
$user_name="$_POST[user_name]";
$_SESSION['user_name']=$user_name;

$user_password=md5("$_POST[user_password]");
$_SESSION['user_password']=$user_password;

$sql="SELECT user_name FROM info WHERE user_name='$user_name' AND user_password='$user_password' AND Active='Y'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);

$sql1="SELECT fail_count FROM info WHERE user_name='$user_name'";
$result1=mysql_query($sql1);




if($count==1)
{
$sql3 = "UPDATE info SET fail_count=1 where user_name='$user_name'";
mysql_query($sql3);

   header( 'Location: index.php' ) ;


}
else {
echo "Wrong Username or Password and this is your ";

while($value=mysql_fetch_array($result1))
{
echo $value['fail_count'];
$count2=$value['fail_count'];
$count1=$count2+1;
echo "th ";
}
echo "time";



$sql2="UPDATE info SET fail_count='$count1' WHERE user_name='$user_name'";
mysql_query($sql2);

if($count2>=5)
{
$sql4="UPDATE info SET Active='N' WHERE user_name='$user_name'";
mysql_query($sql4);
}

exit();

}


mysql_close($link);



?>


