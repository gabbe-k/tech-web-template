<div class="header-info-ask-outer">

  <div class="header-info-ask">

    <h1>Create a post</h1>

    <?php
      if (isset($_SESSION['u_id'])) {
    ?>
    <form action="sql/sqpost.php"  id="postForm" method="post">
      <input type="text" id="formfields" name="title" value="Title">
      <textarea name="description" value="Description" rows="8" cols="80"></textarea>
      <input id="formfields" type="text" name="situation" value="Tags, separate with ','">
      <input id="formfields" type="text" name="symptom" value="Tags, separate with ','">
      <input id="formfields" type="text" name="model" value="Tags, separate with ','">
      <input type="submit" id="submitbutton" value="Submit">
    </form>

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
