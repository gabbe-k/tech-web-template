

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

  function searchQ(element, searchTxt, dbValue) {

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
