<?php
require_once('./sql/sqconnect.php');
require_once('./sqlprint/prcomments.php');

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





function PrintPosts() {

$conn = Connect();

if (isset($_SESSION['situationText'])) {

  $situationsPicked = CreateLike(GetTags($_SESSION['situationText']), "situationTagId");

}

if (isset($_SESSION['situationText'])) {

  $symptomsPicked = CreateLike(GetTags($_SESSION['symptomText']), "symptomTagId");

}

if (isset($_SESSION['situationText'])) {

  $modelsPicked = CreateLike(GetTags($_SESSION['modelText']), "modelTagId");

}

/*

if (isset($_SESSION['situationText'])) {

  for ($i=0; $i < count($_SESSION['situationText']); $i++) {

    if (isset($_SESSION['situationText'][$i])) {
      $tmp = $_SESSION['situationText'][$i];

      if (count($_SESSION['situationText']) == 1 || $i == count($_SESSION['situationText']) - 1) {
        $situationsPicked = $situationsPicked . "'" . $tmp . "'";
      }
      else {
        $situationsPicked = $situationsPicked . "'" . $tmp . "'" . ",";
      }
    }
    else {
      $i++;
    }
  }

}

if (isset($_SESSION['symptomText'])) {

  for ($i=0; $i < count($_SESSION['symptomText']); $i++) {

    if (isset($_SESSION['symptomText'][$i])) {
      $tmp = $_SESSION['symptomText'][$i];

      if (count($_SESSION['symptomText']) == 1 || $i == count($_SESSION['symptomText']) - 1) {
        $symptomsPicked = $symptomsPicked . "'" . $tmp . "'";
      }
      else {
        $symptomsPicked = $symptomsPicked . "'" . $tmp . "'" . ",";
      }
    }
    else {
      $i++;
    }
  }

}

if (isset($_SESSION['modelText'])) {

  for ($i=0; $i < count($_SESSION['modelText']); $i++) {

    if (isset($_SESSION['modelText'][$i])) {
      $tmp = $_SESSION['modelText'][$i];

      if (count($_SESSION['modelText']) == 1 || $i == count($_SESSION['modelText']) - 1) {
        $modelsPicked = $modelsPicked . "'" . $tmp . "'";
      }
      else {
        $modelsPicked = $modelsPicked . "'" . $tmp . "'" . ",";
      }
    }
    else {
      $i++;
    }
  }

} */


//$sqlTag = "SELECT tagId FROM `tags` WHERE tagTextPhonetic IN($tagsPicked)";

//$sqlPostId2 = "SELECT postId FROM `posttag` WHERE tagId IN ($sqlTag)";
//https://stackoverflow.com/questions/2108187/sql-find-rows-and-sort-according-to-number-of-matching-columns
//https://stackoverflow.com/questions/5651605/mysql-order-by-number-of-matches
//något är fel ?

//"SELECT postId, count(*) as Relevance FROM postSituation WHERE postId = '$row['postId']' AND situationTagId IN ($situationPicked)";

  $sqlPostIdAlt = "SELECT *
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



$sql = "SELECT accounts.username, posts.id, posts.titleText, posts.postText, posts.postId FROM accounts, posts WHERE posts.postId IN($sqlPostIdAlt) AND posts.id = accounts.id";

echo $sql;

$result = mysqli_query($conn, $sql);

if (!$result) {
  echo "<p>No posts were found for these tags</p>";
}
else {

  $resultLen = mysqli_num_rows($result);

  for ($i=0; $i < $resultLen; $i++) {
    $row = mysqli_fetch_assoc($result);
    ?>
       <div class="post">
         <div class="title">
           <h1>
             <?php
                echo $row['username'] , ": " , $row['titleText'];
             ?>
           </h1>
         </div>
         <div class="content">
           <p>
             <?php
                echo $row['postText'];
              ?>
           </p>
         </div>
          <div id="comments">
            <div id="commfield">
              <div class="comment">
                 <?php
                    PrintComments($conn, $row['postId']);
                  ?>
                </div>
            </div>
          <?php
            if (isset($_SESSION['u_id'])) {
          ?>
           <form class="" action="../../sql/sqcomment.php" method="post">
             <input type="text" name="commText" value="sope">
             <input type="submit" name="" value="comment">
             <input type="hidden" name="postId" value="<?php echo $row['postId'] ?>" />
           </form>
           <?php
             }
           ?>
         </div>

         <div class="commentbutton">
           <button type="button" name="button" id="commButton"></button>
         </div>

       </div>
    <?php
  }



}

Disconnect($conn);

}

?>
