<?php
	$server="localhost";
	$username="root";
	$password="";
	$database="wd_dbms_project";
?>

<?php
	$conn=mysqli_connect($server,$username,$password,$database);
	if(!$conn)
	{
		die("could not connect server... and Database!!");
	}
?>