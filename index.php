<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Thasadith" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Index</title>
  </head>

  <body>
    <div class="content-wrap">

      <div class="header-wrap">
        <div class="header-inner-wrap">

          <div class="header-info">
            <div class="header-info-title">
              <h1>New here?</h1>
            </div>
            <div class="header-info-hub">
              <button type="button" name="button" id="dropBtn">Get Started...</button>
            </div>
          </div>

          <div class="header-nav">
            <div id="Logo">
                HOME
            </div>
            <div class="active">
                active
            </div>
            <div>
                active
            </div>
            <div>
                active
            </div>
          </div>

        </div>
      </div>

      <div class="main-wrap">
        <div class="">
          <h3>Hello, like video, sub, enjoy?</h3>
          <h5>I like video, he subscribe to me eee</h5>
          <br>
          <br>
        </div>
        <div class="main-inner-wrap">
          <div class="postlist-left-text">
            <h3>Relevant</h3>
          </div>
          <div class="postlist-center-text">
            <h3>Recent</h3>
          </div>
          <div class="postlist-left">
            <div class="postlink">
              <h4>woah gammers just got this message...</h4>
            </div>
            <div class="postlink">
              <h4>woah gammers just got this message...</h4>
            </div>
            <div class="postlink">
              <h4>woah gammers just got this message...</h4>
            </div>
          </div>
          <div class="postlist-center">
            <div class="postlink">
              <h4>woah gammers just got this message...</h4>
            </div>
            <div class="postlink">
              <h4>woah gammers just got this message...</h4>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-wrap">
        <div class="footer-inner-wrap">

        </div>
      </div>

    </div>
  </body>

</html>

<script type="text/javascript">

  //$("html, body").animate({ scrollTop: 0 }, "slow");

  $('#dropBtn').click(function(event) {

  $('.header-info').addClass('.animatable--now');
  $('.header-info').addClass('header-info-fullsize');
  $('.header-info-title').fadeOut(500);
  $('.header-info-hub').fadeOut(500);
  $('#dropBtn').fadeOut(500);

  $(document).on('scroll', function() {

    $(document).off('scroll');
    $('.header-info').removeClass('header-info-fullsize');
    $('.header-info-title').fadeIn(500);
    $('.header-info-hub').fadeIn(500);
    $('#dropBtn').fadeIn(500);
    $('.header-info').removeClass('.animatable--now');
    $("html, body").animate({ scrollTop: 0 }, "slow");
  });

});

</script>
