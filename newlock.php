<?php
	require('connect.php');
       require('connect_db_tag.php');
        $db = db::getInstance();

 /***쿼리 인증부터 시작 ***/ 
    if(!isset($_POST['tag_name']))
  {
    /*** 포스트에 쿼리가 입력되지 않았을 경우***/
    $msg = 'Please Submit a tag type';
  }
   /***쿼리의 입력 길이가 0 일 경우 ***/
    elseif(strlen($_POST['tag_name']) == 0)
  {
    $msg = 'Tag type must have a value';
  }
  /***쿼리의 입력길리아 너무 길 경우***/
    elseif( strlen($_POST['tag_name']) > 30 )
  {
    $msg = 'maximum length of tag type is 30 chraracters';
  }
  else
  {
    /**쿼리 입력이 성공적이게 되었을때 ***/
    try
  {
        $tag_name = filter_var($_POST['tag_name'], FILTER_SANITIZE_STRING);
        /*** DB 에 전송***/
            $sql = "INSERT
                INTO
                synaps_tag
                ( tag_name )
                VALUES
                (:tag_name)";
              /*** 태그 쿼리 전송 ***/
            $stmt = db::getInstance()->prepare($sql);
            /*** db 객채에서 getinstance 호출 후 prepare 명령.  ***/
            $stmt->bindParam('tag_name', $tag_name);
            $stmt->execute();


        /*** 태그입력 성공 메세지 ***/
            $msg = 'Tag Type Added!';        
          }
          catch(Exception $e)
          {
            $msg = 'Unable to process tag type';
          }
  }

  /* 새로 생성되는 락의 lock_id 를 따오기위해 먼저 락 생성 쿼리를 날림*/

  $sql1="INSERT INTO locks (lock_content,lock_date) VALUES ('$_POST[lock]', now())";
    if (!mysql_query($sql1,$con))
  {
    die('Error : ' . mysql_error());
  }

  /* 락 테이블의 가장최근 생성된 lock_id 를 가져옴 */

  $number = mysql_query("SELECT * 
FROM  `locks` 
ORDER BY  `lock_id` DESC 
LIMIT 0 , 1 ");
  $number0 = mysql_fetch_array($number);
  $lock_id = $number0['lock_id'];


  /* type_tag 에서 날려진 태그제목으로 등록된 태그의 태그 id 를 가져옴 */

  $tagid = mysql_query("SELECT tag_id FROM synaps_tag WHERE tag_name = {$_POST['tag_name']}");
  $tagid0 = mysql_fetch_array($tagid);
  $tagid1 = $tagid0['0'];


  /* 가장 최근에 등록된 락 id 와 입력된 태그id 를 synaps_tag_target에 등록함 */


  $sql2="INSERT INTO synaps_tag_target (tag_id,lock_id) VALUES ('$tagid1','$lock_id')" ;
    if (!mysql_query($sql2,$con))
  {
    die('Error : ' . mysql_error());
  }


	sleep(0.01);
	header('Location: ./');
	mysql_close($con)
?>