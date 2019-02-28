<!DOCTYPE html>
<?php
    //include('convertAllPhonetic.php');
    session_start();
    //TagsToMetaPhone();
    require_once('sqlprint/prtags.php');
 ?>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Thasadith" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/index.js"></script>
    <title>Index</title>
  </head>

  <body>
    <div class="content-wrap">

      <div class="header-wrap">
        <?php include("view/header.php"); ?>
      </div>

      <div class="main-outer-wrap">
        <?php include("view/main.php"); ?>
      </div>

      <div class="footer-wrap">
        <?php include("view/footer.php"); ?>
      </div>

      <div class="header-exit-button-wrap">
        <button type="button" name="button" id="header-exit-button">
        </button>
      </div>

    </div>
  </body>/

</html>
