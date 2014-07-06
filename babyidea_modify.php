<?php
  require('connect.php');
  //DB : chogoon.tistory.com/31 참고

  $sql="UPDATE  ideas SET idea_content ='{$_POST['content']}' WHERE  idea_id ={$_GET['id']}";
  //var_dump($parentkeystatus);
  
  if (!mysql_query($sql,$con))
  {
    die('Error0 : ' . mysql_error());
  }


  sleep(0.01);
  //var_dump($sql);
  header('Location: ./lockpage.php?id='.$_POST['lock_id'].'#slide2');
  mysql_close($con)
?>