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
border: 10px outset lightblue;
padding-bottom: 50px;
padding-top: 50px;
width: 1000px;
background-image: url("image/blue.jpg");
text-align: center;
margin: 50px 50px;
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
	background-color: red;
	font-family: arial, sans-serif;
	font-size: 110%;
	color: yellow;
}
#example2 td
{
	height: 50px;
	width: 100px;
	text-align: center;
	background-color: pink;
	font-family: arial, sans-serif;
	font-size: 110%;
	color: blue;
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
		<form action="booksone.php" method="post">
			<tr>
				<th>Book ID:</th>
				<td><input type="text" name="b_id" placeholder="Enter Book ID"></td>
			</tr>
			<br><br><br>
			<button class="submit btn btn-danger1" type="submit" name="add">Add book into Database</button>
			<button class="submit btn btn-danger1" type="submit" name="edit">Edit book details in Database</button>
			<button class="submit btn btn-danger1" type="submit" name="delete">Delete book record from Database</button>
			<div>
				<table id="example2">
					<thead>
						<tr>
							<th>Book ID</th>
							<th>Book Name</th>
							<th>Book Type</th>
							<th>Author Name</th>
							<th>Copies</th>
							<th>Subject</th>
							<th>Image</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
							<?php					
									$sql="select * from books";
									$result = mysqli_query($conn,$sql);				
									while($row = mysqli_fetch_array($result))
									{	
									$Book_ID=$row["Book_ID"];
									$Book_name=$row["Book_name"];
									$Book_type=$row["Book_type"];
									$Author_name=$row["Author_name"];
									$Copies=$row["Copies"];
									$Subject=$row["Subject"];
									$Book_Image=$row["Book_Image"];
								?>
								<tr>
								<td><?php echo $Book_ID; ?></td>
								<td><?php echo $Book_name; ?></td>
								<td><?php echo $Book_type; ?></td>
								<td><?php echo $Author_name; ?></td>
								<td><?php echo $Copies; ?></td>
								<td><?php echo $Subject; ?></td>
								<td><img src="getImg.php?id=<?php echo $Book_ID; ?>" width="100px;" height="100px;" /></td>
								<td><input id="letitgo" class="submit btn btn-danger" type="submit" name="edit" formaction="booksone.php?bid=<?php echo $Book_ID; ?>" value="Edit"></td>
								<td><input id="letitgo" class="submit btn btn-danger2" type="submit" name="delete" formaction="booksone.php?bid=<?php echo $Book_ID; ?>" value="Delete"></td>
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