<?php
    require_once('./sql/sqconnect.php');

    function PrintSituation() {

      if (!isset($_SESSION['situationText']) || count($_SESSION['situationText']) == 0) {
        echo "
        <div id='tagmessage'>
          <h6 id='tagmessage-text'>No situations selected</h6>
        </div>
        ";
      }
      else {
        $tagsArray = $_SESSION['situationText'];
        $conn = Connect();

        for ($i=0; $i < count($tagsArray); $i++) {

          $sql = "SELECT tagText from tags WHERE tagTextPhonetic = '$tagsArray[$i]'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
            ?>
            <div>
                <a href="../sqlprint/prremovesituation.php?tag=<?php echo $tagsArray[$i]; ?>">
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
