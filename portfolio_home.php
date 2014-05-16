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
<?php
ini_set("display_errors",0);
session_start();
if($_SESSION['user_name'])
{
 echo "Logged in as : ".$_SESSION['user_name'];
 }
?>
<a href="logout.php"><input type="submit" value="Sign Out"></a>
<br>
<br>
<br>
<a href="refresh.php"><h4 align="center">REFRESH</h4></a>
<div id="quote1">
<form name="stock_list" method="POST" action="yahoo_finance.php">
	<input type="text"  align="middle" size="50"  height="30"name="stock_list" />
	<br>
    <input type="submit"  size="50" width="30" name="submitbutton" id="submitbutton" value="Get Quotes">
	<br>
	<br>
    <a href="sell_form.php"><input type="submit"  size="50" width="30" name="submitbutton" id="submitbutton" value="SELL YOUR STOCK"></a>
</form>
</div>
</body>
</html>
<center>
<div id="tables">
<?php
$host ="localhost"; // your host name
$username ="root"; // your user name to access MySql
$password = ""; // your password to access MySql
$database = "portfolio"; // The name of the database
session_start();

if(!$_SESSION['user_name'])
{
 header( 'Location: homepage.php' ) ;
}

if (!$link = @mysql_connect($host,$username,$password))
{
die('Could not connect:'. mysql_error());
}

mysql_select_db($database) or die("Unable to select the database");


if(mysql_num_rows(mysql_query("SELECT SN FROM ".$_SESSION['user_name']." WHERE SN>0"))==0)
{
echo "";
}



else 
{
$sql="update ".$_SESSION['user_name']." SET port_investedamount=port_qty*port_tradeprice;";
mysql_query($sql);

$sql="update ".$_SESSION['user_name']." SET port_curramount=port_qty*port_lasttrade;";
mysql_query($sql);



$sql1="SELECT
port_scrname,port_exch,port_qty,port_trade_date,port_tradeprice,port_changeprc,port_voltraded,port_daysrange,port_openpr,port_highpr,port_lowpr,port_lasttrade,port_prvcls,port_investedamount,port_curramount FROM ".$_SESSION['user_name']." where port_qty>0;";
$result = mysql_query($sql1)
or die("SELECT Error: ".mysql_error());
$num_rows = mysql_num_rows($result);
print "<table width=1000 border=1>\n";
print "<th>Script Name</th><th>Exchange</th><th>Quantity</th><th>Trade Date and Time</th><th>Trade Price</th><th>Change Price</th><th>Volume traded</th><th>Days Range</th><th>Open Price</th><th>High Price</th><th>Low Price</th><th>Last Trade</th><th>Previous Close</th><th>Amount Invested</th><th>Current Value of holding</th>";

while ($get_info = mysql_fetch_row($result))
{

print "<tr>\n";
foreach ($get_info as $field)
print "\t<td>$field</td>\n";

print "</tr>\n";
}

print "</table>\n";
}
?>
</div>
</center>


