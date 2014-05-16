<!DOCTYPE>
<html>
	<head>
		<title>Stock Market</title>
		<meta name="author" content="Alok Asawa, BBA-IT" />
		<link rel="stylesheet" href="style/style.css" type="text/css" />
<!-- Drop Down -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="jquery/jquery.uniform.min.js" type="text/javascript" charset="utf-8"></script>
    
	<link href="style/drop_down/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="style/drop_down/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
<!--[if lte IE 7]>
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery.dropdown.js"></script>
<![endif]-->

	</head>

	<body>
		<div id="wrap">
<!-- Logo Comes Here -->	

			<div id="logo">
				<img src="images/stock_bull.jpg" />
			</div>
			
			<div id="webname">
				<h1>VIRTUAL STOCKS ............easel your future</h1>
				
			</div>

			<div id="login">
				<a href="homepage.php"><img src="images/login_register.png" style="margin:0 0 0 20px" /></a>
			</div>
			<br />

<ul id="nav" class="dropdown dropdown-horizontal">
	<li class="first"><a href="index.php">HOME</a></li>
	<li class="dir">PORTFOLIO
		<ul>
			<li class="first"><a href="portfolio_home.php">User Portfolio</a></li>	
			<li><a href="purchase_record.php">Purchase Records</a></li>
			<li><a href="sell_record.php">Sales Record</a></li>
			<li><a href="watchlist.php">Watchlist</a></li>
			<li><a href="global_trends.php">Global Trends</a></li>
			<li><a href="newspaper.php">Newspaper</a></li>
			<li class="last"><a href="expert_views.php">Expert Views</a></li>
		</ul>
	</li>
	<li class="dir">GUIDELINES
		<ul>
			<li class="first"><a href="guideline_stock.php">Stock</a></li>
			<li><a href="ideal_portfolio.php">Ideal Portfolio</a></li>			
			<li class="last"><a href="Tips.php">Tips</a></li>
		</ul>
	</li>
	<li class="dir">ASK &amp; DISCUSS
		<ul>
			<li><a href="compare_form.php">Compare Stocks</a></li>
			<li><a href="points_of_discussion.php">Discussion</a></li>
			<li class="last"><a href="queries.php">Queries</a></li>
		</ul>
	</li>
	
	<li><a class="dir">TUTORIALS</a>
		<ul>
			<li class="first"><a href="articals.php">Articals</a></li>
			<li><a href="literature.php">Literature</a></li>
			<li class="last"><a href="tutorials.php">Tutorials</a></li>
		</ul>
	</li>
	<li><a href="feedback.php">FEEDBACK</a></li>
	<li class="dir last">
		<form method="get" action="http://www.google.com/search">
			<label for="search">Search:</label>
			<input type="text" name="q" id="search" class="text" value="Search me!" onFocus="if (this.value == 'Search me!') this.value = '';" 			onBlur="if (this.value == '') this.value = 'Search me!';" maxlength="255" />
			<input type="image" src="style/drop_down/images/btn_search.png" class="button" />
		</form>
	</li>
</ul>
</div>

<?php
ini_set("display_errors",0);
session_start();
if($_SESSION['user_name'])
{
 echo "Logged in as : ".$_SESSION['user_name'];
 }
?>
<a href="logout.php"><input type="submit" value="Sign Out"></a>
<?php
 
$host ="localhost"; // your host name
$username ="root"; // your user name to access MySql
$password = ""; // your password to access MySql
$database = "userpass"; // The name of the database

$user_name="$_POST[user_name]";
 
$user_password=md5("$_POST[user_password]");

if (!$link = @mysql_connect($host,$username,$password))
{
die('Could not connect:'. mysql_error());
}

mysql_select_db($database) or die("Unable to select the database");


if(mysql_num_rows(mysql_query("SELECT user_name FROM info WHERE user_name = '$user_name'")))
{
echo "Username exists";
exit();
}


$sql = " INSERT INTO 
       info(`user_name`, `user_password`)
	   VALUES ('$user_name', '$user_password');";
							
							




if (mysql_query($sql,$link)) {
echo "<h3 align='center'>Registered successfully</h3>\n";
} else {
echo "<h3 align='center'>Error in Registration </h3>".mysql_error() . "\n";
}
mysql_close($link);


$databasepf = "portfolio"; // The name of the database
 if (!$link1  = @mysql_connect($host,$username,$password))
{
die('Could not connect:'. mysql_error());
 }

mysql_select_db($databasepf) or die("unable to select the database");

$sql='CREATE TABLE '.$user_name.'(
SN integer NOT NULL AUTO_INCREMENT,
port_stcode varchar(15),
port_scrname varchar(150) DEFAULT "NA",
port_exch varchar(15) DEFAULT "NA",
port_qty integer Default 0,
port_trade_date TIMESTAMP,
port_tradeprice float,
port_changeprc varchar(20),
port_voltraded varchar(20),
port_daysrange varchar(50),
port_openpr varchar(20),
port_highpr float,
port_lowpr float,
port_lasttrade float,
port_prvcls float,
port_investedamount float,
port_curramount float,
PRIMARY KEY (SN)
)';

if (mysql_query($sql, $link1)) {
    echo "Portfolio for ".$user_name." created successfully";
	echo  "<br>";
} else {
    echo 'Error creating Portfolio: ' . mysql_error() . "\n";
}

$sql1='CREATE TABLE '.$user_name.'pr(
SN integer NOT NULL AUTO_INCREMENT,
port_stcode varchar(15),
port_scrname varchar(150) DEFAULT "NA",
port_qty integer Default 0,
port_trade_date TIMESTAMP,
port_tradeprice float,
PRIMARY KEY (SN)
)';

if (mysql_query($sql1, $link1)) {
    echo "Purchase Record for ".$user_name." created successfully";
	echo  "<br>";
} else {
    echo 'Error creating Portfolio: ' . mysql_error();
	echo  "<br>";
}


$sql1='CREATE TABLE '.$user_name.'sr(
SN integer NOT NULL AUTO_INCREMENT,
port_stcode varchar(15),
port_scrname varchar(150) DEFAULT "NA",
port_qty integer Default 0,
port_sold_date TIMESTAMP,
port_sold_price varchar(15),
PRIMARY KEY (SN)
)';

if (mysql_query($sql1, $link1)) {
    echo "Sales Record for ".$user_name." created successfully";
	echo  "<br>";
} else {
    echo 'Error creating Portfolio: ' . mysql_error();
	echo  "<br>";
}




$sql1='CREATE TABLE '.$user_name.'wl(
SN integer NOT NULL AUTO_INCREMENT,
port_stcode varchar(15),
port_scrname varchar(150) DEFAULT "NA",
port_currentvalue varchar(150),
PRIMARY KEY (SN)
)';

if (mysql_query($sql1, $link1)) {
    echo "Watchlist for ".$user_name." created successfully";
	echo  "<br>";
} else {
    echo 'Error creating Watchlist: ' . mysql_error();
	echo  "<br>";
}
mysql_close($link1);



?>
</body>
</html>

