<?php
require_once('./sql/sqconnect.php');
require_once('./sql/getposts.php');
require_once('./sqlprint/prcomments.php');


function PrintPosts() {

    $conn = Connect();

    $result = GetPostRes();

    $resultDesc = GetDescRes();
    $resultLen = mysqli_num_rows($result);


    if ($resultLen == 0) {
      echo "<p>No posts were found for these tags</p>";
    }
    else {

      if ($resultLen < 10) {
        $max = $resultLen;
      }
      else {
        $max = $resultLen;
      }

      $descCount = 0;
      if ($resultDesc == false) {
        echo "<p>No descriptions were found for these tags</p>";
      }
      else {
        $resultDescLen = mysqli_num_rows($resultDesc);
      }

      for ($i=0; $i < $max; $i++) {
        $row = mysqli_fetch_assoc($result);
        $rowDesc = mysqli_fetch_assoc($resultDesc);

        if ($descCount < $resultDescLen) {
          ?>

          <div class="desc">

            <div class="title">
              <h1>
                <?php
                   echo $rowDesc['descTitle'];
                ?>
              </h1>
            </div>
            <div class="content">
              <p>
                <?php
                   echo $rowDesc['descText'];
                 ?>
              </p>
            </div>

          </div>

          <?php
          $descCount = $descCount + 1;
        }


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
