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
<br>
<br>
<br>

<form name="form1" method="post" action="sell_final.php"> 
  <table align="center" border="0" cellspacing="0" width="300px">
    <tr>
      <td align="center">ENTER THE SR NUMBER TO SELL:</td>
    </tr>
	<br>
    <tr>
      <td align="center"><input type="text" size="30" name="SN" id="SN"/></td>
    </tr>
    
	<tr>
    	<td align="center">QUANTITY:</td></tr>
    <tr>
      <td align="center"><input type="text" name="sellqty" id="sellqty" size="30" /></td>
    </tr>
	
	<tr>
		<td align="center"><input type="submit" name="Submit" value="Sell Stock"></td>
	</tr>

	</table>
</form>

</body>
</html>
<center>
<div id="tables">
<?php
$check_sell="$_POST[check_sell]";

$host ="localhost"; // your host name
$username ="root"; // your user name to access MySql
$password = ""; // your password to access MySql
$database = "portfolio"; // The name of the database
session_start();
 $_SESSION['check_sell']=$check_sell;
if (!$link = @mysql_connect($host,$username,$password))
{
die('Could not connect:'. mysql_error());
}

mysql_select_db($database) or die("Unable to select the database");

$sql1="SELECT SN,port_scrname,port_qty,port_tradeprice,port_trade_date FROM ".$_SESSION['user_name']." WHERE port_stcode='$check_sell' and port_qty>0;";
$result = mysql_query($sql1)
or die("SELECT Error: ".mysql_error());
$num_rows = mysql_num_rows($result);
print "<table width=500 border=1>\n";
print "<th>SN</th><th>Script Name</th><th>Quantity Owned</th><th>Purchase Price</th><th>Purchase Date</th>";
while ($get_info = mysql_fetch_row($result))
{
print "<tr>\n";
foreach ($get_info as $field)
print "\t<td>$field</td>\n";
print "</tr>\n";
}
print "</table>\n";

?>
</div>
</center>

