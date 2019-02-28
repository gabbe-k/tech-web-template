<script type="text/javascript" src="./js/postview-header.js"></script>
<script type="text/javascript" src="./js/ask.js"></script>


<div class="header-info-ask-outer">

  <div class="header-info-ask">

    <div class="addParams-wrapper">

      <div class="param-instructions">

        <div class="">
          <h1>Add tags</h1>

          <h6>Take your time to search or create the appropriate tags for your post.</h6>
          <h6>This search is pretty important, it can decide how much help you get.</h6>
        </div>
      </div>

      <div class="param-wrapper">

        <div class="param">

          <div class="param-info">
           <h6>Situations</h6>
          </div>

          <div class="param-add">
            <div class="tagSearch-Wrapper">
                <form id="param-add-form" action="../sql/sqaddtags.php" method="post" autocomplete="off">
                  <input type="text" name="tagText" id="paramAdd-Input" placeholder="Search situation tags...">
                  <input type="hidden" name="hidden" value="4">
                </form>
                <div id="addParams-Preview">

                </div>
            </div>
          </div>

          <div class="param-view">
              <?php
                PrintTags("4");
               ?>
          </div>

        </div>

      </div>

      <div class="param-wrapper">

        <div class="param">

          <div class="param-info">
           <h6>Situations</h6>
          </div>

          <div class="param-add">
            <div class="tagSearch-Wrapper">
              <form id="param-add-form" action="../sql/sqaddtags.php" method="post" autocomplete="off">
                <input type="text" name="tagText" id="paramAdd-Input" placeholder="Search symptom tags...">
                <input type="hidden" name="hidden" value="5">
              </form>
              <div id="addParams-Preview">

              </div>
            </div>
          </div>

          <div class="param-view">
              <?php
                PrintTags("5");
               ?>
          </div>

        </div>

      </div>

      <div class="param-wrapper">

        <div class="param">

          <div class="param-info">
           <h6>Situations</h6>
          </div>

          <div class="param-add">
            <div class="tagSearch-Wrapper">
              <form id="param-add-form" action="../sql/sqaddtags.php" method="post" autocomplete="off">
                <input type="text" name="tagText" id="paramAdd-Input" placeholder="Search model tags...">
                <input type="hidden" name="hidden" value="6">
              </form>
              <div id="addParams-Preview">

              </div>
            </div>
          </div>

          <div class="param-view">
              <?php
                PrintTags("6");
               ?>
          </div>

        </div>

      </div>

      <button type="button" name="button" id="continueButton">Continue</button>

    </div>

    <div class="writepost-wrapper">

      <div class="writepost-instructions">
        <div class="">
          <h1>Open a request</h1>

          <h6>Write a detailed description about your problem, and try to sum the problem up in a few words in the title.</h6>
          <h6>After you're done with that, we'll go on to adding tags to the post.</h6>
        </div>
      </div>

      <?php
        if (isset($_SESSION['u_id'])) {
      ?>

      <div class="">
        <form action="sql/sqpost.php"  id="postForm" method="post" autocomplete="off">
          <input type="text" name="title" placeholder="Title">
          <textarea name="description" placeholder="Description" rows="8" cols="80"></textarea>
          <input type="submit" id="submitButton" value="Submit">
        </form>
      </div>

      <?php
        }
        else {
          ?>
          <h1>Please log in</h1>
          <?php
        }
      ?>

    </div>


  </div>

</div>
