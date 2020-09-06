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
	border: 5px solid yellow;
}
#example2 th
{
	height: 50px;
	width: 270px;
	text-align: center;
	background-color: red;
	font-family: arial, sans-serif;
	font-size: 110%;
	color: yellow;
}
#example2 td
{
	height: 200px;
	width: 270px;
	text-align: center;
	background-image: url("image/aside.jpg");
	font-family: arial, sans-serif;
	font-size: 110%;
	color: blue;
}
#example1
{
	border: 0px;
}
#example1 th
{
	text-align: center;
	background-color: blue;
	font-family: arial, sans-serif;
	font-size: 110%;
	color: white;
}
#example1 td
{
	text-align: center;
	font-family: arial, sans-serif;
	font-size: 110%;
	color: black;
	height: 30px;
	width: 200px;
}
#letitgo
{
	width: 100px;
	padding: 5px 20px;
}
#dashboard
{
	border: 5px double yellow;
	background-image: url("image/main.jpg");
	background-size: 100%;
	background-repeat: repeat-y;
	float: right;
	width: 1110px;
	height: relative;
	margin-bottom: 10px;
	margin-top: 60px;
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
				<li><a href="dashboard.php">Dashboard</a>
				<li><a href="index.php#TB">Text Books</a>
				<li><a href="index.php#RB">Reference Books</a>
				<li><a href="index.php#JO">Journals</a>
				<li><a href="index.php#PE">Periodicals</a>
				<li><a href="index.php#FB">Fiction Books</a>
				<li><a href="index.php#SB">Story Books</a>
			</ul>
		</aside>
		<div id="dashboard">
			<table id="example2">
				<tr>
					<th colspan="4">New Arrivals</th>
				</tr>
				<tr>
					<?php
					$id=0;
					$sql="select * from books order by Copies desc";
					$result = mysqli_query($conn,$sql);				
					while($row = mysqli_fetch_array($result))
					{
						$id=$id+1;
						$Book_ID=$row["Book_ID"];
						$Book_name=$row["Book_name"];
						$Book_type=$row["Book_type"];
						$Author_name=$row["Author_name"];
						$Copies=$row["Copies"];
						$Subject=$row["Subject"];
						$Book_Image=$row["Book_Image"];
					?>
					<td>
						<table id="example1">
							<tr>
								<td>
									<img src="image/book1.jpg" height="100px" width="100px">
								</td>
							</tr>
							<tr>
								<th><?php echo $Book_name;?></th>
							</tr>
							<tr>
								<td><?php echo $Book_ID;?></td>
							</tr>
							<tr>
								<td><?php echo $Book_type;?></td>
							</tr>
							<tr>
								<td><?php echo $Author_name;?></td>
							</tr>
							<tr>
								<td><?php echo $Copies;?></td>
							</tr>
							<tr>
								<td><?php echo $Subject;?></td>
							</tr>
							<tr>
								<td>
								<a id="letitgo" href="issue.php?bid=<?php echo $Book_ID; ?>&&mid=<?php echo $loginsession; ?>" class="submit btn btn-danger2">Issue</a>
								</td>
							</tr>
						</table>
					</td>
					<?php
					if(($id%4)==0)
					{
						?></tr><tr><?php
					}
					}
					?>
				</tr>
				<tr>
					<th colspan="4"><a name="TB">Text Books</a></th>
				</tr>
				<tr>
					<?php
					$id=0;
					$sql="select * from books where Book_type='Text book'";
					$result = mysqli_query($conn,$sql);				
					while($row = mysqli_fetch_array($result))
					{
						$id=$id+1;
						$Book_ID=$row["Book_ID"];
						$Book_name=$row["Book_name"];
						$Book_type=$row["Book_type"];
						$Author_name=$row["Author_name"];
						$Copies=$row["Copies"];
						$Subject=$row["Subject"];
						$Book_Image=$row["Book_Image"];
					?>
					<td>
						<table id="example1">
							<tr>
								<td>
									<img src="image/book1.jpg" height="100px" width="100px">
								</td>
							</tr>
							<tr>
								<th><?php echo $Book_name;?></th>
							</tr>
							<tr>
								<td><?php echo $Book_ID;?></td>
							</tr>
							<tr>
								<td><?php echo $Book_type;?></td>
							</tr>
							<tr>
								<td><?php echo $Author_name;?></td>
							</tr>
							<tr>
								<td><?php echo $Copies;?></td>
							</tr>
							<tr>
								<td><?php echo $Subject;?></td>
							</tr>
							<tr>
								<td>
								<a id="letitgo" href="issue.php?bid=<?php echo $Book_ID; ?>&&mid=<?php echo $loginsession; ?>" class="submit btn btn-danger2">Issue</a>
								</td>
							</tr>
						</table>
					</td>
					<?php
					if(($id%4)==0)
					{
						?></tr><tr><?php
					}
					}
					?>
				</tr>
				<tr>
					<th colspan="4"><a name="RB">Reference Books</a></th>
				</tr>
				<tr>
					<?php
					$id=0;
					$sql="select * from books where Book_type='Reference book'";
					$result = mysqli_query($conn,$sql);				
					while($row = mysqli_fetch_array($result))
					{
						$id=$id+1;
						$Book_ID=$row["Book_ID"];
						$Book_name=$row["Book_name"];
						$Book_type=$row["Book_type"];
						$Author_name=$row["Author_name"];
						$Copies=$row["Copies"];
						$Subject=$row["Subject"];
						$Book_Image=$row["Book_Image"];
					?>
					<td>
						<table id="example1">
							<tr>
								<td>
									<img src="image/book1.jpg" height="100px" width="100px">
								</td>
							</tr>
							<tr>
								<th><?php echo $Book_name;?></th>
							</tr>
							<tr>
								<td><?php echo $Book_ID;?></td>
							</tr>
							<tr>
								<td><?php echo $Book_type;?></td>
							</tr>
							<tr>
								<td><?php echo $Author_name;?></td>
							</tr>
							<tr>
								<td><?php echo $Copies;?></td>
							</tr>
							<tr>
								<td><?php echo $Subject;?></td>
							</tr>
							<tr>
								<td>
								<a id="letitgo" href="issue.php?bid=<?php echo $Book_ID; ?>&&mid=<?php echo $loginsession; ?>" class="submit btn btn-danger2">Issue</a>
								</td>
							</tr>
						</table>
					</td>
					<?php
					if(($id%4)==0)
					{
						?></tr><tr><?php
					}
					}
					?>
				</tr>
				<tr>
					<th colspan="4"><a name="JO">Journals</a></th>
				</tr>
				<tr>
					<?php
					$id=0;
					$sql="select * from books where Book_type='Journal'";
					$result = mysqli_query($conn,$sql);				
					while($row = mysqli_fetch_array($result))
					{
						$id=$id+1;
						$Book_ID=$row["Book_ID"];
						$Book_name=$row["Book_name"];
						$Book_type=$row["Book_type"];
						$Author_name=$row["Author_name"];
						$Copies=$row["Copies"];
						$Subject=$row["Subject"];
						$Book_Image=$row["Book_Image"];
					?>
					<td>
						<table id="example1">
							<tr>
								<td>
									<img src="image/book1.jpg" height="100px" width="100px">
								</td>
							</tr>
							<tr>
								<th><?php echo $Book_name;?></th>
							</tr>
							<tr>
								<td><?php echo $Book_ID;?></td>
							</tr>
							<tr>
								<td><?php echo $Book_type;?></td>
							</tr>
							<tr>
								<td><?php echo $Author_name;?></td>
							</tr>
							<tr>
								<td><?php echo $Copies;?></td>
							</tr>
							<tr>
								<td><?php echo $Subject;?></td>
							</tr>
							<tr>
								<td>
								<a id="letitgo" href="issue.php?bid=<?php echo $Book_ID; ?>&&mid=<?php echo $loginsession; ?>" class="submit btn btn-danger2">Issue</a>
								</td>
							</tr>
						</table>
					</td>
					<?php
					if(($id%4)==0)
					{
						?></tr><tr><?php
					}
					}
					?>
				</tr>
				<tr>
					<th colspan="4"><a name="PE">Periodicals</a></th>
				</tr>
				<tr>
					<?php
					$id=0;
					$sql="select * from books where Book_type='Periodic'";
					$result = mysqli_query($conn,$sql);				
					while($row = mysqli_fetch_array($result))
					{
						$id=$id+1;
						$Book_ID=$row["Book_ID"];
						$Book_name=$row["Book_name"];
						$Book_type=$row["Book_type"];
						$Author_name=$row["Author_name"];
						$Copies=$row["Copies"];
						$Subject=$row["Subject"];
						$Book_Image=$row["Book_Image"];
					?>
					<td>
						<table id="example1">
							<tr>
								<td>
									<img src="image/book1.jpg" height="100px" width="100px">
								</td>
							</tr>
							<tr>
								<th><?php echo $Book_name;?></th>
							</tr>
							<tr>
								<td><?php echo $Book_ID;?></td>
							</tr>
							<tr>
								<td><?php echo $Book_type;?></td>
							</tr>
							<tr>
								<td><?php echo $Author_name;?></td>
							</tr>
							<tr>
								<td><?php echo $Copies;?></td>
							</tr>
							<tr>
								<td><?php echo $Subject;?></td>
							</tr>
							<tr>
								<td>
								<a id="letitgo" href="issue.php?bid=<?php echo $Book_ID; ?>&&mid=<?php echo $loginsession; ?>" class="submit btn btn-danger2">Issue</a>
								</td>
							</tr>
						</table>
					</td>
					<?php
					if(($id%4)==0)
					{
						?></tr><tr><?php
					}
					}
					?>
				</tr>
				<tr>
					<th colspan="4"><a name="FB">Fiction Books</a></th>
				</tr>
				<tr>
					<?php
					$id=0;
					$sql="select * from books where Book_type='Fiction book'";
					$result = mysqli_query($conn,$sql);				
					while($row = mysqli_fetch_array($result))
					{
						$id=$id+1;
						$Book_ID=$row["Book_ID"];
						$Book_name=$row["Book_name"];
						$Book_type=$row["Book_type"];
						$Author_name=$row["Author_name"];
						$Copies=$row["Copies"];
						$Subject=$row["Subject"];
						$Book_Image=$row["Book_Image"];
					?>
					<td>
						<table id="example1">
							<tr>
								<td>
									<img src="image/book1.jpg" height="100px" width="100px">
								</td>
							</tr>
							<tr>
								<th><?php echo $Book_name;?></th>
							</tr>
							<tr>
								<td><?php echo $Book_ID;?></td>
							</tr>
							<tr>
								<td><?php echo $Book_type;?></td>
							</tr>
							<tr>
								<td><?php echo $Author_name;?></td>
							</tr>
							<tr>
								<td><?php echo $Copies;?></td>
							</tr>
							<tr>
								<td><?php echo $Subject;?></td>
							</tr>
							<tr>
								<td>
								<a id="letitgo" href="issue.php?bid=<?php echo $Book_ID; ?>&&mid=<?php echo $loginsession; ?>" class="submit btn btn-danger2">Issue</a>
								</td>
							</tr>
						</table>
					</td>
					<?php
					if(($id%4)==0)
					{
						?></tr><tr><?php
					}
					}
					?>
				</tr>
				<tr>
					<th colspan="4"><a name="SB">Story Books</a></th>
				</tr>
				<tr>
					<?php
					$id=0;
					$sql="select * from books where Book_type='Story book'";
					$result = mysqli_query($conn,$sql);				
					while($row = mysqli_fetch_array($result))
					{
						$id=$id+1;
						$Book_ID=$row["Book_ID"];
						$Book_name=$row["Book_name"];
						$Book_type=$row["Book_type"];
						$Author_name=$row["Author_name"];
						$Copies=$row["Copies"];
						$Subject=$row["Subject"];
						$Book_Image=$row["Book_Image"];
					?>
					<td>
						<table id="example1">
							<tr>
								<td>
									<img src="image/book1.jpg" height="100px" width="100px">
								</td>
							</tr>
							<tr>
								<th><?php echo $Book_name;?></th>
							</tr>
							<tr>
								<td><?php echo $Book_ID;?></td>
							</tr>
							<tr>
								<td><?php echo $Book_type;?></td>
							</tr>
							<tr>
								<td><?php echo $Author_name;?></td>
							</tr>
							<tr>
								<td><?php echo $Copies;?></td>
							</tr>
							<tr>
								<td><?php echo $Subject;?></td>
							</tr>
							<tr>
								<td>
								<a id="letitgo" href="issue.php?bid=<?php echo $Book_ID; ?>&&mid=<?php echo $loginsession; ?>" class="submit btn btn-danger2">Issue</a>
								</td>
							</tr>
						</table>
					</td>
					<?php
					if(($id%4)==0)
					{
						?></tr><tr><?php
					}
					}
					?>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>