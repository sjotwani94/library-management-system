<?php
include("connect.php");
if( isset($_POST['add']) )
{
		header("location:add_member.php");
}
if( isset($_POST['edit']) )
{
	//if( $_POST['m_id']!="" )
	//{	
		$mid=$_GET["mid"];
		header("location:edit_member.php?mid=$mid");
	//}
	//else
	//{
		//echo '<script type="text/javascript">alert("Enter valid Member ID...");window.location=\'member.php\'</script>';
	//}
}
if( isset($_POST['delete']) )
{
	//if( $_POST['m_id']!="" )
	//{	
		$mid=$_GET["mid"];
		$sql="delete from member where Member_ID='$mid'";
		$result=mysqli_query($conn,$sql);
		echo '<script type="text/javascript">alert("Record of member has been deleted...");window.location=\'member.php\'</script>';
	//}
	//else
	//{
		//echo '<script type="text/javascript">alert("Enter valid Member ID...");window.location=\'member.php\'</script>';
	//}
}
?>