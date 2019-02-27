
$(document).ready(function() {

  $("#continueButton").click(function() {
      $(".writepost-wrapper").fadeIn(200);
      $(".addParams-wrapper").fadeOut(200);
  });

  $('.header-wrap').click(function(event) {


      if ($(event.target).is('#paramAdd-Input')) {

        var tagInput = event.target;
        var hiddenInput = $(event.target).next();

        $(tagInput).keyup(function() {
          var searchTxt = $(tagInput).val();
          var dbValue = $(hiddenInput).val();
          console.log(searchTxt);
          searchQ(tagInput, searchTxt, dbValue);
        });

        $(tagInput).keydown(function() {
          var searchTxt = $(tagInput).val();
          var dbValue = $(hiddenInput).val();
          console.log(tagInput);
          searchQ(tagInput, searchTxt, dbValue);
        });

      }

    });

    $('#submitButton').click(function(event) {

      $('#header-exit-button').click();
      location.href = location.href.split('?')[0];
    });

});
