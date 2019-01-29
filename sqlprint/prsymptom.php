<?php
    require_once('./sql/sqconnect.php');

    function PrintSymptom() {

      if (!isset($_SESSION['symptomText']) || count($_SESSION['symptomText']) == 0) {
        echo "
        <div id='tagmessage'>
          <h6 id='tagmessage-text'>No symptoms selected</h6>
        </div>
        ";
      }
      else {
        $tagsArray = $_SESSION['symptomText'];
        $conn = Connect();

        for ($i=0; $i < count($tagsArray); $i++) {

          $sql = "SELECT tagText from tags WHERE tagTextPhonetic = '$tagsArray[$i]' AND tagType = '2'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
            ?>
            <div>
                <a href="../sqlprint/prremovesymptom.php?tag=<?php echo $tagsArray[$i]; ?>">
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
