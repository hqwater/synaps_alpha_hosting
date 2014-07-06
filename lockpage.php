<?php
	require("header.php");
	require('connect.php');
	//슬라이드 스크립트정리

	//lock 삭제 로직
	if(isset($_POST['delete'])){
		$id = $_POST['delete_lock_id'];  
		$query = "DELETE FROM locks WHERE lock_id={$_GET['id']}"; 
		$query2 = "DELETE FROM keys_table WHERE key_lockid={$_GET['id']}"; 
		$result = mysql_query($query);
		$result2 = mysql_query($query2);
		header('Location: ./');
	}

	//key 삭제 로직
	if(isset($_POST['delete_key'])&$_POST['delete_key_level']==0){
	$id = $_POST['delete_key_id'];  
	$query1 = "DELETE FROM keys_table WHERE key_group={$id}"; 
	$result = mysql_query($query1);
	header('Location: ./lockpage.php?id='.$_GET['id']);
	}
	else{
		$id = $_POST['delete_key_id'];  
		$query2 = "DELETE FROM keys_table WHERE key_id={$id}"; 
		$result1 = mysql_query($query2);
	}

	//idea 삭제 로직
	if(isset($_POST['delete_idea'])&$_POST['delete_idea_level']==0){
	$id = $_POST['delete_idea_id'];  
	$query1 = "DELETE FROM ideas WHERE idea_group={$id}"; 
	$result = mysql_query($query1);
	header('Location: ./lockpage.php?id='.$_GET['id']);
	}
	else{
		$id = $_POST['delete_idea_id'];  
		$query2 = "DELETE FROM ideas WHERE idea_id={$id}"; 
		$result1 = mysql_query($query2);
	}



?>



<!-- 슬라이더부분 스크립트-->
<link rel="stylesheet" type="text/css" href="plugins/fullpage/jquery.fullPage.css" />
<!--슬라이더 에로우 CSS-->
<script type="text/javascript" src="plugins/fullpage/jquery.fullPage.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#fullpage').fullpage({
		slidesColor: ['rgba(0, 0, 255, 0)'],
		autoScrolling: false
		});
	});
</script>
<!-- nav scroll 부분 스크립트 -->
<script>
	$(window).load(function(){
		$("#nav_h").scroll_navi();
	});
</script>

<!-- 내용 시작 -->
<div style="margin-left: -570px;"><ul><li><a href="#" class="active"><span></span></a></li><li><a href="#"><span></span></a></li></ul></div>


<!--원인 분석할때까지 냅둬주셈-->
<div id='fullpage1'>
	<div class='section' id='section2'>
	    <div class='slide' id='slide3'>
	    </div>
	</div>
</div>

<!-- KEY / IDEA 구분 스크롤링바  -->
<div id='nav_h' class="onpage fullPage-slidesNav" >
	<div id='indicator1' class='indicator onpage prev'>ideas</div>
	<div id='indicator2' class='indicator onpage next'>keys</div>
</div>


<!-- lock 제목  시작 -->
<div class = "top_bar_lock">
	<span class='wrap pushmenu-push'>
		<?php
			$query0 = "SELECT lock_content,lock_cat,lock_userid,lock_date FROM locks WHERE lock_id={$_GET['id']}";
			$res0 = mysql_query($query0);
			while($row=mysql_fetch_array($res0))
			{
				echo "<h4>{$row['lock_content']}</h4> <h5> <span> <a href=locks.php?cat={$row['lock_cat']}> {$row['lock_cat']}</a> </span> </h5>";
				echo "<h5>";
				echo "<span class='top_bar_item'> <a href=user.php?id={$row['lock_userid']}> {$row['lock_userid']}</a> </span>";
				echo "<span class='top_bar_item'> {$row['lock_date']} </span>";
				echo "</h5>";
			}

		?>
	<span>
</div>


<!-- article -->

