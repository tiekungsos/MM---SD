<?php
	require_once("functions/function.php");
	include("includes/connection.php");
	get_header();
	get_sidebar();
	get_bread_four();
    //require_once("Script/sd.php");
    if(!empty($_POST))
    {
    	$_SESSION["inq_number"] = $_POST['inq_number'];
    	$_SESSION['custo_id']=$_POST['custo_id'];
    }
    $inq_id=$_SESSION["inq_number"];
    $custo_id=$_SESSION['custo_id'];

?>
	
<script language="javascript">
	function fncSubmit(strPage)
	{
	if(strPage == "page1")
	{
	document.form1.action="CUD/create_inquiry_doc.php";
	}

	if(strPage == "page2")
	{
	document.form1.action="CUD/input_qtychange.php";
	}

	if(strPage == "page3")
	{
	document.form1.action="CUD/sd_inquery.php";
	}

	document.form1.submit();
	}
</script>
<form action="" method="post" name="form1" id="form1">	
<div class="row-fluid sortable">		

	
	<div class="container">
<!--		<button type="button" class="btn btn-primary" id="Display" value="2">Create</button>   -->
  <a href="before_inq.php?id=<?= $custo_id ?>" class="btn btn-danger" role="button">Back</a>
  
  <button type="button" class="btn btn-primary" id="Change" value="1">Change</button>     
  <button type="button" class="btn btn-primary" id="Display" value="3">Display</button>
	</div>
			<p></p>
	<p></p>

		
				<div class="box-content" id="content2" style="margin-left: 0px;" 	> 
					  
					   	
						<div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Display Inquiry</h2>
					</div>
					<div class="box-content" 	> 
						
						 <div class="form-group">
							 <h2>Header&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								 <b>Document date : <?= date('d/m/Y') ?> </b></h2>
							 <br/>
							 <label for="usr">Customer number : <input type="text" class="form-control" value="<?= $custo_id ?>" name="customer_id" id="cusnum" disabled>
							 	<?php   
								include("includes/connection.php");
								$sql4 = "SELECT * FROM customer WHERE customer_id = '$custo_id'";
								$result4=mysqli_query($connect,$sql4);
								$row4=mysqli_fetch_array($result4);
								?>  
								<?= $row4['first_name'].' '.$row4['last_name'] ?>
							 	<!--  <input type="hidden" name="customer_id" value="66556">  -->
							 </label> 
							<label for="usr">Inquiry number : <input type="text" class="form-control" value="<?= $_SESSION["inq_number"] ?>" disabled  >
								<input type="hidden" name="inq_id" value="<?= $_SESSION["inq_number"] ?>" >
								
								 </label>
						</div>
						<br/>
						<p></p>
						<p></p>
						 <!-- <form action="CUD/create_inquiry_doc.php" method="get"> -->
						 <!-- <form action="" method="post" name="form1"> -->
						 	<?php
						 		$sql4 = "SELECT * FROM document WHERE doc_id = '$inq_id'";
								$result4=mysqli_query($connect,$sql4); //rs.open sql,con
								$row4=mysqli_fetch_array($result4);
							  ?>
						 <div class="form-group">
							 <h2>Item Overview</h2>
							 <label for="usr">
								Requested Date : <input type="date" class="form-control" value="<?= $row4['request_date'] ?>" name="request" id="re-date" disabled>

    						
								 
							 </label> 
							 
							<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
						  <thead>
							  <tr>
								  <th></th>
								  <th>Material number</th>
								  <th>Description</th>
								  <th>Quantity</th>
								  <th>Unit type</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								

								$sql2 = "SELECT * FROM inq_has_mat INNER JOIN material USING(material_number) WHERE doc_id = '$inq_id'";
								$result3=mysqli_query($connect,$sql2); //rs.open sql,con
								while ($row2=mysqli_fetch_array($result3))
								{  ?>

							<!--open of while -->
							<tr>
								<td></td>
								<td><?= $row2['material_number'] ?></td>
								<td><?= $row2['description'] ?></td>
								<td><?= $row2['quantity'] ?></td>
								<td><?= $row2['unit_type'] ?></td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
							 </label> 
							 	<!-- <a name="btnButton1" onClick="JavaScript:fncSubmit('page1')" type="button" class="btn btn-primary"  >Submit</a> -->
							 
						</div>
						<!-- </form> -->
						
				</div>
					</div>
						</div>
	
	
				
<!--					  Change -->
						<div class="box-content" id="content4" 	> 
					  
					   	
						<div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Change Inquiry</h2>
					</div>
					<div class="box-content"  	> 
						
						 <div class="form-group">
							 <h2>Header&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								 <b>Document date : <?= date('d/m/Y') ?> </b></h2>
							 <br/>
							 <label for="usr">Customer number : <input type="text" class="form-control" value="<?= $custo_id ?>" name="customer_id" id="cusnum" >
							 	<?php   
								include("includes/connection.php");
								$sql4 = "SELECT * FROM customer WHERE customer_id = '$custo_id'";
								$result4=mysqli_query($connect,$sql4);
								$row4=mysqli_fetch_array($result4);
								?>  
								<?= $row4['first_name'].' '.$row4['last_name'] ?>
							 	<!--  <input type="hidden" name="customer_id" value="66556">  -->
							 </label> 
							<label for="usr">Inquiry number : <input type="text" class="form-control" value="<?= $_SESSION["inq_number"] ?>" disabled  >
								<input type="hidden" name="inq_id" value="<?= $_SESSION["inq_number"] ?>" >
								
								 </label>
						</div>
						<br/>
						<p></p>
						<p></p>
						 <!-- <form action="CUD/create_inquiry_doc.php" method="get"> -->
						 <!-- <form action="" method="post" name="form1"> -->
						 	<?php
						 		$sql4 = "SELECT * FROM document WHERE doc_id = '$inq_id'";
								$result4=mysqli_query($connect,$sql4); //rs.open sql,con
								$row4=mysqli_fetch_array($result4);
							  ?>
						 <div class="form-group">
							 <h2>Item Overview</h2>
							 <label for="usr">
								Requested Date : <input type="date" class="form-control" value="<?= $row4['request_date'] ?>" name="request" id="re-date">
								&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add Material</button>

    						
								 
							 </label> 
							 
							<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
						  <thead>
							  <tr>
								  <th></th>
								  <th>Material number</th>
								  <th>Description</th>
								  <th>Quantity</th>
								  <th>Unit type</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								

								$sql2 = "SELECT * FROM inq_has_mat INNER JOIN material USING(material_number) WHERE doc_id = '$inq_id'";
								$result3=mysqli_query($connect,$sql2); //rs.open sql,con
								while ($row2=mysqli_fetch_array($result3))
								{  ?>

							<!--open of while -->
							<tr>
								<td></td>
								<td><?= $row2['material_number'] ?></td>
								<td><?= $row2['description'] ?></td>
								<td>
									<form action="CUD/input_qtychange.php" method="post">
										<input type="number" name="qty" value="<?= $row2['quantity'] ?>" />
										<input type="hidden" name="line_id" value="<?php echo $row2['line_item']; ?>" />
										<button type="submit" class="btn btn-sm btn-success" onClick="JavaScript:fncSubmit('page2')">Update</button>
										<!-- <input name="btnButton1" type="submit" class="btn btn-success" value="Update"> -->
									</form>
								</td>
								<td><?= $row2['unit_type'] ?></td>
								<td><a class="btn btn-danger" onclick="return confirmDel()" href="CUD/delete_item_inquirychange.php?delID=<?php echo $row2['line_item'];?>">
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
							
							 	<input type="hidden" name="doc_id" value="<?= $inq_id ?>">
							 	<button type="submit" class="btn btn-primary btn-lg" onClick="JavaScript:fncSubmit('page1')">Submit</button>
							 	<!-- <a name="btnButton1" onClick="JavaScript:fncSubmit('page1')" type="button" class="btn btn-primary"  >Submit</a> -->
							 
						</div>
						<!-- </form> -->
						
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

								$sql = "SELECT * FROM material";
								$result2=mysqli_query($connect,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result2))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['material_number']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td class="center">
									<!-- <input type="hidden" name="mat_id" value="<?= $row['material_number'] ?>"> -->
<!--									<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />-->
									<a href="CUD/item_inquiry_change.php?id=<?= $row['material_number'] ?>&inq_number=<?= $inq_id ?>" class="btn btn-info" id="insert_mat" type="button">Insert</a>
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
<div class="modal fade bs-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Material</h4>
      </div>
      <div class="modal-body">
        <label for="usr">
								<table class="table table-striped table-bordered ">
									
						  <thead>
							  <tr>
								  <th></th>
								  <th>Material number</th>
								  <th>Description</th>
								  <th>Quantity</th>
								  
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM tblusers ORDER BY Firstname";
								$result=mysqli_query($connect,$sql);//rs.open sql,con
							
							 while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
							 </label> 
		  <div class="form-group">
  <label for="usr">Enter Material Number </label>
  <input type="text" class="form-control" id="number_material">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Change</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 3-->
<div class="modal fade bs-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Find Customer</h4> 
      </div>
      <div class="modal-body">
		  <div class="form-group">
           <label for="usr">Customer Id:</label>
             <input type="text" class="form-control" id="usr">
			    <button type="button" class="btn btn-primary">Enter</button>
           </div> 
        <label for="usr">
								<div class="form-group">
  <label for="sel1">Select Inquery</label>
  <select class="form-control" id="sel1">
    <option>In586</option>
    <option>In589</option>
    <option>In587</option>
    <option>In582</option>
  </select>
</div>          
		 </label> 
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Select</button>
      </div>
    </div>
  </div>
</div> 



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