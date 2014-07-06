<!--slidetest-->
<html xmlns="http://www.w3.org/1999/xhtml">
  <link rel="stylesheet" type="text/css" href="css/jquery.fullPage.css" />
  <script type="text/javascript" src="plugins/pageslider/vendors/jquery.slimscroll.min.js"></script>
  <script type="text/javascript" src="js/jquery.fullPage.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#fullpage').fullpage({
        menu: '#menu',
        anchors: ['firstPage', 'secondPage', '3rdPage'],
        autoScrolling: false,

      });
    });
  </script>
