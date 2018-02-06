<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$bill_date=$_POST['bill_date'];
	$inv_id=$_POST['inv_id'];
	$ref_doc=$_POST['in_id'];
	$doc_type=5;
	$cus_id=$_POST['cust_id'];
	$net_price=$_POST['net_price'];

if($bill_date==''){
	
//	header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('คุณไม่ได้กรอกวันที่กรุณากรอกวันที่');
					window.location.href='http://localhost/admin2/sd_invoice.php';
					</script>";
}
else {
	$sql2 = "select * from document  where doc_id='$inv_id'";
		$result2=mysqli_query($connect,$sql2);
		$rows2 =mysqli_num_rows($result2);
		$i=0;
		if($rows2>$i){
			echo "<script>
			 alert('ขออภัย document $inv_id มีอยู่ในระบบแล้ว');
			window.location.href='http://localhost/admin2/sd_invoice.php';
			</script>";
			return 0;
		}
		else{
			$sql=sprintf("INSERT INTO document(doc_id,billing_date,doc_date,customer_id,doc_type_id,ref_doc,net_price) 
		VALUES('%s','%s','%s','%s','%s','%s','%s')"
			, mysqli_real_escape_string($connect, $inv_id)
			, mysqli_real_escape_string($connect, $bill_date)
			, mysqli_real_escape_string($connect, date('Y-m-d'))
			, mysqli_real_escape_string($connect, $cus_id)
			, mysqli_real_escape_string($connect, $doc_type)
			, mysqli_real_escape_string($connect, $ref_doc)
			, mysqli_real_escape_string($connect, $net_price));

			if(mysqli_query($connect,$sql))
			{
				// header('location: http://localhost/admin2/sd_qt.php');
				

		   		 echo "<script>
					alert('Invoice $inv_id was created.');
					window.location.href='http://localhost/admin2/sd_invoice.php';
					</script>";
			}
			else
			{
				die('Could not delete record:' .mysql_error());
			}
		}
}
	

?>