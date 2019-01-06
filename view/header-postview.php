<div class="header-info-start">
  <div class="header-info-title">
    <h1>Your current tags</h1>
  </div>
  <div class="header-info-hub">
    <div class="tagSection">
      <div id="tagviewer">

          <?php
             PrintTags();
           ?>

          <div id="addDiv">
            <button type="button" name="button" id="addTags"></button>
            <form id="addTagForm" action="../sql/sqaddtags.php" method="post">
              <input type="text" name="tagSearch" value="Add tags...">
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
