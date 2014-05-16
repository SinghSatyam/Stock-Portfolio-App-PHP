<!--Last Trade: l1
Change:	 c1
Prev Close:	p
Open: o	
Low: g
1y Target Est: t8
Day's Range: m	
52wk Range:	w
Volume:	v 
Market Cap:	j1
P/E Ratio:	r
Price/EPS Estimate Current Year: r6
Div & Yield: y
-->
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
$stock_list=str_replace(" ", "","$_POST[stock_list]");
$url = "http://quote.yahoo.com/d/quotes.csv?s=".$stock_list."&f=nxl1c1pogt8mwvj1rr6y&e=.csv";
$filesize = 2000;
$handle = fopen($url, "r");
$raw_quote_data = fread($handle, $filesize);
fclose($handle);


$quote = explode(",", $raw_quote_data);
$port_name = str_replace("\"", "", $quote[0]);
$port_exch=str_replace("\"", "", $quote[1]);
$port_lasttr=str_replace("\"", "", $quote[2]);
$port_change = str_replace("\"", "", $quote[3]);
$port_pclose = str_replace("\"", "", $quote[4]);
$port_open = str_replace("\"", "", $quote[5]);
$port_low = str_replace("\"", "", $quote[6]);
$port_target = str_replace("\"", "", $quote[7]);
$port_dayrange = str_replace("\"", "", $quote[8]);
$port_52week = str_replace("\"", "", $quote[9]);
$port_vol = str_replace("\"", "", $quote[10]);
$port_mktcap = str_replace("\"", "", $quote[11]);
$port_pe = str_replace("\"", "", $quote[12]);
$port_eps = str_replace("\"", "", $quote[13]);
$port_div = str_replace("\"", "", $quote[14]);


echo "Script Name : ".$port_name."<br>";//$port_name
echo "Exchange : ".$port_exch."<br>";
echo "Last Trade : ".$port_lasttr."<br>";
echo "Change : ".$port_change."<br>";
echo "Prev Close : ".$port_pclose."<br>";
echo "Open : ".$port_open."<br>";
echo "Low : ".$port_low."<br>";
echo "1y Target Est : ".$port_target."<br>";
echo "Day's Range : ".$port_dayrange."<br>";
echo "52wk Range : ".$port_52week."<br>";
echo "Volume : ".$port_vol."<br>";
echo "Market Cap : ".$port_mktcap."<br>";
echo "P/E Ratio : ".$port_pe."<br>";
echo "Price/EPS Estimate Current Year : ".$port_eps."<br>";
echo "Div & Yield : ".$port_div."<br>";
?>
