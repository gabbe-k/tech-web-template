$(document).ready(function() {

  $('.header-wrap').click(function(event) {


      if ($(event.target).is('#addTagForm-Input')) {

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

  export function searchQ(element, searchTxt, dbValue) {

    var searchTxt = $(element).val();
    var tagSearchWrapper = $(element).parent().parent();
    var tagSearchPreview = $(element).parent().next();

    $(tagSearchPreview).addClass('animatable--now');

    $.post("../sql/sqscantags.php",  {searchVal: searchTxt, dbSearch: dbValue}, function(output) {

      if (output == "") {
        $(tagSearchWrapper).removeClass('tagSearch-Wrapper-Border');
        $(tagSearchPreview).removeClass('animatable--now');
      }
      else {
        $(tagSearchWrapper).addClass('tagSearch-Wrapper-Border');
      }


      $(tagSearchPreview).html(output);

    });

  }

  function searchSym() {

    var searchTxt = $("input[name='symSearch']").val();
    $('#tagSearch-Preview').addClass('animatable--now');

    window.console&&console.log(searchTxt);

    $.post("../sql/sqscantags.php",  {searchVal: searchTxt, dbSearch: "2"}, function(output) {

      if (output == "") {
        $('.tagSearch-Wrapper').removeClass('tagSearch-Wrapper-Border');
        $('#tagSearch-Preview').removeClass('animatable--now');
      }
      else {
        $('.tagSearch-Wrapper').addClass('tagSearch-Wrapper-Border');
      }


      $("#tagSearch-Preview").html(output);

    });

  }

function searchMod() {

  var searchTxt = $("input[name='modSearch']").val();
  $('#tagSearch-Preview').addClass('animatable--now');

  $.post("../sql/sqscantags.php",  {searchVal: searchTxt, dbSearch: "3"}, function(output) {

    if (output == "") {
      $('.tagSearch-Wrapper').removeClass('tagSearch-Wrapper-Border');
      $('#tagSearch-Preview').removeClass('animatable--now');
    }
    else {
      $('.tagSearch-Wrapper').addClass('tagSearch-Wrapper-Border');
    }


    $("#tagSearch-Preview").html(output);

  });

}
