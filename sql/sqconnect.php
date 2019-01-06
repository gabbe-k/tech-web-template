<?php

   function Connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webbtest";

  //creating connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //checking connection
    mysqli_set_charset($conn, "UTF8");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;

  }

  function Disconnect($conn) {
    $conn->close();
  } ?>
