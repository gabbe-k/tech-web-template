<?php
    require_once('./sql/sqconnect.php');

    function PrintTags() {

      if (!isset($_SESSION['tagText']) || count($_SESSION['tagText']) == 0) {
        echo "
        <div id='tagmessage'>
          <h6 id='tagmessage-text'>No tags selected, add tags here</h6>
        </div>
        ";
      }
      else {
        $tagsArray = $_SESSION['tagText'];
        $conn = Connect();

        for ($i=0; $i < count($tagsArray); $i++) {

          $sql = "SELECT tagText from tags WHERE tagTextPhonetic = '$tagsArray[$i]'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
            ?>
            <div>
                <a href="../sqlprint/prremovetag.php?tag=<?php echo $tagsArray[$i]; ?>">
                    <?php
                    echo $row['tagText'];
                    ?>
                </a>
            </div>
        <?php

        }
      }

    }
 ?>
