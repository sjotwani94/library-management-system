<?php
include("connect.php");
if( isset($_POST['submit']) )
{
	if( $_POST['m_id']!="" && $_POST['name']!="" && $_POST['m_type']!="" && $_POST['jdate']!="" && $_POST['address']!="" && $_POST['contact_no']!="" && $_POST['pwd']!="")
	{
		$mid=$_POST['m_id'];
		$Pass=$_POST['pwd'];
		$m_name=$_POST['name'];
		$m_type=$_POST['m_type'];
		$jdate=date('Y-m-d',strtotime($_POST['jdate']));
		$add=$_POST['address'];
		$contact=$_POST['contact_no'];
		$sql="update member set Member_Name='$m_name' , Membership_type='$m_type' , Joinning_date='$jdate' , Address='$add' , Contact_no='$contact' ,Password='$Pass' where Member_ID='$mid'";
		$result = mysqli_query($conn,$sql);
		
		echo '<script type="text/javascript">alert("Member Details has been Updated...");window.location=\'member.php\'</script>';
	}
	else
	{
		echo '<script type="text/javascript">alert("Entries can not be empty...");window.location=\'member.php\'</script>';
	}
}
?>