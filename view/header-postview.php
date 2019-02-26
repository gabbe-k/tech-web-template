<script type="module" src="./js/postview-header.js"></script>

<div class="header-info-start">
  <div class="header-info-title">
    <h1 id="header-info-title-text">Your current tags</h1>
  </div>
  <div class="header-info-hub">

    <div class="tagsection-wrapper">

        <div id="tagviewer">

            <?php
               PrintTags("1");
             ?>

            <div id="addDiv">
              <button type="button" name="button" id="addTags"></button>
            </div>
            <div class="tagSearch-Wrapper">
              <form id="addTagForm" action="../sql/sqaddtags.php" method="post" autocomplete="off">
                <input id="addTagForm-Input" type="text" name="tagText" placeholder="Add situations..."/>
                <input type="hidden" value="1" name = "hidden">
              </form>
              <div id="tagSearch-Preview">

              </div>
            </div>

        </div>

        <div id="tagviewer">

            <?php
               PrintTags("2");
             ?>

            <div id="addDiv">
              <button type="button" name="button" id="addTags"></button>
            </div>
            <div class="tagSearch-Wrapper">
              <form id="addTagForm" action="../sql/sqaddtags.php" method="post" autocomplete="off">
                <input id="addTagForm-Input" type="text" name="tagText" placeholder="Add symptoms..."/>
                <input type="hidden" value="2" name = "hidden">
              </form>
              <div id="tagSearch-Preview">

              </div>
            </div>

        </div>

        <div id="tagviewer">

            <?php
               PrintTags("3");
             ?>

            <div id="addDiv">
              <button type="button" name="button" id="addTags"></button>
            </div>
            <div class="tagSearch-Wrapper">
              <form id="addTagForm" action="../sql/sqaddtags.php" method="post" autocomplete="off">
                <input id="addTagForm-Input" type="text" name="tagText" placeholder="Add model names..."/>
                <input type="hidden" value="3" name = "hidden">
              </form>
              <div id="tagSearch-Preview">

              </div>
            </div>

        </div>

    </div>
  </div>
</div>
