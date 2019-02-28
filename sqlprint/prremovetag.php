<?php

    session_start();

    $tag = $_GET['tag'];
    $dbVal = $_GET['dbVal'];
    $dbName = $_GET['dbName'];

    $tagsArray = $_SESSION[$dbName];

    if (($key = array_search($tag, $tagsArray)) !== false) {
        unset($tagsArray[$key]);
        $tagsArray = array_values($tagsArray);
    }

    $_SESSION[$dbName] = $tagsArray;

    if ($dbVal == '1' || $dbVal == '2' || $dbVal == '3') {
      header("Location: ../postview.php?removedtag");
    }
    else {
      header("Location: ../index.php?rmvdtg");
    }



 ?>
