<?php

  function InsertTag($tagArrArr, $conn, $string, $postId) {

    $tagArr = array();

      for ($j=0; $j < 3; $j++) {

        for ($i=0; $i < 1; $i++) {

          echo $tagArrArr[$j][0];

          $result = mysqli_query($conn, "SELECT * FROM tags WHERE tagText='$tagArrArr[$j][0]'");
          $resultLen = mysqli_num_rows($result);

          if ($resultLen > 0) {

              $row = mysqli_fetch_assoc($result);
              $tagArr[$j] = $row['tagText'];
              //$conn->query("INSERT INTO posttag (postId, '$string') VALUES ('$postId', '')");

          }
          else {

            $tagId = DupeSearch($conn, "tags", "tagId");
            $tagArr[$j] = $row['tagText'];
            $conn->query("INSERT INTO tags (tagText, tagId) VALUES ('$tagArrArr[$j][$i]', '$tagId')");

          }

        }

      }

    $conn->query("INSERT INTO posttag (postId, situationTagId, symptomTagId, modelTagId) VALUES ('$postId', '$tagArr[0]', '$tagArr[1]', '$tagArr[2]')");

  }



  require_once('sqconnect.php');
  require_once('data_valid.php');

  session_start();

  $conn = Connect();

  $usr = ClearTags($conn, $_SESSION['u_user']);
  $id = ClearTags($conn, $_SESSION['u_id']);

  $description = ClearTags($conn, $_POST['description']);
  $title = ClearTags($conn, $_POST['title']);

  $situation = ClearTags($conn, $_POST['situation']);
  $symptom = ClearTags($conn, $_POST['symptom']);
  $model = ClearTags($conn, $_POST['model']);

  $postId = DupeSearch($conn, "posts", "postId");

  $situationArr = explode(',', $situation);
  $symptomArr = explode(',', $symptom);
  $modelArr = explode(',', $model);

  $tagArrArr=array
    (
      $situationArr,
      $symptomArr,
      $modelArr
    );

    print_r($tagArrArr);

  InsertTag($tagArrArr, $conn, "situationTagId", $postId);

  $conn->query("INSERT INTO posts (id, titleText, postText, postId) VALUES ('$id', '$title', '$description', '$postId')");

  Disconnect($conn);
 ?>