<article class="container box style1">
	<!-- Lock제목 소환-->
	<?php
		$query0 = "SELECT lock_content,lock_cat,lock_userid,lock_date FROM locks WHERE lock_id={$_GET['id']}";
		$res0 = mysql_query($query0);
		while($row=mysql_fetch_array($res0))
		{
			echo "<div style='word-wrap:break-word;width:960px'> <h4>{$row['lock_content']}</h4> <h5><a href=locks.php?cat={$row['lock_cat']}> {$row['lock_cat']}</a></h5> </div>";
			echo "<h5>";
			echo "<img src='http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-8/32/User-red-icon.png' class='greylogo'><a href=user.php?id={$row['lock_userid']}> {$row['lock_userid']}</a>";
			echo " <img src='https://cdn2.iconfinder.com/data/icons/business-and-internet/512/Clock-32.png' class='greylogo'> {$row['lock_date']} ";
			echo "</h5>";
			/**태그 폼 입력**/
			echo "<div class=tag_form>";
			//include 'test.php';
			//include 'test1.php';			
			if($_SESSION['signed_in']){
			echo"
			<form id=delete method=post action='' class='activated_align_right'>
				<input type=hidden name=delete_lock_id value='<?php print $id; ?>'/> 
				<input type=submit name=delete value=DELETE class='text_button'/>    
			</form>";
			}
			echo "</div> <hr id='title_bar'>";
		}

	?>

	<!-- Slider영역-->
	<div class='container'>
		<div id='fullpage'>
			<div class='section active' id='section0'>
				<!-- Slide1 : IdeaArea -->
		    	<div class='slide' id='slide1'>
					<?php 
						$query2 = "SELECT idea_id,UNIX_TIMESTAMP(idea_date),idea_type,idea_content,idea_lockid,idea_seq,idea_group,idea_level FROM ideas WHERE idea_lockid={$_GET['id']} order by idea_group desc, idea_seq ";
						$res2 = mysql_query($query2);


						if(!mysql_num_rows($res2)>0){
							echo "<div style=width:100%;text-align:center;> <img src='./images/painting_key.png' height='296px'> <h4 style='display:block;'> No ideas currently. </h4> </div>";

	
						} else {

						while($row= mysql_fetch_array($res2))
						{
							echo "
								<h4 class=' level-{$row['idea_level']} key'>
						  			<div class='showideatype type{$row['idea_type']}'></div>
						  			<div class='idea_content'>{$row['idea_content']}  </div>
						  		";
						  	$unixtime = $row['UNIX_TIMESTAMP(idea_date)'];
						  	$timeprint = date("M-j", $unixtime); 
						  	if($_SESSION['signed_in']){
						  		echo "
							  		<div class='info_area'>
								  		<div class='text_button info'>$timeprint</div> 

								  		<div class='halfheight info vertical_bottom'>	
								  			<input type='button' value='RE' class='show_babyidea_input text_button' id='#babyideainput_{$row['idea_id']}'/>
								  			<input type='button' value='MOD' class='show_babyidea_modify text_button' id='#babyideamodify_{$row['idea_id']}'/>
								  			<form id='delete_key' method='post' action='' style='display:inline;'>
												<input type='hidden' name='delete_idea_id' value='{$row['idea_id']}'/> 
												<input type='hidden' name='delete_idea_level' value='{$row['idea_level']}'/> 
												<input type='submit' name='delete_key' value='X' class='text_button'/>    
											</form>
						  				</div>

										<form class='recomm' style='float:right;'>
											<input type='button' value='MAKE KEY' class='make_key text_button' id='{$row['idea_id']}' />
										</form>

					  				</div>
					  				<!-- REPLY form -->
									<form class='babyidea_area' id='babyideainput_{$row['idea_id']}' action='newbabyidea.php?id={$row['idea_id']}' method='post'>
										<input id='babyideainput_{$row['idea_id']}' class='babyidea_type_area' name='content' placeholder='Type your baby key here'>
										<ul class='no_paddings'>
											<li class='babyidea_type_{$row['idea_id']} twenty_per right' >
												<input type='radio' name='type' value='A' id='idea_type_button'><div class='showideatype typeA'></div> 
												<input type='radio' name='type' value='B' id='idea_type_button' checked><div class='showideatype typeB'></div>
												<input type='radio' name='type' value='C' id='idea_type_button'><div class='showideatype typeC'></div> 
												<input type='hidden' name='parentkey' value='{$_row['idea_id']}''>

												<input class='babyidea_type_area' type='hidden' name='keygroup' value='{$row['idea_id']}'>
												<input type='hidden' name='lock_id' value={$_GET['id']}>
												<button id='#babyideainput_{$row['idea_id']}' class='babyideasubmit' type='submit' name='submit_babyidea'>SUBMIT</button>
											</li>
										</ul>
									</form>

									<!-- MODIFY form -->
									<form class='babyidea_modify_area' id='babyideamodify_{$row['idea_id']}' action='babyidea_modify.php?id={$row['idea_id']}' method='post'>
										<input id='babyideamodify_{$row['idea_id']}' class='babyidea_type_area' name='content' value='{$row['idea_content']}''>
										<ul class='no_paddings'>
											<li class='babyidea_type_{$row['idea_id']} twenty_per right' >
												<input type='radio' name='type' value='A' id='idea_type_button'><div class='showideatype typeA'></div> 
												<input type='radio' name='type' value='B' id='idea_type_button' checked><div class='showideatype typeB'></div> 
												<input type='radio' name='type' value='C' id='idea_type_button'><div class='showideatype typeC'></div> 
												<input type='hidden' name='parentkey' value='{$_row['idea_id']}''>

												<input class='babyidea_type_area' type='hidden' name='keygroup' value='{$row['idea_id']}'>
												<input type='hidden' name='lock_id' value={$_GET['id']}>
												<button id='#babyideamodify_{$row['idea_id']}' class='babyideasubmit' type='Modify' name='submit_babyidea'>SUBMIT</button>
											</li>
										</ul>
									</form>	

					  			</h4>";
							}	
						}	
						}




						//아이디어 입력란
						if($_SESSION['signed_in']){
							echo"
							<hr>
								<div id='newidea'>
									<form action='newidea.php' method='post' class='newideaarea'>
										<textarea name='content' class='seventy_per vertical_down' placeholder='Type your idea here'></textarea>
										<input type='radio' name='type' value='A' id='idea_type_button'><div class='showideatype typeA'></div> 
										<input type='radio' name='type' value='B' id='idea_type_button' checked><div class='showideatype typeB'></div> 
										<input type='radio' name='type' value='C' id='idea_type_button'><div class='showideatype typeC'></div> 
										<input type='hidden' name='lock_id' value='".$_GET['id']."'>
										<div class='actions' style='display:flex;'>
											<input class='button' type='submit' id='idea_submit_button' value='Submit'>
										</div>
									</form>
									<div style='clear:both;'></div>
								</div>";
						}				
					?>	
				</div class='slide' id='slide1'>	

				<!-- Slide2 : IdeaArea -->
		    	<div class='slide' id='slide2'>
					<!-- lock의 key 출력-->
					<?php
						$query1 = "SELECT key_id,UNIX_TIMESTAMP(key_date),key_content,key_type,key_lockid,key_seq,key_group,key_level FROM keys_table WHERE key_lockid={$_GET['id']} order by key_group desc, key_seq ";
						$res1 = mysql_query($query1);
						echo"";	
									//키 영역 KEY AREA	
						if(mysql_num_rows($res1)==0){
							echo "<div style=width:100%;text-align:center;> <img src='./images/lockboat.png'> <h4 style='display:block;'> No keys found. Create now! </h4> </div>";
						} else {

						while($row= mysql_fetch_array($res1))
						{
							//KEY type, name, babykey입력form출력
							//KEY_LEVEL에 따라 깊이를 제시함
							echo "
								<h4 class=' level-{$row['key_level']} key'>
						  			<div class='showkeytype type{$row['key_type']}'></div>
						  			<div class='key_content'>{$row['key_content']}  </div>
						  		";
						  	$unixtime = $row['UNIX_TIMESTAMP(key_date)'];
						  	$timeprint = date("M-j", $unixtime); // 출력한 유닉스형태의 시간을 M-j 형으로 반환, 71번 줄에서 출력
						  	if($_SESSION['signed_in']){
						  		echo "
							  		<div class='info_area'>
								  		<div class='text_button info'>$timeprint</div> 

								  		<div class='halfheight info vertical_bottom'>	
								  			<input type='button' value='RE' class='show_babykey_input text_button' id='#babykeyinput_{$row['key_id']}'/>
								  			<input type='button' value='MOD' class='show_babykey_modify text_button' id='#babykeymodify_{$row['key_id']}'/>
								  			<form id='delete_key' method='post' action='' style='display:inline;'>
												<input type='hidden' name='delete_key_id' value='{$row['key_id']}'/> 
												<input type='hidden' name='delete_key_level' value='{$row['key_level']}'/> 
												<input type='submit' name='delete_key' value='X' class='text_button'/>    
											</form>
						  				</div>
					  				</div>
					  				<!-- REPLY form -->
									<form class='babykey_area' id='babykeyinput_{$row['key_id']}' action='newbabykey.php?id={$row['key_id']}' method='post'>
										<input id='babykeyinput_{$row['key_id']}' class='babykey_type_area' name='content' placeholder='Type your baby key here'>
										<ul class='no_paddings'>
											<li class='babykey_type_{$row['key_id']} twenty_per right' >
												<input type='radio' name='type' value='A' id='key_type_button'><div class='showkeytype typeA'></div> 
												<input type='radio' name='type' value='B' id='key_type_button' checked><div class='showkeytype typeB'></div>
												<input type='radio' name='type' value='C' id='key_type_button'><div class='showkeytype typeC'></div> 
												<input type='hidden' name='parentkey' value='{$_row['key_id']}''>

												<input class='babykey_type_area' type='hidden' name='keygroup' value='{$row['key_id']}'>
												<input type='hidden' name='lock_id' value={$_GET['id']}>
												<button id='#babykeyinput_{$row['key_id']}' class='babykeysubmit' type='submit' name='submit_babykey'>SUBMIT</button>
											</li>
										</ul>
									</form>

									<!-- MODIFY form -->
									<form class='babykey_modify_area' id='babykeymodify_{$row['key_id']}' action='babykey_modify.php?id={$row['key_id']}' method='post'>
										<input id='babykeymodify_{$row['key_id']}' class='babykey_type_area' name='content' value='{$row['key_content']}''>
										<ul class='no_paddings'>
											<li class='babykey_type_{$row['key_id']} twenty_per right' >
												<input type='radio' name='type' value='A' id='key_type_button'><div class='showkeytype typeA'></div> 
												<input type='radio' name='type' value='B' id='key_type_button' checked><div class='showkeytype typeB'></div> 
												<input type='radio' name='type' value='C' id='key_type_button'><div class='showkeytype typeC'></div> 
												<input type='hidden' name='parentkey' value='{$_row['key_id']}''>

												<input class='babykey_type_area' type='hidden' name='keygroup' value='{$row['key_id']}'>
												<input type='hidden' name='lock_id' value={$_GET['id']}>
												<button id='#babykeymodify_{$row['key_id']}' class='babykeysubmit' type='Modify' name='submit_babykey'>SUBMIT</button>
											</li>
										</ul>
									</form>	
					  			</h4>";
							}	
						}
						}

						//키 입력란
						if($_SESSION['signed_in']){
							echo"
							<hr>
								<div id='newkey'>
									<form action='newkey.php' method='post' class='newkeyarea'>
										<textarea name='content' class='seventy_per vertical_down' placeholder='Add your key here'></textarea>

												<div class='newkey_key_type' style='display:flex;'>
													<input type='hidden' name='lock_id' value='".$_GET['id']."'>
												</div>

										<div class='actions' style='display:flex;'>
											<input class='button' type='submit' id='key_submit_button' value='Submit'>
										</div>
									</form>
									<div style='clear:both;'></div>
								</div>";
						}				
					?>
				</div class='slide' id='slide2'>

			</div class='section active' id='section0'>
		</div id='fullpage'>
	</div class='container'>
			
</article>

<?php
	require("footer.php");
?>