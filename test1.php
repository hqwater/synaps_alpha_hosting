<?php
    /*** include the db class ***/
    $sql = "SELECT
        tag_type_id,
        tag_type_name
        FROM
        synaps_tag_types
        ORDER BY
        tag_type_name";
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $types = array();
    $i = 0;
    foreach( $res as $type )
    {
        $types[$type['tag_type_id']] = $type['tag_type_name'];
        $i++;
    }
?>
<form action="" method="post">
<select name="tag_type_id">
<?php
    foreach( $types as $id=>$type )
    {
        echo '<option value="'.$id.'">'.$type.'</option>';
    }
?>
</select>
</form>

<?php
    /*** begin with some validation ***/
    if(!isset($_POST['tag_type_id'], $_POST['tag_target_url'], $_POST['tags']))
    {
        /*** if no POST is submited ***/
        $msg = 'Please Submit a tag';
    }
    elseif(filter_var($_POST['tag_type_id'], FILTER_VALIDATE_INT, array("min_range"=>1, "max_range"=>100)) == false)
    {
        /*** if tag is too short ***/
        $msg = 'Invalid Tag Type';
    }
    elseif( strlen($_POST['tag_target_url']) == 0 )
    {
        /*** if tag is too long ***/
        $msg = 'Tag target is required';
    }
    elseif( strlen($_POST['tags']) == 0 )
    {
        $msg = 'Tag Required';
    }
    elseif(  strlen($_POST['tag_target_name']) == 0 )
    {
        $msg = 'Tag Name is too short';
    }
    elseif( strlen($_POST['tag_target_name']) > 30 )
    {
        $msg = 'Tag Name is too long!';
    }
    else
    {
        /*** if we are here, all is well ***/

        $tag_type_id = filter_var($_POST['tag_type_id'], FILTER_SANITIZE_NUMBER_INT);
        $tag_target_url = filter_var($_POST['tag_target_url'], FILTER_SANITIZE_STRING);
        $tag_target_name = filter_var($_POST['tag_target_name'], FILTER_SANITIZE_STRING);
        $tags = filter_var($_POST['tags'], FILTER_SANITIZE_STRING);
        try
        {
            /*** explode the tag string ***/
            $tag_array = explode(',', $tags);

            /*** begin the db transaction ***/
            db::getInstance()->beginTransaction();
            /*** loop of the tags array ***/
            foreach( $tag_array as $tag_name )
            {
                /*** insert tag into tags table ***/
                $tag = strtolower(trim($tag));

                $sql = "INSERT IGNORE INTO synaps_tags (tag_name ) VALUES (:tag_name)";
                $stmt = db::getInstance()->prepare($sql);
                $stmt->bindParam(':tag_name', $tag_name);
                $stmt->execute();

                /*** get the tag ID from the db ***/
                $sql = "SELECT tag_id FROM synaps_tags WHERE tag_name=:tag_name";
                $stmt = db::getInstance()->prepare($sql);
                $stmt->bindParam(':tag_name', $tag_name);
                $stmt->execute();
                $tag_id = $stmt->fetchColumn();

                /*** now insert the target ***/
                $sql = "INSERT INTO synaps_tag_targets
                    (tag_id, tag_target_name, tag_target_url, tag_type_id)
                    VALUES
                    (:tag_id, :tag_target_name, :tag_target_url, :tag_type_id)";
                $stmt = db::getInstance()->prepare($sql);
                $stmt->bindParam(':tag_id', $tag_id);
                $stmt->bindParam(':tag_target_name', $tag_target_name);
                $stmt->bindParam(':tag_target_url', $tag_target_url);
                $stmt->bindParam(':tag_type_id', $tag_type_id);
                $stmt->execute();
            }
            /*** commit the transaction ***/
            db::getInstance()->commit();
            $msg = 'Tag Type Added!';
        }
        catch(Exception $e)
        {
            $msg = 'Unable to process tag type';
            echo $e->getMessage();
        }
    }
?>

<h4><?php echo $msg; ?></h4>