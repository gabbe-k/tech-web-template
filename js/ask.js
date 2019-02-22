
$(document).ready(function() {

  $("#continueButton").click(function() {
      $(".writepost-wrapper").fadeOut(200);
      $(".addParams-wrapper").fadeIn(200);
  });

  $("#submitButton").click(function() {
      $("#postForm").submit();
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

});
