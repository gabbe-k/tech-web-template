<div class="header-inner-wrap">

  <div class="header-info">

    <?php
    $uri = $_SERVER['PHP_SELF'] ?? "index.php";
    if ($uri == "/index.php") {
      include('header-new-here.php');
    }
    else if ($uri == "/postview.php"){
      include('header-postview.php');
    }
    ?>

  </div>

  <div class="header-nav">

    <a href="../index.php">
      <div id="<?php if ($uri == "/index.php") { echo "header-nav-active"; }?>">
        HOME
      </div>
    </a>

    <a href="../postview.php">
      <div id="<?php if ($uri == "/postview.php") { echo "header-nav-active"; }?>">
        POSTS
      </div>
    </a>

    <?php
      if (isset($_SESSION['u_id'])) {
    ?>
     <a href="../sql/sqlogout.php" id="nav-login">
       <div id="nav-login-div">
         LOGOUT
       </div>
     </a>
    <?php
      }
      else {
    ?>
      <a href="../login.php" id="nav-login">
        <div id="nav-login-div">
          LOGIN
        </div>
      </a>
      <?php
        }
       ?>

  </div>

</div>
