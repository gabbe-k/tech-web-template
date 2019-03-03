<?php
  require_once('data_valid.php');
  require_once('sqconnect.php');

  session_start();

  $conn = Connect();

  $Title = ClearTags($conn, $_POST['title']);

  $Description = ClearTags($conn, $_POST['description']);

  $tagArrArr=array
    (
      $_SESSION['situationText'],
      $_SESSION['symptomText'],
      $_SESSION['modelText']
    );

  $descId = DupeSearch($conn, "description", "descId");

  PushPostTag($tagArrArr, $conn, $descId, "desctag");

  $sql = "INSERT INTO `descriptions`(`descId`, `descTitle`, `descText`) VALUES ('$descId','$Title','$Description')";

  mysqli_query($conn, $sql);

  Disconnect($conn);

  header("Location: ../postview.php");

 ?>
