<!-- Demo CSS -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!-- Modernizr -->
<script src="js/modernizr.js"></script>
  <div id="container" class="cf">
    <div id="main" role="main">
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
                <li>
                       <iframe id="player_1" src="http://player.vimeo.com/video/39683393?api=1&amp;player_id=player_1" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                </li>
                <li>
                       <img src="images/girl.jpg" />
                </li>
                <li>
                        <img src="images/queen.jpg" />
                </li>
                <li>
                       <img src="images/big.jpg" />
                </li>
          </ul>
        </div>
      </section>
    </div>
  </div>

  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){

      // Vimeo API nonsense
      var player = document.getElementById('player_1');
      $f(player).addEvent('ready', ready);

      function addEvent(element, eventName, callback) {
        (element.addEventListener) ? element.addEventListener(eventName, callback, false) : element.attachEvent(eventName, callback, false);
      }

      function ready(player_id) {
        var froogaloop = $f(player_id);

        froogaloop.addEvent('play', function(data) {
          $('.flexslider').flexslider("pause");
        });

        froogaloop.addEvent('pause', function(data) {
          $('.flexslider').flexslider("play");
        });
      }


      // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
      $(".flexslider")
        .fitVids()
        .flexslider({
          animation: "slide",
          useCSS: false,
          animationLoop: false,
          smoothHeight: true,
          start: function(slider){
            $('body').removeClass('loading');
          },
          before: function(slider){
            $f(player).api('pause');
          }
      });
    });
  </script>
   <!-- Syntax Highlighter -->
  <script type="text/javascript" src="js/shCore.js"></script>
  <script type="text/javascript" src="js/shBrushXml.js"></script>
  <script type="text/javascript" src="js/shBrushJScript.js"></script>
  <!-- Optional FlexSlider Additions -->
  <script src="js/froogaloop.js"></script>
  <script src="js/jquery.fitvid.js"></script>