<?php
    require_once('./sql/sqconnect.php');

    function PrintTags() {

      if (!isset($_SESSION['tagText']) || count($_SESSION['tagText']) == 0) {
        echo "
        <div id='tagmessage'>
          <h6>No tags selected, add tags here</h6>
        </div>
        ";
      }
      else {
        $tagsArray = $_SESSION['tagText'];

        for ($i=0; $i < count($tagsArray); $i++) {
            ?>
            <div>
                <a href="../sqlprint/prremovetag.php?tag=<?php echo $tagsArray[$i]; ?>">
                    <?php
                    echo $tagsArray[$i];
                    ?>
                </a>
            </div>
        <?php

        }
      }

    }
 ?>
