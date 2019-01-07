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

            </div>
            <form id="addTagForm" action="../sql/sqaddtags.php" method="post">
              <input type="text" name="tagSearch" value="Add tags...">
              <div id="tagSearch-Preview">
                <a class="">
                  <p>Option1</p>
                </a>
                <a class="">
                  <p>Option2</p>
                </a>
              </div>
            </form>

      </div>
    </div>
  </div>
</div>
