<!DOCTYPE html>
<?php
    session_start();
    require_once('sqlprint/prposts.php');
    require_once('sqlprint/prtags.php');
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

      <div class="postview-main-outer-wrap">

        <div class="description-adder">

          <div class="description-post-wrapper">

            <div class="writepost-instructions">
              <div class="">
                <h1>Add a description</h1>
                <h6>Write a detailed description about this problem, and try to sum the problem up in a few words in the title.</h6>
              </div>
            </div>



            <div class="">
              <form action="sql/sqdesc.php"  id="postForm" method="post" autocomplete="off">
                <input type="text" name="title" placeholder="Title">
                <textarea name="description" placeholder="Description" rows="8" cols="80"></textarea>
                <input type="submit" id="submitButton" value="Submit">
              </form>
            </div>

          </div>

        </div>

          <?php
            if (isset($_SESSION['situationText']) && isset($_SESSION['symptomText']) && isset($_SESSION['modelText'])
              && count($_SESSION['situationText']) > 0 && count($_SESSION['symptomText']) > 0 && count($_SESSION['modelText']) > 0 ) {
           ?>

        <div class="postViewer-addDescription">

          <div class="addDescription-wrapper">
            <div class="desc-text-wrap">
              <p>Add a description for this problem</p>
            </div>
            <div class="desc-btn-wrap">
                <button type="button" name="button" id="desc-btn"></button>
            </div>
          </div>


        </div>

        <div class="postViewer">

          <div class="postViewer-titles">
            <div id="desc-text">
              <h3>Descriptions</h3>
            </div>
            <div id="desc-text">
              <h3>Answers</h3>
            </div>
          </div>

          <?php
            PrintPosts();
           ?>
        </div>

        <?php
          }
          else {
         ?>

         <p>Please select values for all parameters</p>

         <?php
         }
          ?>
      </div>

      <div class="footer-wrap">
        <?php include("view/footer.php"); ?>
      </div>

    </div>
  </body>

</html>
