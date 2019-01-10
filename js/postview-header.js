$(document).ready(function() {

  function searchq() {

    var searchTxt = $("input[name='tagSearch']").val();
    $('#tagSearch-Preview').addClass('animatable--now');

    $.post("../sql/sqscantags.php",  {searchVal: searchTxt}, function(output) {

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

  function addtag() {

  }

<});
