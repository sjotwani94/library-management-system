<?php
include("connect.php");
include("session.php");
$mid=$_GET['mid'];
$sql="select * from member where Member_ID='$mid'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);
?>
<html>
<head>
<title>Library Management System</title>
<link rel="stylesheet" type="text/css" href="xyz.css">
<link rel="shortcut icon" href="image/nirma_logo.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
form
{
border: 10px outset #ff4242;
padding-bottom: 50px;
padding-top: 50px;
width: 800px;
background-image: url("image/red.jpg");
text-align: center;
margin: 100px 150px;
background-size: 100% 200%;
}
th,td
{
	font-size: 120%;
	font-family: Verdana;
	color: #eff702;
	text-align: left;
}
/* Dropdown Button */
.dropbtn {
	height: 50px;
	width: 150px;
	font-size: 18px;
	background-color: #208a15;
	border: 1px outset lightgreen;
	color: yellow;
	font-family: candara, sans-serif;
}

/* The container div - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-image: url("image/aside.jpg");
  width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  font-family: Arial, sans-serif;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: red;}
</style>
</head>
<body>
	<div id="header">
		<img src="image/nimlogo.png" height="50px" width="120px">
		<h1 align="center" style="font-size:250%">Library Management System</h1>
		<div class="dropdown">
		  <button class="dropbtn"><?php echo $login_session; ?> Login <i class="fa fa-caret-down"></i></button>
		  <div class="dropdown-content">
			<a><b><?php echo $loginsession; ?></b></a>
			<a><b><?php echo $loginname; ?></b></a>
			<a href="signout.php">Log Out <i class="fa fa-power-off"></i></a>
		  </div>
		</div>
	</div>
	<div id="container">
		<aside>
			<ul>
				<li>Dashboard
				<li><a href="books.html">Book Entry</a>
				<li><a href="issue.php">Issue Entry</a>
				<li><a href="member.php">Member Entry</a>
				<li><a href="penalty.html">Penalty Entry</a>
			</ul>
		</aside>
		<div id="main">
		<form action="edit_memberone.php" method="post">
			<font style="font-family: impact, sans-serif;font-size:200%">User Profile</font><br<br>
			<center><table>
				<tr>
					<th>Member ID: </th>
					<td><input type="text" name="m_id" Value="<?php echo $rows['Member_ID'];?>"></td>
				</tr>
				<tr>
					<th>Member Name: </th>
					<td><input type="text" name="name" Value="<?php echo $rows['Member_Name'];?>"></td>
				</tr>
				<tr>
					<th>Membeship Type: </th>
					<td><input type="text" name="m_type" Value="<?php echo $rows['Membership_type'];?>"></td>
				</tr>
				<tr>
					<th>Joining date: </th>
					<td><input type="date" name="jdate" Value="<?php echo $rows['Joinning_date'];?>"></td>
				</tr>
				<tr>
					<th>Address: </th>
					<td><input type="text" name="address" Value="<?php echo $rows['Address'];?>" </td>
				</tr>
				<tr>
					<th>Contact no: </th>
					<td><input type="number" name="contact_no" Value="<?php echo $rows['Contact_no'];?>"></td>
				</tr>
				<tr>
					<th>Password: </th>
					<td><input type="text" name="pwd" Value="<?php echo $rows['Password'];?>"></td>
				</tr>
			</table></center>
			<br>
			<button class="submit btn btn-danger2" type="submit" name="submit">Edit Member Details</button>
		</form>
		</div>
	</div>
</body>
</html>