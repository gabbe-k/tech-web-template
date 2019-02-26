<?php
  require_once('sqconnect.php');
  require_once('data_valid.php');
  session_start();

  //https://www.red-gate.com/simple-talk/blogs/string-comparisons-in-sql-edit-distance-and-the-levenshtein-algorithm/
  //BIG SEARCH ALGORITM

  $conn = Connect();

  if (isset($_POST['tagText'])) {

    $dbName = "";

    switch ($_POST['hidden']) {

      case '1':
        $dbName = "situationText";
        break;

      case '2':
        $dbName = "symptomText";
        break;

      case '3':
        $dbName = "modelText";
        break;

      case '4':
        $dbName = "situationPost";
        break;

      case '5':
        $dbName = "symptomPost";
        break;

      case '6':
        $dbName = "modelPost";
        break;


      default:
        // code...
        break;
    }

    $tag = metaphone(ClearTags($conn, $_POST['tagText']), 5);

    if (isset($_SESSION[$dbName]) && array_search($tag, $_SESSION[$dbName]) !== false) {
      header("Location: ../postview.php?tagdupe");
    }
    else {
      $_SESSION[$dbName][] = $tag;
      header("Location: ../postview.php?addedtag");
    }
    Disconnect($conn);
    exit();

  }
  else if(isset($_POST['tagSearch']) && $_POST['tagSearch'] != null)
  {
    $tag = ClearTags($conn, $_POST['tagSearch']);

    $tag = preg_replace('/[^a-zA-Z0-9_]/', '', $tag);

    $tag = metaphone($tag, 5);

    if (isset($_SESSION[$dbName]) && array_search($tag, $_SESSION[$dbName]) !== false) {
        echo "already have";
        header("Location: ../postview.php?tagdupe");
        exit();
    }
    else {

        $sql = "SELECT tagText FROM tags WHERE tagTextPhonetic LIKE '%$tag%' AND tagType = '1'";
        $result = mysqli_query($conn, $sql);
        $resultLen = mysqli_num_rows($result);

        if ($resultLen == 0) {
          header("Location: ../postview.php?unknown");
          exit();
        }
        else {
          $_SESSION[$dbName][] = $tag;
          echo "added tag: " . $tag;
        }

        header("Location: ../postview.php?addedtag");
        Disconnect($conn);
        exit();
    }

  }
  else {
    echo $_POST['tagText'];
    header("Location: ../postview.php?emptyform");
    Disconnect($conn);
    exit();
  }

  /*
  not work atm
    for ($i=0; $i < count($_SESSION['tagText']); $i++) {

      $tmp = $_SESSION['situationText'][$i];

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
