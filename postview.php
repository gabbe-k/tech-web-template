<!DOCTYPE html>
<?php
    session_start();
    require_once('sqlprint/prposts.php');
    require_once('sqlprint/prsymptom.php');
    require_once('sqlprint/prsituation.php');
    require_once('sqlprint/prmodel.php');
 ?>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Thasadith" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/postview.js"></script>
    <script type="text/javascript" src="./js/postview-header.js"></script>
    <title>Index</title>
  </head>

  <body>
    <div class="content-wrap">

      <div class="header-wrap">
        <?php include("view/header.php"); ?>
      </div>

      <div class="main-outer-wrap">
        <div class="postViewer">
          <?php
            PrintPosts();
           ?>
        </div>
      </div>

      <div class="footer-wrap">
        <?php include("view/footer.php"); ?>
      </div>

    </div>
  </body>

</html>
