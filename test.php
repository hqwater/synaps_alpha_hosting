<?php
    include "connect_db_tag.php";
    $db = db::getInstance();
?>

<form action="" method="post">
<dd><input type="text" name="tag_type_name" maxlength="30"/></dd>
<dd><input type="submit" style="display:none"/></dd>
</dt>
</form>

<?php
/***쿼리 인증부터 시작 ***/ 
    if(!isset($_POST['tag_type_name']))
  {
    /*** 포스트에 쿼리가 입력되지 않았을 경우***/
    $msg = 'Please Submit a tag type';
  }
   /***쿼리의 입력 길이가 0 일 경우 ***/
    elseif(strlen($_POST['tag_type_name']) == 0)
  {
    $msg = 'Tag type must have a value';
  }
  /***쿼리의 입력길리아 너무 길 경우***/
    elseif( strlen($_POST['tag_type_name']) > 30 )
  {
    $msg = 'maximum length of tag type is 30 chraracters';
  }
  else
  {
    /**쿼리 입력이 성공적이게 되었을때 ***/
    try
  {
        $tag_type_name = filter_var($_POST['tag_type_name'], FILTER_SANITIZE_STRING);
        /*** DB 에 전송***/
            $sql = "INSERT
                INTO
                synaps_tag_types
                ( tag_type_name )
                VALUES
                (:tag_type_name)";
                        /*** 태그 쿼리 전송 ***/
            $stmt = db::getInstance()->prepare($sql);
            /*** db 객채에서 getinstance 호출 후 prepare 명령.  ***/
            $stmt->bindParam('tag_type_name', $tag_type_name);
            $stmt->execute();
        /*** 태그입력 성공 메세지 ***/
            $msg = 'Tag Type Added!';        
          }
          catch(Exception $e)
          {
            $msg = 'Unable to process tag type';
          }
  }
?>

<h4> <?php echo $msg; ?></h4>