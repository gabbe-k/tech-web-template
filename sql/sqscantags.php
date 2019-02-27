<?php
  require_once('sqconnect.php');
  require_once('data_valid.php');
  session_start();

  $conn = Connect();

  if (isset($_POST['searchVal']) && $_POST['searchVal'] != null) {

    $db = $_POST['dbSearch'];
    $dbPost = $_POST['dbSearch'];
    if ($db == "4") {
      $db = "1";
    }
    if ($db == "5") {
      $db = "2";
    }
    if ($db == "6") {
      $db = "3";
    }

    $tag = ClearTags($conn, $_POST['searchVal']);
    $tag = preg_replace('/[^a-zA-Z0-9_]/', '', $tag);
    $tagMeta = metaphone($tag, 5);

    $sql = "SELECT tagText FROM tags WHERE tagType = '$db'
    AND (tagTextPhonetic = '$tagMeta' OR tagTextPhonetic LIKE '$tagMeta%'
    OR tagTextPhonetic LIKE '%$tagMeta'
    OR tagText LIKE '%$tag%' OR '%$tag' OR '$tag%')";
    $result = mysqli_query($conn, $sql);
    $resultLen = mysqli_num_rows($result);

    if ($resultLen == 0) {
      echo "No result";
    }
    else {

      for ($i=0; $i < $resultLen; $i++) {
          $row = mysqli_fetch_assoc($result);
        ?>

          <form action="../sql/sqaddtags.php" method="post">
            <input type="submit" name="tagText" value="<?php  echo $row['tagText'];  ?>">
            <input type="hidden" name="hidden" value="<?php  echo $dbPost  ?>">
          </form>

        <?php
      }

    }

  }





 ?>
