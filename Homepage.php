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
			<li><a href="portfolio/global_trends.php">Global Trends</a></li>
			<li><a href="portfolio/newspaper.php">Newspaper</a></li>
			<li class="last"><a href="portfolio/expert_views.php">Expert Views</a></li>
		</ul>
	</li>
	<li class="dir">GUIDELINES
		<ul>
			<li class="first"><a href="guideline/guideline_stock.php">Stock</a></li>
			<li><a href="guideline/ideal_portfolio.php">Ideal Portfolio</a></li>			
			<li class="last"><a href="guideline/Tips.php">Tips</a></li>
		</ul>
	</li>
	<li class="dir">ASK &amp; DISCUSS
		<ul>
			<li><a href="compare_form.php">Compare Stocks</a></li>
			<li><a href="ask&discuss/points_of_discussion.php">Discussion</a></li>
			<li class="last"><a href="ask&discuss/queries.php">Queries</a></li>
		</ul>
	</li>
	
	<li><a class="dir">TUTORIALS</a>
		<ul>
			<li class="first"><a href="tutorial/articals.php">Articals</a></li>
			<li><a href="tutorial/literature.php">Literature</a></li>
			<li class="last"><a href="tutorial/tutorials.php">Tutorials</a></li>
		</ul>
	</li>
	<li><a href="feedback.php">FEEDBACK</a></li>
	<li class="dir last">
		<form method="post" action="">
			<label for="search">Search:</label>
			<input type="text" id="search" class="text" value="Search me!" onFocus="if (this.value == 'Search me!') this.value = '';" 			onBlur="if (this.value == '') this.value = 'Search me!';" maxlength="255" />
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
 header( 'Location: index_project.php' ) ;
 }
?>
<a href="logout.php"><input type="submit" value="Sign Out"></a>
<h1 align="center">&nbsp;</h1>
<h1 align="center">&nbsp;</h1>
<h1 align="center"><strong>LOGIN TO YOUR ACCOUNT</strong></h1>
<form name="form1" method="post" action="logincheck.php"> 
  <table align="center" border="0" cellspacing="0" width="300px">
    <tr>
      <td>USER NAME:</td>
    </tr>
    <tr>
      <td><input type="text" size="30" name="user_name" id="user_name" /></td>
    </tr>
    
	<tr>
    	<td>PASSWORD:</td></tr>
    <tr>
      <td><input type="password" size="30" name="user_password" id="user_password" /></td>
    </tr>
	
	<tr>
		<td><input name="submitbutton" type="submit" id="submitbutton" value="Submit" />
		<a href="signup.php">
	  	<input name="resetbutton" type="submit" id="resetbutton" value="SignUP" /></a></td>
	</tr>

	</table>
</form>
</body>
</head>

	
