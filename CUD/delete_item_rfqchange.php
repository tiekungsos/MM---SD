<?php
$id = $_GET['delID'];
include("C:/xampp/htdocs/admin2/includes/connection.php");

$sql = "DELETE FROM doc_mm_has_material WHERE line_item_mm_id =$id";
if(mysqli_query($connect,$sql))
{
	header('location:http://localhost/admin2/mm_rfq_display.php');
}
else
{
	die('Could not delete record:' .mysqli_error());
}
?>