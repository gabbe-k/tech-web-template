<!DOCTYPE html>
<?php
    session_start();
 ?>
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
        <?php include("view/header.php"); ?>
      </div>

      <div class="main-outer-wrap">
        <?php include("view/main.php"); ?>
      </div>

      <div class="footer-wrap">
        <?php include("view/footer.php"); ?>
      </div>

    </div>
  </body>

</html>

<script type="text/javascript">

  //$("html, body").animate({ scrollTop: 0 }, "slow");

  $('#dropBtn').click(function(event) {

    $("html, body").animate({ scrollTop: 0 });
    $('.header-info').addClass('animatable--now').addClass('header-info-fullsize');

    $('.header-info-start').fadeOut(500);
    $('.header-info-pick-wrapper').delay(500).fadeIn(500);

    $(document).on('scroll', function() {

      $(document).off('scroll');
      $('.header-info-pick-wrapper').fadeOut(100);
      $('.header-info-ask-wrapper').fadeOut(500);
      $('.header-info-answer-wrapper').fadeOut(500);

      if ($('.header-info').hasClass('header-info-fullsize')) {
        $('.header-info').removeClass('header-info-fullsize');
      }

      $('.header-info-start').delay(500).fadeIn(500);
      $('#dropBtn').delay(500).fadeIn(500);
      $("html, body").animate({ scrollTop: 0 });

    });


  });

  $('.askbtn').click(function(event) {

    $('.header-info-pick-wrapper').fadeOut(500);
    $('.header-info-ask-wrapper').delay(500).fadeIn(500);

  });

  $('.answbtn').click(function(event) {

    $('.header-info-pick-wrapper').fadeOut(500);
    $('.header-info-answer-wrapper').delay(500).fadeIn(500);

  });

</script>
