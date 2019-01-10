$(document).ready(function() {

    $('#addTags').click(function(event) {

      $('#addTags').addClass('animatable--now');
      $('.tagSearch-Wrapper').addClass('animatable--now');

      $('#addTags').removeClass('buttonClickedTwo');

      $('#addTags').fadeOut(150, function() {
          $(this).hide();
          $('.tagSearch-Wrapper').addClass('isShown');

          $(document).click(function(event) {

          window.console&&console.log(event.target);

          if(!$(event.target).is('#addTagForm-Input') && $('.tagSearch-Wrapper').hasClass('isShown')) {

            $('#addTags').addClass('animatable--now');
            $('.tagSearch-Wrapper').addClass('animatable--now');
            $('.tagSearch-Wrapper').removeClass('isShown');
            $('#addTags').fadeIn(150);
            $('#addTags').addClass('buttonClickedTwo');

          }

          });

      });

      if ($('.tagSearch-Wrapper').hasClass('isShown')) {



      }

      $('#addTagForm').on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function(event) {
        $('#addTagForm').removeClass('animatable--now');
        $('#addTags').removeClass('animatable--now');
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

});
