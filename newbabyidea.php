<?php
	require('connect.php');
	//DB : chogoon.tistory.com/31 참고

	$parentideaquery = "SELECT idea_id,idea_lockid, idea_seq, idea_group, idea_level FROM ideas WHERE idea_id = {$_GET['id']}";
	$parentideastatus = mysql_query($parentideaquery);
	$parentidearesult = mysql_fetch_array($parentideastatus);
	//var_dump($parentideastatus);

	//먼저 원글의 sort와 depth를 건드리고, 키 값을 insert.\

	$sql0="UPDATE ideas SET idea_seq=idea_seq+1 WHERE idea_group = {$parentidearesult[idea_group]} AND idea_seq > {$parentidearesult[idea_seq]} ";
	$sql1="INSERT INTO ideas (idea_content,idea_date,idea_lockid,idea_group,idea_seq,idea_level) VALUES ('$_POST[content]', now(), '$_POST[lock_id]','$parentidearesult[idea_group]', '$parentidearesult[idea_seq]'+1 ,'$parentidearesult[idea_level]'+1 )";
	
	
	if (!mysql_query($sql0,$con))
	{
		die('Error0 : ' . mysql_error());
	}

	if (!mysql_query($sql1,$con))
	{
		die('Error1 : ' . mysql_error());
	}
	

	var_dump($sql);
	sleep(0.01);
	//var_dump($sql);
	header('Location: ./lockpage.php?id='.$_POST['lock_id'].'#slide2');
	mysql_close($con)
?>