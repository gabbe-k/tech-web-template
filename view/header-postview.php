<script type="text/javascript" src="./js/postview-header.js"></script>

<div class="header-info-start">
  <div class="header-info-title">
    <h1 id="header-info-title-text">Your current tags</h1>
  </div>
  <div class="header-info-hub">

    <div class="tagsection-wrapper">

        <div id="tagviewer">

            <?php
               PrintSituation();
             ?>

            <div id="addDiv">
              <button type="button" name="button" id="addTags"></button>
            </div>
            <div class="tagSearch-Wrapper">
              <form id="addTagForm" action="../sql/sqaddsituation.php" method="post" autocomplete="off">
                <input id="addTagForm-Input" type="text" name="sitSearch" placeholder="Add situations..." onkeyup="searchSit();" onkeydown="searchSit();"/>
              </form>
              <div id="tagSearch-Preview">

              </div>
            </div>

        </div>

        <div id="tagviewer">

            <?php
               PrintSymptom();
             ?>

            <div id="addDiv">
              <button type="button" name="button" id="addTags"></button>
            </div>
            <div class="tagSearch-Wrapper">
              <form id="addTagForm" action="../sql/sqaddsymptom.php" method="post" autocomplete="off">
                <input id="addTagForm-Input" type="text" name="symSearch" placeholder="Add symptoms..." onkeyup="searchSym();" onkeydown="searchSym();"/>
              </form>
              <div id="tagSearch-Preview">

              </div>
            </div>

        </div>

        <div id="tagviewer">

            <?php
               PrintModel();
             ?>

            <div id="addDiv">
              <button type="button" name="button" id="addTags"></button>
            </div>
            <div class="tagSearch-Wrapper">
              <form id="addTagForm" action="../sql/sqaddmodel.php" method="post" autocomplete="off">
                <input id="addTagForm-Input" type="text" name="modSearch" placeholder="Add model names..." onkeyup="searchMod();" onkeydown="searchMod();"/>
              </form>
              <div id="tagSearch-Preview">

              </div>
            </div>

        </div>

    </div>
  </div>
</div>
