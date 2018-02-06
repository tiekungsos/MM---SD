<?php
	$doc_id=$_GET['delID'];
	include("C:/xampp/htdocs/admin2/includes/connection.php");

	$sql = "DELETE FROM document WHERE doc_id ='$doc_id'";


	if(mysqli_query($connect,$sql))
	{
		header('location:http://localhost/admin2/sd_docflow.php');
	}
	else
	{
		die('Could not delete record:' .mysqli_error());
	}

?>