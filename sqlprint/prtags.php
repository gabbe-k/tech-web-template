<?php
    require_once('./sql/sqconnect.php');

    function PrintTags($dbValue) {

      $dbName = "";
      $nullMessage = "";

      switch ($dbValue) {
        case '1':
          $dbName = "situationText";
          $nullMessage = "No situations selected";
          break;

        case '2':
          $dbName = "symptomText";
          $nullMessage = "No symptoms selected";
          break;

        case '3':
          $dbName = "modelText";
          $nullMessage = "No models selected";
          break;

        case '4':
          $dbName = "situationPost";
          $nullMessage = "No situations selected";
          break;

        case '5':
          $dbName = "symptomPost";
          $nullMessage = "No symptoms selected";
          break;

        case '6':
          $dbName = "modelPost";
          $nullMessage = "No models selected";
          break;

        default:
          // code...
          break;
      }

      if (!isset($_SESSION[$dbName]) || count($_SESSION[$dbName]) == 0) {
        echo "
        <div id='tagmessage'>
          <h6 id='tagmessage-text'>$nullMessage</h6>
        </div>
        ";
      }
      else {
        $tagsArray = $_SESSION[$dbName];
        $conn = Connect();

        for ($i=0; $i < count($tagsArray); $i++) {

          $sql = "SELECT tagText from tags WHERE tagTextPhonetic = '$tagsArray[$i]'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
            ?>
            <div>
                <a href="../sqlprint/prremovetag.php?tag=<?php echo $tagsArray[$i]; ?>&dbVal=<?php echo $dbValue ?>&dbName=<?php echo $dbName ?>">
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
