<?php
	include("connect.php");
  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  $sql = "SELECT Book_Image FROM books WHERE Book_ID=$id";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  mysqli_close($link);

  header("Content-type: image/jpeg");
  echo $row['Book_Image'];
?>