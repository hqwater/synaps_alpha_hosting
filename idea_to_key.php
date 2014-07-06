<?php
    require('connect.php');
    $value = $_POST['lockid'];
    $idea_id_query = "SELECT idea_content, idea_lockid FROM ideas WHERE idea_id={$value}";
    $idea_id = mysql_query($idea_id_query);
    $idea_row = mysql_fetch_array($idea_id); //idea's content

    $keyquery=mysql_query("SHOW TABLE STATUS LIKE 'keys_table'");
    $tablestatus=mysql_fetch_array($keyquery);
    $nextkeyid=$tablestatus['Auto_increment'];
    $sql="INSERT INTO keys_table (key_content,key_date,key_lockid,key_group,key_seq,key_level) VALUES ('$idea_row[idea_content]', now(),'$idea_row[idea_lock_d]', '$nextkeyid', '1','0')";
    if (!mysql_query($sql,$con))
    {
        die('Error : ' . mysql_error());
    }

    sleep(0.01);
    header('Location: ./lockpage.php?id='.$idea_row['lock_id']);
    mysql_close($con)
?>
