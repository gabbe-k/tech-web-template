<div class="header-info-ask">
  <?php
  if (isset($_SESSION['u_id'])) {
?>
  <form action="sql/sqpost.php"  id="loginForm" method="post">
    <input type="text" id="formfields" name="title" value="Title">
    <input type="text" id="formfields" name="description" value="Description">
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
