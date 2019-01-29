<?php
require_once('./sql/sqconnect.php');
require_once('./sqlprint/prcomments.php');

function PrintPosts() {

$conn = Connect();

$situationsPicked = "";
$symptomsPicked = "";
$modelsPicked = "";

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

}


//$sqlTag = "SELECT tagId FROM `tags` WHERE tagTextPhonetic IN($tagsPicked)";

//$sqlPostId2 = "SELECT postId FROM `posttag` WHERE tagId IN ($sqlTag)";

$sqlPostId = "SELECT a.postId FROM posttag a INNER JOIN
        (
            SELECT  postId, COUNT(*) totalCount
            FROM    posttag
            WHERE tagId IN (SELECT tagId FROM `tags` WHERE tagTextPhonetic IN($tagsPicked))
            GROUP   BY postId
        ) b ON  a.postId = b.postId
            WHERE tagId IN (SELECT tagId FROM `tags` WHERE tagTextPhonetic IN($tagsPicked)) ORDER BY b.TotalCount DESC, a.tagId ASC";

$sql = "SELECT accounts.username, posts.id, posts.titleText, posts.postText, posts.postId FROM accounts, posts WHERE posts.postId IN($sqlPostId) AND posts.id = accounts.id";

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
