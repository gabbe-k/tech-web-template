<?php
  require_once('sqconnect.php');
  require_once('data_valid.php');

  session_start();

  $conn = Connect();

  $usr = ClearTags($conn, $_SESSION['u_user']);
  $id = ClearTags($conn, $_SESSION['u_id']);

  $description = ClearTags($conn, $_POST['description']);
  $title = ClearTags($conn, $_POST['title']);

  $postId = DupeSearch($conn, "comments", "commId");

  $tags = ClearTags($conn, $_POST['tags']);

  $tagsArray = explode(',', $tags);

  for ($i=0; $i < count($tagsArray); $i++) {

    $result = mysqli_query($conn, "SELECT * FROM tags WHERE tagText='$tagsArray[$i]'");
    $resultLen = mysqli_num_rows($result);

    if ($resultLen > 0) {

        $row = mysqli_fetch_assoc($result);
        $conn->query("INSERT INTO posttag (postId, tagId) VALUES ('$postId', '$row[tagId]')");


    }
    else {

      $tagId = rand(0, 9999);
      $conn->query("INSERT INTO posttag (postId, tagId) VALUES ('$postId', '$tagId')");
      $conn->query("INSERT INTO tags (tagText, tagId) VALUES ('$tagsArray[$i]', '$tagId')");

    }

  }

  $conn->query("INSERT INTO posts (id, titleText, postText, postId) VALUES ('$id', '$title', '$description', '$postId')");

  Disconnect($conn);
 ?>
