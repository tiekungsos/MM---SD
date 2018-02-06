<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$mat_id=$_GET['id'];
	$inq_id=$_GET['rfq_number'];
	$sql=sprintf("INSERT INTO doc_mm_has_material(material_number,doc_mm_id) 
		VALUES('%s','%s')"
	, mysqli_real_escape_string($connect, $mat_id)
	, mysqli_real_escape_string($connect, $inq_id));

	$sql2="SELECT * FROM doc_mm_has_material WHERE material_number = '$mat_id' && doc_mm_id = '$inq_id'";
	$result2=mysqli_query($connect,$sql2);
	$row2 =mysqli_num_rows($result2);

	if($row2>0)
	{
		echo "<script>
					alert('The material already selected.');
					window.location.href='http://localhost/admin2/mm_po_display.php';
					</script>";
	}
	else
	{
		if(mysqli_query($connect,$sql))
		{
			header('location: http://localhost/admin2/mm_po_display.php');
		}
		else
		{
			die('Could not delete record:' .mysql_error());
		}
	}
?>