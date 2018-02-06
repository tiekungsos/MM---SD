<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$mat_id=$_GET['id'];
	$inq_id=$_GET['inq_number'];

	$sql2="SELECT * FROM inq_has_mat WHERE material_number = '$mat_id' && doc_id = '$inq_id'";
	$result2=mysqli_query($connect,$sql2);
	$row2 =mysqli_num_rows($result2);

	if($row2>0)
	{
		echo "<script>
					alert('The material already selected.');
					window.location.href='http://localhost/admin2/sd_inquery.php';
					</script>";
	}
	else
	{
		$sql=sprintf("INSERT INTO inq_has_mat(material_number,doc_id) 
		VALUES('%s','%s')"
		, mysqli_real_escape_string($connect, $mat_id)
		, mysqli_real_escape_string($connect, $inq_id));

		if(mysqli_query($connect,$sql))
		{
			header('location: http://localhost/admin2/sd_inquery.php');
		}
		else
		{
			die('Could not delete record:' .mysql_error());
		}
	}

?>