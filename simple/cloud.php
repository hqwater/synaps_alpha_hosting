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
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,300italic" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<section id="header1" style="none">
				<header>
					<!--<h1><img class="logo" src="images/neuron_logo_web_w.png" alt="NEURON" /></h1>-->
					<h1>Synaps</h1>
						<nav>
							<ul>
								<li class="deactivated"><a href="./">Cloud</a></li>
								<li class="activated"><a href="./cloud">Categorize</a></li>
							</ul>
						</nav>
				</header>
			</section>

		<!-- Type idea -->
		

			<article class="container box style1">

			<?php
			$con = mysql_connect("localhost","root","a9715996");
			if (!$con)
				{
				die('Could not connect: ' . mysql_error() );
				}		

			mysql_select_db("synaps_alpha", $con);

			mysql_query("set session character_set_connection=utf8;");
			mysql_query("set session character_set_results=utf8;");
			mysql_query("set session character_set_client=utf8;");
			
			$query = "SELECT idea_id, idea_content FROM ideas";

			$res = mysql_query($query, $con);
			
			// 리소를 이용하여 $row 변수에 모든 레코드를 배열로 가져와서 while 문을 이용하여 출력
			while($row= mysql_fetch_array($res)){
			  // 아래 코드 id 와 title 는 위 쿼리의 필드명입니다.
			  echo $row['idea_content']."<br>";

				}	
			
			?>
			</article>
			

		<section id="footer">
			<div class="copyright">
				<ul class="menu">
					<li>Copyright &copy; 2014 Neuron Creative Works. All rights reserved.</li>
					<!--<li>Design: <a href="http://html5up.net/">HTML5 UP</a></li>-->
					<!--<li>: <a href="http://ineedchemicalx.deviantart.com">Felicia Simion</a></li>-->
				</ul>
			</div>
		</section>

	</body>
</html>