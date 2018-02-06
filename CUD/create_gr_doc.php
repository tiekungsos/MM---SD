<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$request=$_POST['request'];
	$id=$_POST['doc_id'];
	$gr_number=$_POST['gr_number'];
	$doc_type='3';
	$vendor_id=$_POST['vendor_id'];
	$status="1";
	$sql7 = "select * from document_mm  where doc_mm_id='$gr_number'";
		$result7=mysqli_query($connect,$sql7);
		$rows7 =mysqli_num_rows($result7);
		$i=0;
		if($rows7>$i){
			// echo "<script>
			//   alert('ขออภัย document $id มีอยู่ในระบบแล้ว ดำเนินการต่อจะเป็นการ Update');
			// </script>";

			if(mysqli_query($connect,$sql7))
			{
				// header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('Goods receipt $gr_number already posted.');
					window.location.href='http://localhost/admin2/mm_gr_next.php';
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
			, mysqli_real_escape_string($connect, $gr_number)
			, mysqli_real_escape_string($connect, $request)
			, mysqli_real_escape_string($connect, date('Y-m-d'))
			, mysqli_real_escape_string($connect, $vendor_id)
			, mysqli_real_escape_string($connect, $doc_type)
			, mysqli_real_escape_string($connect, $id));

			$sql2 = "select * from doc_mm_has_material  where doc_mm_id='$id'";
			$result2=mysqli_query($connect,$sql2);
			$i=0;
			$item = array();
			while ($row2=mysqli_fetch_array($result2))
			{
				$qty[$i]=$row2['quantity'];
				$item[$i]=$row2['material_number'];
				$i++;
			}

			for($j=0;$j<$i;$j++)
			{
				$mat_num=$item[$j];
				$sql3 = "select * from material where material_number = '$mat_num'";
				$result3=mysqli_query($connect,$sql3);
				$row3=mysqli_fetch_array($result3);
				$def_qty=$row3['default_qty'];

				
				$update_qty=$def_qty+$qty[$j];

				$sql3 = "UPDATE material SET default_qty = '$update_qty' where material_number='$item[$j]'";
				mysqli_query($connect,$sql3);
			}


			if(mysqli_query($connect,$sql))
			{
				// header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('Purchase order $gr_number Posted.');
					window.location.href='http://localhost/admin2/mm_gr_next.php';
					</script>";
			}
			else
			{
				die('Could not delete record:' .mysql_error());
			}
		}
?>