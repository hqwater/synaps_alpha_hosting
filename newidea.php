<?php
	require('connect.php');
	//생성될 idea의 idea id(auto increment값)을 가져옴 (idea group에 쓰여야 함!)
	$ideaquery=mysql_query("SHOW TABLE STATUS LIKE 'ideas'");
	$tablestatus=mysql_fetch_array($ideaquery);
	$nextideaid=$tablestatus['Auto_increment'];
	$sql="INSERT INTO ideas (idea_content,idea_date,idea_type,idea_lockid,idea_group,idea_seq,idea_level) VALUES ('$_POST[content]', now(), '$_POST[type]','$_POST[lock_id]','$nextideaid', '1','0')";
	if (!mysql_query($sql,$con))
	{
		die('Error : ' . mysql_error());
	}
	sleep(0.01);
	header('Location: ./lockpage.php?id='.$_POST['lock_id']);
	mysql_close($con)
?>