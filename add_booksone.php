<?php
include("connect.php");
if( isset($_POST['submit']) )
{
	if( $_POST['book_id']!="" && $_POST['book_name']!="" && $_POST['Author_name']!="" && $_POST['no_of_copies']!="" && $_POST['subject']!="" && $_POST['book_type']!="")
	{
		$b_id=$_POST['book_id'];
		$b_name=$_POST['book_name'];
		$b_type=$_POST['book_type'];
		$a_name=$_POST['Author_name'];
		$nc=$_POST['no_of_copies'];
		$sub=$_POST['subject'];
		$Book_Image = $_FILES['image']['name'];
						if(!$Book_Image)
						{
							$file_path='';
						}
						else
						{
						$file_path = 'upload/';
						$file_path = $file_path . basename( $_FILES['image']['name']);    
						//if(move_uploaded_file($_FILES['image']['tmp_name'], $file_path)) 
						//{      
						//}
						}				
						
		$sql="insert into books values('$b_id','$b_name','$b_type','$a_name','$nc','$sub','$Book_Image')";
		$result = mysqli_query($conn,$sql);
		
		echo '<script type="text/javascript">alert("Book has been added...");window.location=\'books.php\'</script>';
	}
	else
	{
		echo '<script type="text/javascript">alert("Entries can not be empty...");window.location=\'books.php\'</script>';
	}
}
?>