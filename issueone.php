<?php
include("connect.php");
include("session.php");
if( isset($_POST['submit']) )
{
	if( $_POST['book_id']!="" && $_POST['member_id']!="" && $_POST['return_date']!="" && $_POST['issue_date']!="" )
	{
		$b_id=$_POST['book_id'];
		$m_id=$_POST['member_id'];
		$r_date=date('Y-m-d',strtotime($_POST['return_date']));
		$i_date=date('Y-m-d',strtotime($_POST['issue_date']));
		$sql="insert into issue values('','$m_id','$b_id','$i_date','$r_date')";
		$result = mysqli_query($conn,$sql);
		if($login_session=="Administration")
		{
			echo '<script type="text/javascript">alert("Book is issued...");window.location=\'issue.php\'</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Book is issued...");window.location=\'index.php\'</script>';
		}
	}
	else
	{
		echo '<script type="text/javascript">alert("Entries can not be empty...");window.location=\'issue.php\'</script>';
	}
}
?>