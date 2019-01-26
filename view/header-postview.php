<script type="text/javascript" src="./js/postview-header.js"></script>

<div class="header-info-start">
  <div class="header-info-title">
    <h1 id="header-info-title-text">Your current tags</h1>
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
                <input id="addTagForm-Input" type="text" name="tagSearch" placeholder="Add tags..." onkeyup="searchq();" onkeydown="searchq();"/>
              </form>
              <div id="tagSearch-Preview">

              </div>
            </div>

        </div>

    </div>
  </div>
</div>
