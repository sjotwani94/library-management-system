<?php
include("loginone.php");
?>
<html>
<head>
<title>Library Management System</title>
<style>
form
{
border: 10px outset gold;
padding-bottom: 50px;
padding-top: 50px;
width: 500px;
background-image: url("image/sunset.jpg");
text-align: center;
margin: 10% 30%;
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
.dropdown-content a:hover {background-color: #00ff00;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: red;}

</style>
<link rel="stylesheet" type="text/css" href="xyz.css">
<link rel="shortcut icon" href="image/nirma_logo.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="headerlogin">
		<img src="image/nimlogo.png" height="50px" width="120px">
		<h1 align="center" style="font-size:250%">Library Management System</h1>
		<div class="dropdown">
		  <button class="dropbtn">Developers <i class="fa fa-caret-down"></i></button>
		  <div class="dropdown-content">
			<a><b>Dhruvik Kanada (17BCE036)</b></a>
			<a><b>Siddharth Jotwani (17BCE034)</b></a>
			<a><b>Kosam Ganjoo (17BCE041)</b></a>
		  </div>
		</div>
	</div>
	<form action="loginone.php" method="post">
		<font style="font-family: impact, sans-serif;font-size:200%">Login</font><br><br>
		<input type="text" name="email_id" placeholder="Email" data-validate="Please enter email: xyz@nirmauni.ac.in"><br><br>
		<input type="password" name="pwd" placeholder="Password" data-validate="Please enter Password"><br><br>
		<button name="login" class="btn btn-danger1">Login</button>
	</form>
</body>
</html>