<?php
require_once('data_valid.php');
require_once('sqconnect.php');

session_start();

$conn = Connect();

$id = $_SESSION['u_id'];
$commText = ClearTags($conn, $_POST['commText']);
$postId = $_POST['postId'];

$commId = DupeSearch($conn, "comments", "commId");

$conn->query("INSERT INTO comments (id, commText, commId, postId) VALUES ('$id', '$commText', '$commId', '$postId')");

Disconnect($conn);

header("Location: ../postview.php")
 ?>
