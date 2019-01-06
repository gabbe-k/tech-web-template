<?php

  function PrintComments($conn, $postId) {

  //fel på den här sql
  $sql = "SELECT accounts.username, comments.commText, comments.id FROM accounts, comments WHERE comments.postId = '$postId' AND accounts.id = comments.id";
  $result = mysqli_query($conn, $sql);
  $resultLen = mysqli_num_rows($result);

  /*$sql2 = "SELECT accounts.username FROM comments, accounts WHERE ";
  $resultUsr = mysqli_query($conn, $sql2);
  $resultUsrLen = mysqli_num_rows($resultUsr); */

//skriver bara ut 1 anvnamn
  if (isset($resultLen)) {

        for ($i=0; $i < $resultLen; $i++)
        {
          $row = mysqli_fetch_assoc($result);
        //  $rowUsr = mysqli_fetch_assoc($resultUsr);
        ?>
          <div id ="usr">
            <p>
              <?php
                echo $row['username'];
              ?>
            </p>
          </div>
          <div id="text">
            <?php echo $row['commText'];?>
          </div>
        <?php

        }
    }
    else {
      echo "no comments sir";
    }


  }

 ?>
