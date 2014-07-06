<!DOCTYPE html>
<?php
	require("header.php");
	require('connect.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<link rel="stylesheet" type="text/css" href="jquery.fullPage.css" />
	<link rel="stylesheet" type="text/css" href="examples.css" />
	<style>
	/* Style for our header texts 
	* --------------------------------------- */
	h1{
		font-size: 5em;	
		font-family: arial,helvetica;
		color: #fff;
		margin:0;
	}
	.intro p{
		color: #fff;
	}
	
	/* Centered texts in each section 
	* --------------------------------------- */
	.section{
		text-align:center;
	}

	
	/* Bottom menu
	* --------------------------------------- */
	#infoMenu li a {
		color: #fff;
	}
	</style>

	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>	

	<script type="text/javascript" src="jquery.slimscroll.min.js"></script>

	<script type="text/javascript" src="jquery.fullPage.js"></script>
	<script type="text/javascript" src="examples.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				menu: '#menu',
				anchors: ['firstPage', 'secondPage', '3rdPage'],
				slidesColor: ['#C63D0F', '#1BBC9B', '#7E8F7C'],
				autoScrolling: false
			});
		});
	</script>
<body>
	<div>
이런것도 안되나 보자
	</div>
<div id="fullpage">
	<div class="section" id="section1">
	    <div class="slide" id="slide1">
			<div class="intro">
				<h1>URL get updated (#)</h1>
				<p>
					Easy to bookmark and share
				</p>
			</div>
		</div>
		
	    <div class="slide" id="slide2">
			<h1>Horizontal sliders!</h1>
		</div>

	</div>
</div>
	<div>
이런것도 안되나 보자
	</div>
</body>
</html>
<?php
require("footer.php");
?>