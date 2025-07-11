<!--
Author: CLASSIC EVENTS
-->
<!DOCTYPE html>
<html lang="en">
<head><link rel="shortcut icon" href="images/LOGO.png">
        
<title>milantra event 
</title>
<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Light Fixture Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta tags -->
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js --> 
<!-- web fonts -->
<link href="//fonts.googleapis.com/css?family=Abel" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- //web fonts -->
</head>
<body>
	<!-- header -->
	<div class="header">
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header navbar-left">
					<h1>
					<img src="images/logo.png"></h1>
				</div>
				
				<!-- navigation --> 
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">milantra Menu</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="header-right">
					<div class="agileits-topnav">
						<ul>
							<li><span class="glyphicon glyphicon-earphone"></span> +977 98406614066</li>
							<li><a class="email-link" href="mailto:example@mail.com"> <span class="glyphicon glyphicon-envelope"></span> info@milantraevents.np </a></li>
							<li class="social-icons"> 
							<?php
							@session_start();
							if(isset($_SESSION['uname']))
							{
										echo "<a href='gallery.php'><button class='btn default'>BOOK YOUR EVENT </button></a> ";
										echo "<a href='logout.php'><button class='btn warning'>LOGOUT</button></a>";
							}
							else
							{
										echo "<a href='registration.php'><button class='btn default'>SIGN IN</button></a> ";
										echo "<a href='login.php'><button class='btn warning'>LOGIN</button></a>";
							}
							?>
								<div class="clearfix"> </div> 
							</li>
						</ul>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">					
						<ul class="nav navbar-nav navbar-left">
							<li><a href="index.php" class="link link--yaku"><span>H</span><span>O</span><span>M</span><span>E</span></a></li>
							<li><a href="about.php" class="link link--yaku"><span>A</span><span>B</span><span>O</span><span>U</span><span>T</span> <span>U</span><span>S</span></a></li>
							<li><a href="#" class="dropdown-toggle link link--yaku" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>S</span><span>E</span><span>R</span><span>V</span><span>I</span><span>C</span><span>E</span><span>S</span><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="wedding.php" class="link link--yaku"><span>W</span><span>E</span><span>D</span><span>D</span><span>I</span><span>N</span><span>G</span></a></li>
									<li><a href="birthday.php" class="link link--yaku"><span>B</span><span>I</span><span>R</span><span>T</span><span>H</span><span>D</span><span>A</span><span>Y</span> <span>P</span><span>A</span><span>R</span><span>T</span><span>Y</span></a></li>
									<li><a href="anniversary.php" class="link link--yaku"><span>A</span><span>N</span><span>N</span><span>I</span><span>V</span><span>A</span><span>R</span><span>S</span><span>A</span><span>R</span><span>Y</span></a></li>
									<li><a href="other_events.php" class="link link--yaku"><span>O</span><span>T</span><span>H</span><span>E</span><span>R</span> <span>E</span><span>V</span><span>E</span><span>N</span><span>T</span><span>S</span></a></li>
								</ul>
							</li>
							<li><a href="gallery.php" class="link link--yaku"><span>G</span><span>A</span><span>L</span><span>L</span><span>E</span><span>R</span><span>Y</span></a></li>
							<li><a href="contact.php" class="link link--yaku"><span>C</span><span>O</span><span>N</span><span>T</span><span>A</span><span>C</span><span>T</span> <span>U</span><span>S</span></a></li>
						</ul>		
						<div class="clearfix"> </div>
					</div><!-- //navigation -->
				</div>
				<div class="clearfix"> </div>
			</div>	
		</nav>		
	</div>	
	<!-- //header -->
