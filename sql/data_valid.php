<?php

  function PushPostTag($tagArrArr, $conn, $postId, $database) {

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

            switch ($j + 1) {
              case '1':
                $tagSit[] = $tagId;
                break;

              case '2':
                $tagSym[] = $tagId;
                break;

              case '3':
                $tagMod[] = $tagId;
                break;
            }

            $tagPhonetic = metaphone($tagArrArr[$j][$i]);
            $tagType = $j + 1;

            echo $tagArrArr[$j][$i];

            $conn->query("INSERT INTO tags (tagId, tagText, tagTextPhonetic, tagType) VALUES ('$tagId', '$tagArrArr[$j][$i]', $tagPhonetic, $tagType)");

          }
          else {
            $row = mysqli_fetch_assoc($result);

            switch ($j + 1) {
              case '1':
                $tagSit[] = $row['tagId'];
                break;

              case '2':
                $tagSym[] = $row['tagId'];
                break;

              case '3':
                $tagMod[] = $row['tagId'];
                break;

            }

          }

        }

      }

    $tagSitStr = implode(',' , $tagSit);
    $tagSymStr = implode(',' , $tagSym);
    $tagModStr = implode(',' , $tagMod);

    if ($postId > 0) {
      $sql = "INSERT INTO $database (postId, situationTagId, symptomTagId, modelTagId) VALUES ('$postId', '$tagSitStr', '$tagSymStr', '$tagModStr')";
      mysqli_query($conn, $sql);
    }

    $returnArr=array
      (
        $tagSitStr,
        $tagSymStr,
        $tagModStr
      );

    return $returnArr;

  }

  function validForm($form_vars) {
      foreach ($form_vars as $var) {
        if ( ($var == "Username" || $var == "Password" || $var == "username" || $var == "password") || !isset($var) || empty($var) ) {
          return false;
        }
      }

      return true;
    }

  function isValidEmail($email){
      return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }

  function ClearTags($conn, $string)
  {
      return mysqli_real_escape_string($conn, $string);
  }

  function DupeSearch($conn, $database, $item) {

    $dupe = true;

    while ($dupe) {

      $idVal = rand(0, 9999);

      $sqlComm = "SELECT '$item' FROM '$database' WHERE '$database'.'$item' = '$idVal'";
      $result = mysqli_query($conn, $sqlComm);

      if (!$result) {
        $dupe = false;
      }
      else {
        $dupe = true;
      }

    }

    return $idVal;

  }

  function IdExists($conn, $database, $item, $id) {

      $dupe = true;

      $sqlComm = "SELECT '$item' FROM '$database' WHERE '$database'.'$item' = '$id'";
      $result = mysqli_query($conn, $sqlComm);

      if (!$result) {
        $dupe = false;
      }
      else {
        $dupe = true;
      }

    return $dupe;

  }

?>
