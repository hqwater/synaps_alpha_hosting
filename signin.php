<?php
	session_start();
	include ('connect.php');
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
	}
	else
	{
		/* so, the form has been posted, we'll process the data in three steps:
			1.	Check the data
			2.	Let the user refill the wrong fields (if necessary)
			3.	Varify if the data is correct and return the correct response
		*/
		$errors = array(); /* declare the array for later use */
		
		if(!isset($_POST['user_name']))
		{
			$errors[] = 'The username field must not be empty.';
		}
		
		if(!isset($_POST['user_pass']))
		{
			$errors[] = 'The password field must not be empty.';
		}
		
		if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
		{
			echo 'Uh-oh.. a couple of fields are not filled in correctly..<br /><br />';
			echo '<ul>';
			foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
			{
				echo '<li>' . $value . '</li>'; /* this generates a nice error list */
			}
			echo '</ul>';
		}
		else
		{
			//the form has been posted without errors, so save it
			//notice the use of mysql_real_escape_string, keep everything safe!
			//also notice the sha1 function which hashes the password
			$sql = "SELECT 
						userid,
						username,
						user_level
					FROM
						users
					WHERE
						username = '" . mysql_real_escape_string($_POST['user_name']) . "'
					AND
						password = '" . sha1($_POST['user_pass']) . "'";
						
			$result = mysql_query($sql);
			if(!$result)
			{
				//something went wrong, display the error
				echo 'Something went wrong while signing in. Please try again later.';
				//echo mysql_error(); //debugging purposes, uncomment when needed
			}
			else
			{
				//the query was successfully executed, there are 2 possibilities
				//1. the query returned data, the user can be signed in
				//2. the query returned an empty result set, the credentials were wrong
				if(mysql_num_rows($result) == 0)
				{
					echo 'Username or password is incorrect. Please try again.';
				}
				else
				{
					//set the $_SESSION['signed_in'] variable to TRUE
					$_SESSION['signed_in'] = true;
					
					//we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
					while($row = mysql_fetch_assoc($result))
					{
						$_SESSION['user_id'] 	= $row['userid'];
						$_SESSION['user_name'] 	= $row['username'];
						$_SESSION['user_level'] = $row['user_level'];
					}
					
				}
			}
		}
	}
?>