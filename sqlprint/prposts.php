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

  $boolValid = true;

  if(isset($_SESSION['situationText']) && isset($_SESSION['situationText']) && isset($_SESSION['situationText'])) {

    $situationsPicked = CreateLike(GetTags($_SESSION['situationText']), "situationTagId");
    $symptomsPicked = CreateLike(GetTags($_SESSION['symptomText']), "symptomTagId");
    $modelsPicked = CreateLike(GetTags($_SESSION['modelText']), "modelTagId");

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
    else {
      ?>
      <h6>Please select values for all parameters</h6>
      <?php
    }

}


?>
