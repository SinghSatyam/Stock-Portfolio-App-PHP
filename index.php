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
	<li class="first"><a href="#">HOME</a></li>
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
<!-- Sensex -->	
			<div id="sensex">
				<table id="mytable" cellspacing="0">
					<tr>
						<th>Indices</th>
						<th>Latest</th>
						<th>Change <br /> &#40;Pts&#41; / &#40;%&#41;</th>
					</tr>
				
					<tr>
						<td>BSE</td>
					
					&nbsp; &nbsp;&nbsp;&nbsp;
					<?php
					ini_set("display_errors",0);
					$url="http://quote.yahoo.com/d/quotes.csv?s=^BSESN&f=l1k2&e=.csv";
					$filesize = 2000;
					$handle = fopen($url, "r");
					$raw_quote_data = fread($handle, $filesize);
					fclose($handle);
					$quote = explode(",", $raw_quote_data);
					echo "<td>".$quote[0]."</td>";
					echo "<td>".$quote[1]."</td>";
					
					?>
				</tr>
			  
				
			
				
				<tr>
					<td>NIFTY 50</td>
					&nbsp; &nbsp;&nbsp;&nbsp;	
					<?php
					$url = "http://quote.yahoo.com/d/quotes.csv?s=^NSEI&f=l1k2&e=.csv";
					$filesize = 2000;
					$handle = fopen($url, "r");
					$raw_quote_data = fread($handle, $filesize);
					fclose($handle);
					$quote = explode(",", $raw_quote_data);
					echo "<td>".$quote[0]."</td>";
					echo "<td>".$quote[1]."</td>";
					
					?>
				</tr>
				
				
				<tr>
					<td>NIFTY JUNIOR</td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
					$url = "http://quote.yahoo.com/d/quotes.csv?s=^NSMIDCP&f=l1k2&e=.csv";
					$filesize = 2000;
					$handle = fopen($url, "r");
					$raw_quote_data = fread($handle, $filesize);
					fclose($handle);
					$quote = explode(",", $raw_quote_data);
					echo "<td>".$quote[0]."</td>";
					echo "<td>".$quote[1]."</td>";
					
					?>
				</tr>
				
		
				<tr>
					<td>DOW</td>
					&nbsp;&nbsp;&nbsp;&nbsp;	
					<?php
					$url = "http://quote.yahoo.com/d/quotes.csv?s=^DJI&f=l1k2&e=.csv";
					$filesize = 2000;
					$handle = fopen($url, "r");
					$raw_quote_data = fread($handle, $filesize);
					fclose($handle);
					$quote = explode(",", $raw_quote_data);
					echo "<td>".$quote[0]."</td>";
					echo "<td>".$quote[1]."</td>";
					
					?>
				</tr>
				
				
				
				<tr>
					<td>NASDAQ</td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
					$url = "http://quote.yahoo.com/d/quotes.csv?s=^IXIC&f=l1k2&e=.csv";
					$filesize = 2000;
					$handle = fopen($url, "r");
					$raw_quote_data = fread($handle, $filesize);
					fclose($handle);
					$quote = explode(",", $raw_quote_data);
					echo "<td>".$quote[0]."</td>";
					echo "<td>".$quote[1]."</td>";
					
					?>
				</tr>
				
				<tr>
				<td>FTSE</td>
				
					&nbsp;&nbsp;&nbsp;&nbsp;	
					<?php
					$url = "http://quote.yahoo.com/d/quotes.csv?s=^FTSE&f=l1k2&e=.csv";
					$filesize = 2000;
					$handle = fopen($url, "r");
					$raw_quote_data = fread($handle, $filesize);
					fclose($handle);
					$quote = explode(",", $raw_quote_data);
					echo "<td>".$quote[0]."</td>";
					echo "<td>".$quote[1]."</td>";
					
					?>
				</tr>
				
				
				<tr>
					<td>DAX</td>
					&nbsp;&nbsp;&nbsp;&nbsp;	
					<?php
					$url = "http://quote.yahoo.com/d/quotes.csv?s=^GDAX&f=l1k2&e=.csv";
					$filesize = 2000;
					$handle = fopen($url, "r");
					$raw_quote_data = fread($handle, $filesize);
					fclose($handle);
					$quote = explode(",", $raw_quote_data);
					echo "<td>".$quote[0]."</td>";
					echo "<td>".$quote[1]."</td>";
					
					?>
				</tr>
				
				
				<tr>
					<td>NIKKEI</td>
					&nbsp;&nbsp;&nbsp;&nbsp;	
					<?php
					$url = "http://quote.yahoo.com/d/quotes.csv?s=^GDAX&f=l1k2&e=.csv";
					$filesize = 2000;
					$handle = fopen($url, "r");
					$raw_quote_data = fread($handle, $filesize);
					fclose($handle);
					$quote = explode(",", $raw_quote_data);
					echo "<td>".$quote[0]."</td>";
					echo "<td>".$quote[1]."</td>";
					
					?>
				</tr>
				
				
				<tr>
					<td>HANG SENG</td>
					&nbsp;&nbsp;&nbsp;&nbsp;	
					<?php
					$url = "http://quote.yahoo.com/d/quotes.csv?s=^GDAX&f=l1k2&e=.csv";
					$filesize = 2000;
					$handle = fopen($url, "r");
					$raw_quote_data = fread($handle, $filesize);
					fclose($handle);
					$quote = explode(",", $raw_quote_data);
					echo "<td>".$quote[0]."</td>";
					echo "<td>".$quote[1]."</td>";
					
					?>
				</tr>
				
				</table>
		  </div>
				
				
				
				


