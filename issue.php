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
border: 10px outset lightgreen;
padding-bottom: 50px;
padding-top: 50px;
width: 1000px;
background-image: url("image/green.jpg");
text-align: center;
margin: 50px 50px;
background-size: 100% 200%;
}
th,td
{
	font-size: 120%;
	font-family: Verdana;
	color: #d0d92b;
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
	background-color: green;
	font-family: arial, sans-serif;
	font-size: 110%;
	color: yellow;
}
#example2 td
{
	height: 50px;
	width: 100px;
	text-align: center;
	background-color: lightgreen;
	font-family: arial, sans-serif;
	font-size: 110%;
	color: blue;
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
		<form action="issueone.php" method="post">
			<font style="font-family: impact, sans-serif;font-size:200%;color: white">Issue The Books</font><br<br>
			<center><table>
				<?php
				if($login_session=="Administration")
				{
				?>
				<tr>
					<th>Book ID: </th>
					<td>
						<select name="book_id">
						<?php
							$i=0;
							$sql="select distinct Book_ID from books ";
							$result = mysqli_query($conn,$sql);				
							while($row = mysqli_fetch_array($result))
							{
								$id=$row["Book_ID"];
								$i=$i+1;
						?>
						<option><?php echo $id;?></option>

					   
						<?php 
						}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Member ID: </th>
					<td><select name="member_id">
						<?php
							$i=0;
							$sql="select distinct Member_ID from member ";
							$result = mysqli_query($conn,$sql);				
							while($row = mysqli_fetch_array($result))
							{
								$id=$row["Member_ID"];
								$i=$i+1;
						?>
						<option><?php echo $id;?></option>
  						<?php 
							}
						?>
						</select>
					</td>
				</tr>
				<?php
				}
				else
				{
					$bid=$_GET["bid"];
					$mid=$_GET["mid"];
				?>
				<tr>
					<th>Book ID: </th>
					<td>
						<input name="book_id" type="text" value="<?php echo $bid; ?>">
					</td>
				</tr>
				<tr>
					<th>Member ID: </th>
					<td>
						<input name="member_id" type="text" value="<?php echo $mid; ?>">
					</td>
				</tr>
				<?php
				}
				?>
				<tr>
					<th>Issue date: </th>
					<td><input type="date" name="issue_date" ></td>
				</tr>
				<tr>
					<th>Return date: </th>
					<td><input type="date" name="return_date" ></td>
				</tr>
			</table></center>
			<br>
			<button class="submit btn btn-danger" type="submit" name="submit">Issue</button><br><br>
			<?php
				if($login_session=="Administration")
				{	
			?>
			<div>
				<table id="example2">
					<thead>
						<tr>
							<th>Issue ID</th>
							<th>Member ID</th>
							<th>Member Name</th>
							<th>Membership Type</th>
							<th>Contact No</th>
							<th>Book Name</th>
							<th>Author Name</th>
							<th>Issue Date</th>
							<th>Return Date</th>
						</tr>
					</thead>
					<tbody>
						<?php					
							$sql="select Issue_ID,Member_ID,Member_Name,Membership_type,Contact_no,Book_name,Author_name,Issue_date,Return_date from books natural join issue natural join member";
							$result = mysqli_query($conn,$sql);				
							while($row = mysqli_fetch_array($result))
							{	
								$Issue_ID=$row["Issue_ID"];
								$Member_ID=$row["Member_ID"];
								$Member_Name=$row["Member_Name"];
								$Membership_type=$row["Membership_type"];
								$Contact_no=$row["Contact_no"];
								$Book_name=$row["Book_name"];
								$Author_name=$row["Author_name"];
								$Issue_date=$row["Issue_date"];
								$Return_date=$row["Return_date"];
								?>
								<tr>
								<td><?php echo $Issue_ID; ?></td>
								<td><?php echo $Member_ID; ?></td>
								<td><?php echo $Member_Name; ?></td>
								<td><?php echo $Membership_type; ?></td>
								<td><?php echo $Contact_no; ?></td>
								<td><?php echo $Book_name; ?></td>
								<td><?php echo $Author_name; ?></td>
								<td><?php echo $Issue_date; ?></td>
								<td><?php echo $Return_date; ?></td>
								</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<?php
				}
			?>
		</form>
		</div>
	</div>
</body>
</html>