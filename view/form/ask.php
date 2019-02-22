<script type="text/javascript" src="./js/postview-header.js"></script>
<script type="text/javascript" src="./js/ask.js"></script>


<div class="header-info-ask-outer">

  <div class="header-info-ask">

    <div class="writepost-wrapper">

      <div class="writepost-instructions">
        <div class="">
          <h1>Open a request</h1>

          <h6>First, write a detailed description about your problem, and try to sum the problem up in a few words in the title.</h6>
          <h6>After you're done with that, we'll go on to adding tags to the post.</h6>
        </div>
      </div>

      <?php
        if (isset($_SESSION['u_id'])) {
      ?>

      <div class="">
        <form action="sql/sqpost.php"  id="postForm" method="post">
          <input type="text" name="title" value="Title">
          <textarea name="description" value="Description" rows="8" cols="80"></textarea>
          <input type="button" id="continueButton" value="Continue">
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
              <form id="param-add-form" action="index.html" method="post">
                <input type="text" name="param" id="paramAdd-Input" placeholder="Search symptom tags...">
                <input type="hidden" value="1">
              </form>
              <div id="addParams-Preview">

              </div>
            </div> 
          </div>

          <div class="param-view">
              <p>No situations added, use the search bar in the top right of the window</p>
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
              <form id="param-add-form" action="index.html" method="post">
                <input type="text" name="param" id="paramAdd-Input" placeholder="Search symptom tags...">
                <input type="hidden" value="2">
              </form>
              <div id="addParams-Preview">

              </div>
            </div>
          </div>

          <div class="param-view">
              <p>No situations added, use the search bar in the top right of the window</p>
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
              <form id="param-add-form" action="index.html" method="post">
                <input type="text" name="param" id="paramAdd-Input" placeholder="Search symptom tags...">
                <input type="hidden" value="3">
              </form>
              <div id="addParams-Preview">

              </div>
            </div>
          </div>

          <div class="param-view">
              <p>No situations added, use the search bar in the top right of the window</p>
          </div>

        </div>

      </div>

      <button type="button" name="button" id="submitButton">Submit</button>

    </div>


  </div>

</div>
