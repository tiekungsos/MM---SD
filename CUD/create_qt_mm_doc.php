<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$request=$_POST['request'];
	$id=$_POST['doc_id'];
	$po_number=$_POST['po_number'];
	$doc_type='5';
	$vendor_id=$_POST['vendor_id'];

	$sql7 = "select * from document_mm  where doc_mm_id='$po_number'";
		$result7=mysqli_query($connect,$sql7);
		$rows7 =mysqli_num_rows($result7);
		$i=0;
		if($rows7>$i){
			// echo "<script>
			//   alert('ขออภัย document $id มีอยู่ในระบบแล้ว ดำเนินการต่อจะเป็นการ Update');
			// </script>";
			$sql="UPDATE document_mm SET delivery_date = '$request'  WHERE doc_mm_id = '$po_number'";

			if(mysqli_query($connect,$sql))
			{
				// header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('Quotation $po_number was updated.');
					window.location.href='http://localhost/admin2/mm_qt_next.php';
					</script>";
					// 
			}
			else
			{
				die('Could not delete record:' .mysql_error());
			}
		}
		else
		{

			$sql=sprintf("INSERT INTO document_mm(doc_mm_id,delivery_date,doc_date,vendor_id,doc_mm_type_id,ref_mm_doc) 
				VALUES('%s','%s','%s','%s','%s','%s')"
			, mysqli_real_escape_string($connect, $po_number)
			, mysqli_real_escape_string($connect, $request)
			, mysqli_real_escape_string($connect, date('Y-m-d'))
			, mysqli_real_escape_string($connect, $vendor_id)
			, mysqli_real_escape_string($connect, $doc_type)
			, mysqli_real_escape_string($connect, $id));

			if(mysqli_query($connect,$sql))
			{
				// header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('Quotation $po_number was created.');
					window.location.href='http://localhost/admin2/mm_before_qt.php';
					</script>";
			}
			else
			{
				die('Could not delete record:' .mysql_error());
			}
		}
?>