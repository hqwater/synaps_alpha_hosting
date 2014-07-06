<!DOCTYPE HTML>
<!--
	Worked under [NEURON 1.1 by HTML5 UP]
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Synaps</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="" />
		<link rel="stylesheet/less" href="css/reply_padding.less" >
		<link rel="stylesheet" href="css/scrollnavi.css" />
		<link rel="stylesheet" href="plugins/registration/css/style.css">
		<!-- <link rel="stylesheet" href="css/jquery.fullPage.css" />-->
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,300italic" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<!--스크롤 따라오는 스크립트-->
		<script src="js/scroll_navi.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
               <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>  
		<script src="js/less-1.7.0.min.js" type="text/javascript"></script>
		<!-- hqwater.js has additional codes. -->
		<script src="js/hqwater.js"></script>
		<!-- jquery 1.9.1 // <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lt IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>


	<body>

		<!-- Nav -->

		<section id="nav" class="pushmenu pushmenu-left">
			<nav role="navigation">
			  <h3>MENU</h3>
			  <hr>
                          <li><a class="nav-top-item"  href="index.php">HOME</a></li>
                          <li><a class="nav-top-item"  href="about.php">ABOUT</a></li>
                          <li><a class="nav-top-item"  href="contact.php">CONTACT</a></li>
                     </nav>                      
                           <div class='buy_me_beer'>
                    <nav role="navigation">                         
                          <li><a id="beer" class="nav-top-item"  href="donate.php">맥주 한 잔</a></li>     
                    </nav>
                          </div>
		</section>
		
		

		<!-- Topbar -->
		<div class='top_bar'>
			<div class='top_bar_top'>
				<a class='nav-btn' id='nav_list' href='#nav'>Menu</a>
				<a href="index.php"><img class="logo" src="images/Synaps_logo.png" alt="SYNAPS" /></a>
				<right>
					<!--
					<a href='#' id='background_1'>#1 </a>
					<a href='#' id='background_2'>#2 </a>
					<a href='#' id='background_3'>#3 </a>
					-->

				<?php
				session_start();
				require ('signin.php');

				if($_SESSION['signed_in'])
			      {
	               
					echo '
					<div id=loginContainer>
					
			                <a href=# id=loginButton><span>'. htmlentities($_SESSION['user_name']) . '</span></a>
			              
			                <div id=loginBox>        
			                	<fieldset id=body>        
				                    <form id=loginForm method=post action= >
				                        
				                       <a class="item" href="signout.php">Sign out</a>
				                    </form>
			                    </fieldset>
			                </div>
			       
		            </div>';
					}


				
				else
				{
					echo '
					<div id=loginContainer>
		                <a href=# id=loginButton><span>Login</span></a>
		                <div style=clear:both></div>
		                <div id=loginBox>                
		                    <form id=loginForm method=post action= >
		                        <fieldset id=body>
		                            <fieldset>
		                                <input placeholder=Email class=input_info type=text name=user_name id=email />
		                            </fieldset>
		                            <fieldset>
		                                <input placeholder=Password class=input_info type=password name=user_pass id=password />
		                            </fieldset>
		                            <input type=submit class=button id=login value=Sign in />
		                        </fieldset>
		                        <span>
		                        	<a href=create_account.php>Forgot your password?</a>
		                        	<a href=create_account.php class=orange>Create an account</a>
		                        </span>
		                    </form>
		                </div>
		            </div>';
					}
				
				?>

				</right>
			</div>

			<div class="top_bar_bottom">
			</div>
		</div>

		<div class='contents pushmenu-push'>

		<!-- Header NAV
			<section id="header1" style="none">
				<header>
					<nav id='nav'>
						<center>
							<ul>
								<li><a class="nav-top-item"  href="index.php">HOME</a></li>
								<li><a class="nav-top-item"  href="about.php">ABOUT</a></li>
								<li><a class="nav-top-item"  href="contact.php">CONTACT</a></li>
							</ul>
						</center>
					</nav>
				</header>
			</section>
		-->
		