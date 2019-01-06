<?php
  require_once('sqconnect.php');
  require_once('data_valid.php');
  session_start();

  //https://www.red-gate.com/simple-talk/blogs/string-comparisons-in-sql-edit-distance-and-the-levenshtein-algorithm/
  //BIG SEARCH ALGORITM

  $conn = Connect();

  $tag = ClearTags($conn, $_POST['tagSearch']);

  $tag = preg_replace('/[^a-zA-Z0-9_]/', '', $tag);

  if (isset($_SESSION['tagText']) && array_search($tag, $_SESSION['tagText']) !== false) {
      echo "already have";
      header("Location: ../postview.php");
      exit();
  }
  else {
  //här ska vi inte visa en ofärdig tagg

      $sql = "SELECT tagText FROM tags WHERE tagText = '$tag'";
      $result = mysqli_query($conn, $sql);
      $resultLen = mysqli_num_rows($result);

      if ($resultLen == 0) {
        echo "unknown tag";
        exit();
      }
      else {
        $_SESSION['tagText'][] = $tag;
        echo "added tag: " . $tag;
      }

      header("Location: ../postview.php");
      Disconnect($conn);
      exit();
  }



  /*
  not work atm
    for ($i=0; $i < count($_SESSION['tagText']); $i++) {

      $tmp = $_SESSION['tagText'][$i];

      if (count($_SESSION['tagText']) == 1 || $i == count($_SESSION['tagText']) - 1) {
        $tagsPicked = $tagsPicked . "\"" . $tmp . "\"";
      }
      else {
        $tagsPicked = $tagsPicked . "\"" . $tmp . "\"" . " OR ";
      }
    }

    echo $tagsPicked;

    $sqlTagId = "SELECT tagId FROM `tags` WHERE CONTAINS(tagText, '$tagsPicked')
    GROUP BY tagId
    HAVING COUNT(DISTINCT tagText) = (SELECT COUNT(tagText) FROM tags)";
  */


 ?>
