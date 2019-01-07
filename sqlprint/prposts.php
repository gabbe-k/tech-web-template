<?php
require_once('./sql/sqconnect.php');
require_once('./sqlprint/prcomments.php');

function PrintPosts() {

$conn = Connect();

$tagsPicked = "";

if (!isset($_SESSION['tagText'])) {

}
else {
  for ($i=0; $i < count($_SESSION['tagText']); $i++) {

    if (isset($_SESSION['tagText'][$i])) {
      $tmp = $_SESSION['tagText'][$i];

      if (count($_SESSION['tagText']) == 1 || $i == count($_SESSION['tagText']) - 1) {
        $tagsPicked = $tagsPicked . "'" . $tmp . "'";
      }
      else {
        $tagsPicked = $tagsPicked . "'" . $tmp . "'" . ",";
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
