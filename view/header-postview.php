<script type="text/javascript">
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

</script>

<div class="header-info-start">
  <div class="header-info-title">
    <h1>Your current tags</h1>
  </div>
  <div class="header-info-hub">

    <div class="tagsection-wrapper">

        <div id="tagviewer">

            <?php
               PrintTags();
             ?>

            <div id="addDiv">
              <button type="button" name="button" id="addTags"></button>
            </div>
            <div class="tagSearch-Wrapper">
              <form id="addTagForm" action="../sql/sqaddtags.php" method="post" autocomplete="off">
                <input id="addTagForm-Input" type="text" name="tagSearch" value="Add tags..." onkeyup="searchq();" onkeydown="searchq();"/>
              </form>
              <div id="tagSearch-Preview">

              </div>
            </div>

        </div>

    </div>
  </div>
</div>
