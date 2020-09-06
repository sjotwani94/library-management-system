<?php
include("connect.php");
include("session.php");
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
width: 1000px;
background-image: url("image/red.jpg");
text-align: center;
margin: 50px 50px;
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

#example2
{
	border: 2px solid black;
	margin: 10px;
}
#example2 th
{
	height: 50px;
	width: 100px;
	text-align: center;
	background-color: darkblue;
	font-family: arial, sans-serif;
	font-size: 110%;
}
#example2 td
{
	height: 50px;
	width: 100px;
	text-align: center;
	background-color: grey;
	font-family: arial, sans-serif;
	font-size: 110%;
}
#letitgo
{
	width: 100px;
}
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
				<li><a href="books.php">Book Entry</a>
				<li><a href="issue.php">Issue Entry</a>
				<li><a href="member.php">Member Entry</a>
				<li><a href="penalty.html">Penalty Entry</a>
			</ul>
		</aside>
		<div id="main">
		<form action="memberone.php" method="post">
			<font style="font-family: impact, sans-serif;font-size:200%">User Profile</font><br><br>
			<center><table>
				<tr>
					<th>Member ID: </th>
					<td><input type="text" name="m_id" placeholder="Email"></td>
				</tr>
				
			</table></center>
			<br>
			<button class="submit btn btn-danger2" type="submit" name="add">Add Member</button>
			<button class="submit btn btn-danger2" type="submit" name="edit">Edit Member</button>
			<div>
				<table id="example2">
					<thead>
						<tr>
							<th>Member ID</th>
							<th>Member Name</th>
							<th>Membership Type</th>
							<th>Joining Date</th>
							<th>Address</th>
							<th>Contact No</th>
							<th>Password</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
							<?php					
									$sql="select * from member where Membership_type!='Administration'";
									$result = mysqli_query($conn,$sql);				
									while($row = mysqli_fetch_array($result))
									{	
									$Member_ID=$row["Member_ID"];
									$Member_Name=$row["Member_Name"];
									$Membership_type=$row["Membership_type"];
									$Joinning_Date=$row["Joinning_date"];
									$Address=$row["Address"];
									$Contact_no=$row["Contact_no"];
									$Password=$row["Password"];
								?>
								<tr>
								<td><?php echo $Member_ID; ?></td>
								<td><?php echo $Member_Name; ?></td>
								<td><?php echo $Membership_type; ?></td>
								<td><?php echo $Joinning_Date; ?></td>
								<td><?php echo $Address; ?></td>
								<td><?php echo $Contact_no; ?></td>
								<td><?php echo $Password; ?></td>
								<td><input id="letitgo" class="submit btn btn-danger" type="submit" name="edit" formaction="memberone.php?mid=<?php echo $Member_ID; ?>" value="Edit"></td>
								<td><input id="letitgo" class="submit btn btn-danger2" type="submit" name="delete" formaction="memberone.php?mid=<?php echo $Member_ID; ?>" value="Delete"></td>
								</tr>
							<?php } ?>
					</tbody>
				</table>
			</div>
		</form>
		</div>
	</div>
</body>
</html>