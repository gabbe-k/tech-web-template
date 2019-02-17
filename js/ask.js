$(document).ready(function() {

  $("#continueButton").click(function() {
      $(".writepost-wrapper").fadeOut(200);
      $(".addParams-wrapper").fadeIn(200);
  });

  $("#submitButton").click(function() {
      $("#postForm").submit();
  });

});
