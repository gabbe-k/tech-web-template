<?php

  function InsertTag($tagArrArr, $conn, $string, $postId) {

    $tagSit = array();
    $tagSym = array();
    $tagMod = array();

      for ($j=0; $j < 3; $j++) {

        for ($i=0; $i < count($tagArrArr[$j]); $i++) {

          $tag= $tagArrArr[$j][$i];

          $result = mysqli_query($conn, "SELECT * FROM tags WHERE tagTextPhonetic='$tag'");

          $resultLen = mysqli_num_rows($result);

          if ($resultLen == 0) {

            $tagId = DupeSearch($conn, "tags", "tagId");

            switch ($j) {
              case '1':
                $tagSit[] = $tagId;
                break;

              case '2':
                $tagSym[] = $tagId;
                break;

              case '3':
                $tagMod[] = $tagId;
                break;

              default:
                // code...
                break;
            }

            $tagPhonetic = metaphone($tagArrArr[$j][$i]);
            $tagType = $j;

            echo $tagArrArr[$j][$i];

            $conn->query("INSERT INTO tags (tagId, tagText, tagTextPhonetic, tagType) VALUES ('$tagId', '$tagArrArr[$j][$i]', $tagPhonetic, $tagType)");

          }
          else {
            $row = mysqli_fetch_assoc($result);

            switch ($j) {
              case '1':
                $tagSit[] = $row['tagId'];
                break;

              case '2':
                $tagSym[] = $row['tagId'];
                break;

              case '3':
                $tagMod[] = $row['tagId'];
                break;

              default:
                // code...
                break;
            }

          }

        }

      }

    $tagSitStr = implode($tagSit, ',');
    $tagSymStr = implode($tagSym, ',');
    $tagModStr = implode($tagMod, ',');

    $conn->query("INSERT INTO posttag (postId, situationTagId, symptomTagId, modelTagId) VALUES ('$postId', '$tagSitStr', '$tagSymStr', '$tagModStr')");

  }





  require_once('sqconnect.php');
  require_once('data_valid.php');

  session_start();

  $conn = Connect();

  $usr = ClearTags($conn, $_SESSION['u_user']);
  $id = ClearTags($conn, $_SESSION['u_id']);

  if ($_POST['description'] == "" || $_POST['title'] == "") {

    header("Location: ../index.php?emptyf");

  }
  else {

    $description = ClearTags($conn, $_POST['description']);
    $title = ClearTags($conn, $_POST['title']);

    $situation = $_SESSION['situationPost'];
    $symptom = $_SESSION['symptomPost'];
    $model = $_SESSION['modelPost'];

    $tagArrArr=array
      (
        $situation,
        $symptom,
        $model
      );

    $postId = DupeSearch($conn, "posts", "postId");

    InsertTag($tagArrArr, $conn, "situationTagId", $postId);

    $sql = "INSERT INTO posts (id, titleText, postText, postId, postTextPhonetic, titleTextPhonetic) VALUES ('$id', '$title', '$description', '$postId')";

    mysqli_query($conn, $sql);

    echo "INSERT INTO posts (id, titleText, postText, postId) VALUES ('$id', '$title', '$description', '$postId')";



    Disconnect($conn);

  }
 ?>
