<?php
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

    PushPostTag($tagArrArr, $conn, $postId, "posttag");

    $titlePhon = metaphone($title);
    $descPhon = metaphone($description);

    $sql = "INSERT INTO posts (id, titleText, postText, postId, postTextPhonetic, titleTextPhonetic) VALUES ('$id', '$title', '$description', '$postId', '$titlePhon', '$descPhon')";

    mysqli_query($conn, $sql);

    unset($_SESSION['situationPost']);
    unset($_SESSION['symptomPost']);
    unset($_SESSION['modelPost']);

    header("Location: ../index.php");

    Disconnect($conn);

    exit();

  }
 ?>
