<?php
  require("header.php");
  require('connect.php');
  //슬라이드 스크립트정리
?>

<article class="container box style1">

<!--paypal 버튼 -->
<center>
  <img src="http://simpleicon.com/wp-content/uploads/beer.png" width="350"><br>
  <h1> 맥주 한 잔 사주세요 </h1><br><br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="M26SGTMGA9HP4">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</center>

  </article>

<?php
  require("footer.php");
?>