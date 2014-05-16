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
<BR>
<BR>
<BR>
<center><h1>ARTICALS</h1></center>

<center>
<div id="articles">
<h2></h2>
<p>
Having said that, let me touch on the last comment regarding stops. One of the first things I want to know before I take a trade is how much I am likely to lose in case I am wrong (and I will definitely be wrong some of the time). This helps me to determine two things: position sizing and profit expectation. If I am willing to lose $1000.00 on a trade and the natural stop is 1 point away, then a position size of 1000 shares will be obvious. Furthermore, if I want to keep my reward-to-risk relationship at 3 or 4 to 1, then I would look to pull at least 3 times my potential loss out of the trade on the profit side. This would be a 3 point profit for this example.

Now, how do I go about finding those trades? Each night I begin with all the stocks in the market and run some basic scans on them which filter out the low-dollar stocks and the low-volume stocks using TCNet, my charting software. Once I have the remaining list, which is typically about 1600 stocks, I sort that list by their close relative to that day’s range. This simply means the stocks at the top of the list finished the day near their highs, and the stocks at the bottom of the list finished near their lows. Sorting by this helps me to first find my likely long candidates and then move on to the short candidates, as I typically like continuation plays. Once the list is sorted, I use the spacebar to screen each stock in pretty rapid succession. Going through the list takes me about an hour. Simply scrolling through so many stocks each night also helps keep tabs on the overall market health.
</p>
</div>
</center>
</body>
</html>