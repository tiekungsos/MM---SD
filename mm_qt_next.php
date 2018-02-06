<?php
	require_once("functions/function.php");
	include("includes/connection.php");
	get_header();
	get_sidebar();
		get_bread_five();
    //require_once("Script/sd.php");
    if(!empty($_POST))
    {
    	$_SESSION["rfq_number"] = $_POST['rfq_number'];
    	$_SESSION['vendor_id']=$_POST['vendor_id'];
    }
    $rfq_number=$_SESSION["rfq_number"];
    $vendor_id=$_SESSION['vendor_id'];
    $_SESSION['po_qty']=0;
    $po_number="QT$rfq_number";

  //   $sql7 = "select * from document  where doc_id='$inq_id'";
		// $result7=mysqli_query($connect,$sql7);
		// $rows7 =mysqli_num_rows($result7);
		// $i=0;
		// if($rows7>$i){
		// 	 echo "<script>
		// 	  alert('ขออภัย document $inq_id มีอยู่ในระบบแล้ว ดำเนินการต่อจะเป็นการ Update');
			 
			 
		// 	</script>";
		// 	 }

?>
	
<script language="javascript">
	function fncSubmit(strPage)
	{
	if(strPage == "page1")
	{
	document.form1.action="CUD/create_qt_mm_doc.php";
	}

	if(strPage == "page2")
	{
	document.form1.action="CUD/input_qty_qt_mm.php";
	}

	if(strPage == "page3")
	{
	document.form1.action="CUD/sd_inquery.php";
	}
	if(strPage == "page4")
	{
	document.form1.action="CUD/sd_inquery_display.php";
	}

	document.form1.submit();
	}
</script>
<form action="" method="post" name="form1" id="form1">	
<div class="row-fluid sortable">		

	
	
<a href="mm_before_qt.php?id=<?= $vendor_id ?>" class="btn btn-danger" role="button">Back</a>
	
			<p></p>
	<p></p>
<div class="box span12" style="margin-left: 0px;">

					  
					   	

					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Maintain Quotation</h2>
					</div>
					<div class="box-content"  	> 
						
						 <div class="form-group">
							 <h2>Header&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								 <b>Document date : <?= date('d/m/Y') ?> </b></h2>
							 <br/>
							 <label for="usr">QT number : <input type="text" class="form-control" value="<?= $po_number ?>" disabled  >
								<input type="hidden" name="po_number" value="<?= $po_number ?>" >
								
								 </label>
							 <label for="usr">Vendor id : <input type="text" class="form-control" value="<?= $vendor_id ?>" name="vendor_id" id="cusnum" disabled>
							 	<?php   
								include("includes/connection.php");
								$sql4 = "SELECT * FROM vendor WHERE vendor_id = '$vendor_id'";
								$result4=mysqli_query($connect,$sql4);
								$row4=mysqli_fetch_array($result4);
								?>  
								<?= $row4['company_name'] ?>
							 	<!--  <input type="hidden" name="customer_id" value="66556">  -->
							 </label> 
							<label for="usr">ref. RFQ number : <input type="text" class="form-control" value="<?= $_SESSION["rfq_number"] ?>" disabled  >
								<input type="hidden" name="rfq_number" value="<?= $_SESSION["rfq_number"] ?>" >
								
								 </label>
						</div>
						<br/>
						<p></p>
						<p></p>
						 <!-- <form action="CUD/create_inquiry_doc.php" method="get"> -->
						 <!-- <form action="" method="post" name="form1"> -->
						 	<?php
						 		$sql4 = "SELECT * FROM document_mm WHERE doc_mm_id = '$rfq_number'";
								$result4=mysqli_query($connect,$sql4); //rs.open sql,con
								$row4=mysqli_fetch_array($result4);
							  ?>
						 <div class="form-group">
							 <h2>Item Overview</h2>
							 <label for="usr">
								Deliv. Date : <input type="date" class="form-control" value="<?= $row4['delivery_date'] ?>" name="request" id="re-date">
								&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add Material</button>

    						
								 
							 </label> 
							 
							<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
						  <thead>
							  <tr>
								  <th></th>
								  <th>Material number</th>
								  <th>Description</th>
								  <th>PO Quantity</th>
								  <th>Price</th>
								  <th>Unit</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								

								$sql2 = "SELECT * FROM doc_mm_has_material INNER JOIN material USING(material_number) WHERE doc_mm_id = '$rfq_number'";
								$result3=mysqli_query($connect,$sql2); //rs.open sql,con
								$i=0;
								while ($row2=mysqli_fetch_array($result3))
								{ 	?>

							<!--open of while -->
							<tr>
								<td></td>
								<td><?= $row2['material_number'] ?></td>
								<td><?= $row2['description'] ?></td>
								<td>
									<form action="CUD/input_qty_qt_mm.php" method="post">
										<input type="number" name="qty" value="<?= $row2['quantity'] ?>" />
										<input type="hidden" name="line_id" value="<?php echo $row2['line_item_mm_id']; ?>" />
										<button type="submit" class="btn btn-sm btn-success" onClick="JavaScript:fncSubmit('page2')">Update</button>
										<!-- <input name="btnButton1" type="submit" class="btn btn-success" value="Update"> -->
									</form>
								</td>
								<td><?= number_format($row2['cost_price'],2) ?></td>
								<td>EA</td>
								<td><a class="btn btn-danger" onclick="return confirmDel()" href="CUD/delete_item_qt_mm.php?delID=<?php echo $row2['line_item_mm_id'];?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
							 </label> 
								<input type="hidden" name="vendor_id" value="<?= $vendor_id ?>">
							 	<input type="hidden" name="doc_id" value="<?= $rfq_number ?>">
							 	<button type="submit" class="btn btn-primary btn-lg" onClick="JavaScript:fncSubmit('page1')">Save</button>
							 	<!-- <a name="btnButton1" onClick="JavaScript:fncSubmit('page1')" type="button" class="btn btn-primary"  >Submit</a> -->
							 
						</div>
						<!-- </form> -->
						
				</div>
					</div>
						</div>
	
	
	


</div>

</div><!--/row-->

<!-- Modal 1-->
<div class="modal fade bs-example-modal-lg" id="myModal" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Material</h4>
      </div>
      
      <div class="modal-body">
		  
        <label for="usr">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Material number</th>
								  <th>Description</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM material WHERE vendor_id = '$vendor_id'";
								$result2=mysqli_query($connect,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result2))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['material_number']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td class="center">
<!--									<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />-->
									<a href="CUD/item_qt_mm.php?id=<?= $row['material_number'] ?>&rfq_number=<?= $rfq_number ?>" class="btn btn-info" id="insert_mat" type="button">Insert</a>
									<!-- <button type="submit" class="btn btn-info">Insert</button> -->
								</td>
							</tr>
							<?php
							   } //close of while

							
							?>
						  </tbody>
					  </table>              
							 </label> 
			   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--        <button type="button" class="btn btn-primary">Add Material</button>-->
      </div>
    </div>
  </div>
</div>

<!-- Modal 2-->


</form>
<?php
	 get_footer();
?>		

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->