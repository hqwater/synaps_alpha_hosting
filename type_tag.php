
      <div id='newlockarea'>
        <form action='newlock.php' method='post' class='newlock'>
          <!--태그 -->
          <dd><input type="text" name="tag_name" maxlength="30"/></dd>
          <dd><input type="submit" style="display:none"/></dd>
          </dt>
          <!--락 입력창 -->
          <textarea class='seventy_per key-box' name='lock' placeholder='Type your lock'></textarea>
          <!--태그 쿼리전송 -->
            <div class='lockpage_button'>
              <input class='button' type='submit' value='Submit'>
            </div>
        </form>
        <div style='clear:both;'></div>
      </div>
      <hr>



<h4> <?php echo $msg; ?></h4>