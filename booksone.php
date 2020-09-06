<?php
include("connect.php");
if( isset($_POST['add']) )
{
	header("location:add_books.php");
}
if( isset($_POST['edit']) )
{
	//if( $_POST['b_id']!="" )
	//{	
		$bid=$_GET["bid"];
		header("location:edit_book.php?bid=$bid");
	//}
	//else
	//{
		//echo '<script type="text/javascript">alert("Enter valid Book ID...");window.location=\'books.php\'</script>';
	//}
}
if( isset($_POST['delete']) )
{
	//if( $_POST['b_id']!="" )
	//{	
		$bid=$_GET["bid"];
		$sql="delete from books where Book_ID='$bid'";
		$result=mysqli_query($conn,$sql);
		echo '<script type="text/javascript">alert("Record of book has been deleted...");window.location=\'books.php\'</script>';
	//}
	//else
	//{
		//echo '<script type="text/javascript">alert("Enter valid Book ID...");window.location=\'books.php\'</script>';
	//}
}
?>