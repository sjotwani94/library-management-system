<?php
include("connect.php");
if( isset($_POST['submit']) )
{
	if($_POST['email_id']!="" || $_POST['name']!="" || $_POST['m_type']!="" || $_POST['jdate']!="" || $_POST['address']!="" || $_POST['contact_no']!="" || $_POST['pwd']!="")
	{
		$Email=$_POST['email_id'];
		$Pass=$_POST['pwd'];
		$m_name=$_POST['name'];
		$m_type=$_POST['m_type'];
		$jdate=date('Y-m-d',strtotime($_POST['jdate']));
		$add=$_POST['address'];
		$contact=$_POST['contact_no'];
		$query="insert into member values('$Email','$m_name','$m_type','$jdate','$add','$contact','$Pass')";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);
		if($rows!=0)
		{
			echo '<script type="text/javascript">alert("Member has been added...");window.location=\'member.php\'</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Fail!");window.location=\'member.php\'</script>';
		}
	}
	else
	{
		echo '<script type="text/javascript">alert("Entries can not be empty...");window.location=\'member.php\'</script>';
	}
}
?>