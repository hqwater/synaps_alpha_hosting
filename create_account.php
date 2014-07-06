<?php
	require("header.php");
	require('connect.php');
?>

<article class="container box midsize">  <!--페이지전체 클래스-->
	<div class='key-box'> <!--아이디어 표시되는 DIV-->
		<br>
		<center>
		      <h1>Registration<br></h1>
		      <form method="post" action="signupck.php">
		      	<input type=hidden name=todo value=post>
		    	  <div class="reg_section personal_info">
		    		  <h3>Email will be your id.</h3>
		      			<input type="text" class="input_info" name="username" placeholder="Username">
		      			<input type="text" class="input_info" name="email" placeholder="E-mail Address">
		     	 </div>

			      <div class="reg_section password">
				      <h3>Your Password</h3>
				      <input type="password" class="input_info" name="password" placeholder="Type Password">
				      <input type="password" class="input_info" name="password_confirm" placeholder="Confirm Password">
			      </div>

			      <p class="terms">
			        <label>
			          <input type="checkbox" name="agree" id="agree">
			           I accept  <a href="http://www.imomen.com/">Synaps</a>&nbsp;Terms & Condition
			        </label>


			      </p>

		        <div class="notice_signup">
		        	Sorry, Signing up is unavailable now.
		        </div>			
		              
		      	<input class="button" type="submit" name="submit" value="Sign Up">
		      </form>
		</center>
		<br>
	</div>
</article>


<?php
	require("footer.php");
?>