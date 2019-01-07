<!DOCTYPE html>
<?php
    session_start();
    require_once('sqlprint/prposts.php');
    require_once('sqlprint/prtags.php');
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
        <div class="postViewer">
          <?php
            PrintPosts();
           ?>
        </div>
      </div>

      <div class="footer-wrap">
        <?php include("view/footer.php"); ?>
      </div>

    </div>
  </body>

</html>

<script type="text/javascript">

    $('#addTags').click(function(event) {

      $('#addTags').addClass('animatable--now');
      $('#tagSearch-Preview').addClass('animatable--now');
      $('#addTagForm').addClass('animatable--now');

      $('#addTags').fadeOut(150, function() {
          $(this).hide();
          $('#addTagForm').addClass('isShown');
          $('#addTagForm').fadeIn(300, function() {
            $('#tagSearch-Preview').addClass('suggShow');  // BUG:
          });
      });

      $('#addTagForm').on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function(event) {
        $('#addTagForm').removeClass('animatable--now');
        $('#addTags').removeClass('animatable--now');
        $('#tagSearch-Preview').removeClass('animatable--now');
      });


    });

    $('.postViewer').click(function(event) {

        var log = $('#log');

        if($(event.target).parent().parent().is('.post') && $(event.target).is('#commButton')) {

          var commfield = $(event.target).parent().siblings('#comments').children();
          console.log(commfield);
          var commButton = $(event.target);
          console.log(commButton);
          var divCommButtom = $(event.target).parent('.commentbutton');


          $(commfield).addClass('animatable--now');
          $(commButton).addClass('animatable--now');
          $(divCommButtom).addClass('animatable--now');

          if (!$(commfield).hasClass('commShow')) {

            $(commfield).addClass('commShow');
            $(commButton).addClass('buttonClicked');
            $(divCommButtom).addClass('commClicked');

          }
          else {

            $(commfield).animate({ scrollTop: "0" });

            $(commfield).removeClass('commShow');
            $(commButton).removeClass('buttonClicked');
            $(divCommButtom).removeClass('commClicked');

            $(commfield).on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function(event) {
              $(commfield).removeClass('animatable--now');
              $(commButton).removeClass('animatable--now');
              $(divCommButtom).removeClass('animatable--now');
            });

          }

        }
        else {

           console.log('someting was clicked.');

        }
    });


</script>
