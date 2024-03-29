
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ResponsiveSlides.js &middot; Alternative themes</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="responsiveslides.css?v=1.5">
  <link rel="stylesheet" href="themes/themes.css?v=1.5">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="responsiveslides.min.js?v=1.6"></script>
  <script>
    $(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
        auto: false,
        pager: true,
        nav: true,
        speed: 500,
        maxwidth: 800,
        namespace: "centered-btns"
      });

      // Slideshow 2
      $("#slider2").responsiveSlides({
        auto: false,
        pager: true,
        nav: true,
        speed: 500,
        maxwidth: 800,
        namespace: "transparent-btns"
      });

      // Slideshow 3
      $("#slider3").responsiveSlides({
        auto: false,
        pager: false,
        nav: true,
        speed: 500,
        maxwidth: 800,
        namespace: "large-btns"
      });

    });
  </script>
</head>
<body>
  <div id="wrapper">
    <h1>Three different ways to use next/prev buttons</h1>

    <h3>Vertically centered on both sides</h3>
    <!-- Slideshow 1 -->
    <div class="rslides_container">
      <ul class="rslides" id="slider1">
        <li><img src="../1.jpg" alt=""></li>
        <li><img src="../2.jpg" alt=""></li>
        <li><img src="../3.jpg" alt=""></li>
      </ul>
    </div>


    <a href="http://responsiveslides.com/">View ResponsiveSlides.js documentation</a>

  </div>
</body>
</html>
