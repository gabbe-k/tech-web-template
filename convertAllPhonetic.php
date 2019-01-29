<?php
include('./sql/sqconnect.php');


function TagsToMetaPhone() {

  $tag1 = metaphone("one" , 5);
  $tag2 =  metaphone("two", 5);
  $tag3 =  metaphone("three", 5);
  $tag4 =  metaphone("four", 5);
  $tag5 =  metaphone("five", 5);
  $tag6 =  metaphone("six", 5);
  $tag7 =  metaphone("seven", 5);
  $tag8 =  metaphone("eight", 5);

  $conn = Connect();
  $conn->query("INSERT INTO tags(tagid, tagText, tagTextPhonetic, tagType) VALUES ('0001','one', '$tag1', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagTextPhonetic, tagType) VALUES ('0002','two', '$tag2', '1')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagTextPhonetic, tagType) VALUES ('0003','three', '$tag3', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagTextPhonetic, tagType) VALUES ('0004','four', '$tag4', '2')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagTextPhonetic, tagType) VALUES ('0005','five', '$tag5', '2')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagTextPhonetic, tagType) VALUES ('0006','six', '$tag6', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagTextPhonetic, tagType) VALUES ('0007','seven', '$tag7', '3')");
  $conn->query("INSERT INTO tags(tagid, tagText, tagTextPhonetic, tagType) VALUES ('0008','eight', '$tag8', '1')");



  Disconnect($conn);
  exit();
}
 ?>
