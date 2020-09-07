<?php
include("connect.php");
include("session.php");
$bid=$_GET['bid'];
$sql="select * from books where Book_ID='$bid'";
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
border: 10px outset lightblue;
padding-bottom: 50px;
padding-top: 50px;
width: 800px;
background-image: url("image/blue.jpg");
text-align: center;
margin: 100px 150px;
background-size: 110%;
}
th,td
{
	font-size: 120%;
	font-family: Verdana;
	color: #1b7023;
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
				<li><a href="books.php">Book Entry</a>
				<li><a href="issue.php">Issue Entry</a>
				<li><a href="member.php">Member Entry</a>
				<li><a href="#">Penalty Entry</a>
			</ul>
		</aside>
		<div id="main">
		<form action="edit_bookone.php" method="post">
			<font style="font-family: impact, sans-serif;font-size:200%">Books</font><br><br><center>
			<table>
			<tr>
				<th>Book ID:</th>
				<td><input type="text" name="book_id" Value="<?php echo $rows['Book_ID'];?>"></td>
			</tr>
			<tr>
				<th>Book Name:</th>
				<td><input type="text" name="book_name" Value="<?php echo $rows['Book_name'];?>"></td>
			</tr>
			<tr>
				<th>Book Type:</th>
				<td>
					<select name="book_type">
						<option><?php echo $rows['Book_type'];?></option>
						<option>Text book</option>
						<option>Reference book</option>
						<option>Journal</option>
						<option>Periodic</option>
						<option>Fiction book</option>
						<option>Story book</option>			
					</select>
				</td>
			</tr>
			<tr>
				<th>Author name:</th>
				<td><input type="text" name="Author_name" Value="<?php echo $rows['Author_name'];?>"></td>
			</tr>
			<tr>
				<th>No. of copies:</th>
				<td><input type="number" name="no_of_copies" Value="<?php echo $rows['Copies'];?>"></td>
			</tr>
			<tr>
				<th>Subject:</th>
				<td><input type="text" name="subject" Value="<?php echo $rows['Subject'];?>"></td>
			</tr>
			<tr>
				<th>Book Image:</th>
				<td><input type="file" name="image" value="<?php echo $rows['Book_Image'];?>"></td>
			</tr>
			</table></center>
			<br>
			<button class="submit btn btn-danger1" type="submit" name="submit">Edit Book Details</button>
		</form>
		</div>
	</div>
</body>
</html>
