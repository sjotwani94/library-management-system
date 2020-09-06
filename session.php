<?php
include("connect.php");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$connection = mysqli_connect("localhost", "root", "","");
// Selecting Database
//$db = mysqli_select_db("sidinqubeta", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['admin_login'];
// SQL Query To Fetch Complete Information Of User
$query12=mysqli_query($conn,"select * from member where Member_ID='$user_check'");
$row12 = mysqli_fetch_assoc($query12);
$loginsession=$row12['Member_ID'];
$loginname=$row12['Member_Name'];
$login_session=$row12['Membership_type'];
if(!isset($loginsession))
	{
		mysqli_close($conn); // Closing Connection
		//header('Location:index.php'); // Redirecting To Home Page
		echo '<script type="text/javascript">alert("You Must Login First...");window.location=\'login.php\'</script>';
	}
?>