<!-- Maps -->			
			
				<div id="WorldMaps">
				<img src="images/map.jpg" />
				</div>

			
			<br />


			<div id="quote">
			<form name="stock_list" method="POST" action="home_yahoo_finance.php">
			<input type="text" name="stock_list" style="height:40px;width:500px;font-size:20px;color:#804000;font:24px/30px;" />
			<br>
			<input type="submit" name="submitbutton" id="submitbutton" value="Get Quotes" style="font-size:14pt">
			</form>
			<br />			
			</div>

			<br /><br /><br />

			<div id="article">
			<h2>ABOUT THE WORLD MARKETS<br /> IN LAST 24 HOURS</h2>
			
			<p>
					Successful trading is about managing trades once you are in them, regardless of where they came from. I think a great trader could probably turn a profit taking random trades, as long as he manages them well. Now I do believe that finding quality chart patterns is essential, mostly because trading good setups in liquid stocks allows for the best risk/reward relationship on the front end. That is why I run my swing trading website – to highlight the best charts in the market for potential trades. My trade selection process is based on my ability to manage those trades, therefore I want to find only the best. Why not predetermine your stop in case you are wrong by taking the trades with a natural stop-loss nearby?

Having said that, let me touch on the last comment regarding stops. One of the first things I want to know before I take a trade is how much I am likely to lose in case I am wrong (and I will definitely be wrong some of the time). This helps me to determine two things: position sizing and profit expectation. If I am willing to lose $1000.00 on a trade and the natural stop is 1 point away, then a position size of 1000 shares will be obvious. Furthermore, if I want to keep my reward-to-risk relationship at 3 or 4 to 1, then I would look to pull at least 3 times my potential loss out of the trade on the profit side. This would be a 3 point profit for this example.

Now, how do I go about finding those trades? Each night I begin with all the stocks in the market and run some basic scans on them which filter out the low-dollar stocks and the low-volume stocks using TCNet, my charting software. Once I have the remaining list, which is typically about 1600 stocks, I sort that list by their close relative to that day’s range. This simply means the stocks at the top of the list finished the day near their highs, and the stocks at the bottom of the list finished near their lows. Sorting by this helps me to first find my likely long candidates and then move on to the short candidates, as I typically like continuation plays. Once the list is sorted, I use the spacebar to screen each stock in pretty rapid succession. Going through the list takes me about an hour. Simply scrolling through so many stocks each night also helps keep tabs on the overall market health.

As I move through the list, I keep a finger on the “F” key and “flag” the stocks which are good enough for a closer look. After screening the big list, I am left with about 50 flagged stocks which I look closer at to determine my trade candidates which will be in the swing trading newsletter. It is at this point that I separate the good from the great. I want stocks which are able to move. A stock like MSFT which sees daily changes of only a few cents is just not a candidate. I want potential for a good, quick profit. I also want to find tight setups where my stop is nearby. A wide, sloppy chart will add slippage and make it more difficult to know when to exit. This is why I often overlook momentum stocks which have already broken out. Why make trading any more difficult than it already is?

Volume is the next thing I will really key in on, as it is the best true measure of activity and just what the “big boys” are doing. Does volume support the overall look of the chart? Has there been more activity lately than normal which may indicate a move is about to occur? If so, then that stock makes my list.

When looking for shorts, I want to see lower highs, downside volume and relative weakness to either the market or that particular stock’s sector. This indicates to me that pressure remains on the stock and the path of least resistance is still down. Any stock that is unable to participate in market strength gets my attention quickly.

The next morning, I set alerts in my CyberTrader Pro trading platform which will trigger when the stocks from the newsletter meet their breakout prices. Most of the time, I set these alerts to actually get me into the trades automatically for at least a partial position. I also set up my watch lists in Trade-Ideas Pro, which helps me to gauge momentum and relative volume. Their product is excellent, and is an essential part of my trading.

As the day progresses, I keep a close eye on market activity (or inactivity it has seemed to be lately). If buying is strong and the futures are holding up well, I will add to longs in expectation of strength (vice versa for shorts). If the futures are flat and choppy, then I cut way back on my activity and grab a good trading book. Watching the market action with this in mind helps me select which trades are worth adding to and which are not.

From there, it is all a matter of execution and sticking with a good, disciplined trading plan. Cutting losers and keeping winning trades on my screen is the only remaining part of my job once I have found the trades, which is also the most important part!

			</p>
			</div>
			
			<div id="news">
			<h2 style="text-align:center">!!NEWS FLASH!!</h2>
			</div>
		</div>

	</body>

</html>
