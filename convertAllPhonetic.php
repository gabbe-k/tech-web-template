<?php
include('./sql/sqconnect.php');


function TagsToMetaPhone() {

  $conn = Connect();

  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0001','after update', '1')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0003','changed graphics', '1')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0004','after october update', '1')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0005','blue screen 20405', '1')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0006','after motherboard swap', '1')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0007','after ram swap', '1')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0008','after reboot', '1')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0009','new boot drive', '1')");

  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0010','no video', '2')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0011','bootloop', '2')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0012','3 beeps', '2')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0013','black screen', '2')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0014','no POST', '2')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0015','windows bootloop', '2')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0016','video card fan loud', '2')");

  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0017','msi-bma75-p45', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0018','gtx-770', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0019','gtx-1080', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0020','z97', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0021','i5-3550', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0022','850 evo', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0023','amd card', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagType) VALUES ('0024','fx-8350', '3')");


  $sql1 ="SELECT tagText FROM tags";

  $result = mysqli_query($conn, $sql1);

  $resultLen = mysqli_num_rows($result);

  for ($i=0; $i < $resultLen; $i++) {
    $row = mysqli_fetch_assoc($result);

    $tag = metaphone($row['tagText'], 5);

    $sql2 = "UPDATE tags SET tagTextPhonetic='$tag' WHERE tagText = '$row[tagText]'";

    mysqli_query($conn, $sql2);
  }

  Disconnect($conn);
  exit();
}
 ?>
