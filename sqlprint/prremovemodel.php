<?php
    session_start();

    $tag = $_GET['tag'];

    $tagsArray = $_SESSION['modelText'];

    if (($key = array_search($tag, $tagsArray)) !== false) {
        unset($tagsArray[$key]);
        $tagsArray = array_values($tagsArray);
    }

    $_SESSION['modelText'] = $tagsArray;

    header("Location: ../postview.php");


 ?>
