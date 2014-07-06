
<?php

    $tag_target_url = 'http://synaps.dothome.co.kr/synaps_alpha/test3.php';

    try
    {
        include 'connect_db_tag.php';

        $sql = "SELECT
            U.*
            FROM
            synaps_tag_targets U
            JOIN
            synaps_tag_targets T
            WHERE
            U.tag_id = T.tag_id
            AND
            T.tag_target_url = :tag_target_url
            GROUP BY
            tag_target_url";
        $stmt = db::getInstance()->prepare($sql);
        $stmt->bindParam(':tag_target_url', $tag_target_url);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        /*** loop over the array and create the listing ***/
        $msg = '<ul>';
        foreach($res as $val)
        {

            $msg .= '<li><a href="'.$val['tag_target_url'].'">'.$val['tag_target_name'].'</a></li>'."\n";
        }
        $msg .= '</ul>';
    }
    catch(Exception $e)
    {
        $msg = 'Unable to process tag type';
    }
?>

<?php echo $msg; ?>