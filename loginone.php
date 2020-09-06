<?php
include("connect.php");
session_start(); // Starting Session
if( isset($_POST['login']) )
{
	if (empty($_POST['email_id']) || empty($_POST['pwd'])) 
	{
		echo '<script type="text/javascript">alert("Member_ID/Password field is empty...");window.location=\'login.php\'</script>';
	}
	else
	{
		$Email=$_POST['email_id'];
		$pass=$_POST['pwd'];
		$sql="select * from member where Member_ID='$Email' and Password='$pass'";
		$result=mysqli_query($conn,$sql);
		$rows=mysqli_fetch_array($result);
		$logintype=$rows['Membership_type'];
		if ($rows !="")
		{
			$_SESSION['admin_login']=$Email; // Initializing Session
			if($logintype=="Administration")
			{
				header("location:member.php"); // Redirecting To Other Page
			}
			else
			{
				header("location:index.php");
			}
		}
		else
		{
			echo '<script type="text/javascript">alert("Member_ID/Password is invalid...");window.location=\'login.php\'</script>';
		}
		mysqli_close($conn); // Closing Connection
	}
}
?>