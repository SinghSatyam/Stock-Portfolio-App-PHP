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
</body>
</html>

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
$port_qty="$_POST[qty]";

session_start();


$host ="localhost"; // your host name
$username ="root"; // your user name to access MySql
$password = ""; // your password to access MySql
$database = "portfolio"; //
if (!$link = @mysql_connect($host,$username,$password))
{
die('Could not connect:'. mysql_error());
}

mysql_select_db($database) or die("Unable to select the database");

$user_name=$_SESSION['user_name'];
$port_stcode=$_SESSION['port_stcode'];
$port_scrname=$_SESSION['port_name'];
$port_exch=$_SESSION['port_exch'];
$port_purchase_price=$_SESSION['port_purchase_price'];
$port_changeperc=$_SESSION['port_changeperc'];
$port_voltraded=$_SESSION['port_voltraded'];
$port_daysrange=$_SESSION['port_daysrange'];
$port_openpr=$_SESSION['port_openpr'];
$port_highpr=$_SESSION['port_highpr'];
$port_lowpr=$_SESSION['port_lowpr'];
$port_lasttrade=$_SESSION['port_lasttrade'];
$port_prvcls=$_SESSION['port_prvcls'];

$sql = " INSERT INTO 
       ".$user_name."(`port_stcode`, `port_scrname`, `port_exch`, `port_qty`, `port_tradeprice`, `port_changeprc`, `port_voltraded`, `port_daysrange`, `port_openpr`, `port_highpr`, `port_lowpr`, `port_lasttrade`, `port_prvcls`)
	   VALUES ('$port_stcode', '$port_scrname', '$port_exch', '$port_qty', '$port_purchase_price', '$port_changeperc', '$port_voltraded','$port_daysrange','$port_openpr','$port_highpr','$port_lowpr','$port_lasttrade','$port_prvcls');";
							
							




if (mysql_query($sql,$link)) {
echo $port_qty." shares of ".$port_scrname." has been added to you portfolio priced at Rs.".$port_purchase_price;
} else {
echo "<h3 align='center'>Error in insertion </h3>".mysql_error() . "\n";
}


$tablepr=$_SESSION['user_name']."pr";


$sql = " INSERT INTO 
       ".$tablepr."(`port_stcode`, `port_scrname`, `port_qty`, `port_tradeprice`)
	   VALUES ('$port_stcode', '$port_scrname', '$port_qty', '$port_purchase_price');";
	   
	   if (mysql_query($sql,$link)) {
echo "Details of this has also been added to your purchase record";
} else {
echo "<h3 align='center'>Error</h3>".mysql_error() . "\n";
}


?>