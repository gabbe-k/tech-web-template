<?php

    session_start();

    $tag = $_GET['tag'];
    $dbName = $_GET['dbName'];

    $tagsArray = $_SESSION[$dbName];

    if (($key = array_search($tag, $tagsArray)) !== false) {
        unset($tagsArray[$key]);
        $tagsArray = array_values($tagsArray);
    }

    $_SESSION[$dbName] = $tagsArray;

    if ($dbName == '1' || $dbName == '2' || $dbName == '3') {
      header("Location: ../postview.php?removedtag");
    }
    else {
      header("Location: ../index.php?rmvdtg");
    }



 ?>
