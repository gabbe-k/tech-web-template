<?php
    session_start();

    $tag = $_GET['tag'];

    $tagsArray = $_SESSION['symptomText'];

    if (($key = array_search($tag, $tagsArray)) !== false) {
        unset($tagsArray[$key]);
        $tagsArray = array_values($tagsArray);
    }

    $_SESSION['symptomText'] = $tagsArray;

    header("Location: ../postview.php");


 ?>
