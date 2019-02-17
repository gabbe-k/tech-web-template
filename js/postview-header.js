
  function searchSit() {

    $( "#addTagForm-Input" ).focus(function() {
      //needs fixing for universal
    });

    var searchTxt = $("input[name='sitSearch']").val();
    $('#tagSearch-Preview').addClass('animatable--now');

    $.post("../sql/sqscantags.php",  {searchVal: searchTxt, dbSearch: "1"}, function(output) {

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
