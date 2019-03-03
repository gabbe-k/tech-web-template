<?php

  require_once('./sql/sqconnect.php');

  function GetTags($arr) {

    $conn = Connect();

    for ($i=0; $i < count($arr); $i++) {
      $tmpStr = "";

      if ($i < count($arr) - 1) {
        $tmpStr = $tmpStr . $arr[$i] . ',';
      }
      else {
        $tmpStr = $tmpStr . $arr[$i];
      }

    }

    $sql = "SELECT tagId FROM tags WHERE tagtextPhonetic IN ('$tmpStr')";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);

    Disconnect($conn);

  }

  function CreateLike($arr, $prefix) {

    $arrSit = implode(',' , $arr);

    rsort($arr);

    for ($i = count($arr); $i > 0; $i--) {

      $tmpString = "";
      $All = [];

      for ($j=0; $j < $i; $j++) {
        $All[] = $arr[$j];
      }

      $All = implode(',' , $All);

      $tmpStr1 = '%,' . $All . ',%';
      $tmpStr2 = $All . ',%';
      $tmpStr3 = '%,' . $All;

      $tmpString = $tmpString . "

      `$prefix` = '$All'
      OR    `$prefix` LIKE '$tmpStr2'
      OR    `$prefix` LIKE '$tmpStr3'
      OR `$prefix` LIKE  '$tmpStr1'

      ";

    }

    return $tmpString;

  }

  function GetPostRes() {

    $conn = Connect();

    $boolValid = true;

    if(isset($_SESSION['situationText']) && isset($_SESSION['symptomText']) && isset($_SESSION['modelText'])
      && count($_SESSION['situationText']) > 0 && count($_SESSION['symptomText']) > 0 && count($_SESSION['modelText']) > 0 ) {

      $situationsPicked = CreateLike(GetTags($_SESSION['situationText']), "situationTagId");
      $symptomsPicked = CreateLike(GetTags($_SESSION['symptomText']), "symptomTagId");
      $modelsPicked = CreateLike(GetTags($_SESSION['modelText']), "modelTagId");

      $sqlPostIdAlt = "SELECT postId
        FROM     `posttag`
        WHERE
          $situationsPicked

          OR

          $symptomsPicked

          OR

          $modelsPicked

        ORDER BY (
          (
            $situationsPicked
          )
          +
          (
            $symptomsPicked
          )
          +
          (
            $modelsPicked
          )
          )  DESC
        ";

        $sql = "SELECT accounts.username, posts.id, posts.titleText, posts.postText, posts.postId
        FROM accounts, posts
        WHERE posts.postId IN($sqlPostIdAlt)
        AND accounts.id = posts.id";

        $result = mysqli_query($conn, $sql);

        return $result;

        Disconnect($conn);

      }

    }

  function GetDescRes() {

    $conn = Connect();

    $tagArrArr=array
      (
        $_SESSION['situationText'],
        $_SESSION['symptomText'],
        $_SESSION['modelText']
      );

    $tagStrArr = PushPostTag($tagArrArr, $conn, -2, "posttag");

    $sqlDesc = "SELECT descId, descTitle, descText FROM descriptions WHERE descId IN(
      SELECT postId FROM desctag WHERE situationTagId = $tagStrArr[0]
      AND symptomTagId = '$tagStrArr[1]'
      AND modelTagId = '$tagStrArr[2]'
    )";

    $resultDesc = mysqli_query($conn, $sqlDesc);

    return $resultDesc;

    Disconnect($conn);

  }

 ?>
