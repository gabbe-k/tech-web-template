<?php
    require_once('./sql/sqconnect.php');

    function PrintModel() {

      if (!isset($_SESSION['modelText']) || count($_SESSION['modelText']) == 0) {
        echo "
        <div id='tagmessage'>
          <h6 id='tagmessage-text'>No models selected</h6>
        </div>
        ";
      }
      else {
        $tagsArray = $_SESSION['modelText'];
        $conn = Connect();

        for ($i=0; $i < count($tagsArray); $i++) {

          $sql = "SELECT tagText from tags WHERE tagTextPhonetic = '$tagsArray[$i]'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
            ?>
            <div>
                <a href="../sqlprint/prremovemodel.php?tag=<?php echo $tagsArray[$i]; ?>">
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
