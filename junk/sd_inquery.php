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
    }
    $inq_id=$_SESSION["inq_number"];

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
	document.form1.action="CUD/input_qty.php";
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
  <a href="before_inq.php" class="btn btn-danger" role="button">Back</a>
  <button type="button" class="btn btn-primary" id="Change" value="1">Change</button>     
  <button type="button" class="btn btn-primary" id="Create" value="3">Display</button>     
	</div>
			<p></p>
	<p></p>

		
				
	
	
					
					  <div class="box span12" id="content3">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Display Inquery</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content"  	> 
						
						 <div class="form-group">
						
									 
						</div>
						<p></p>
						<p></p>
						 <div class="form-group">
							 <h2>Item Overview</h2>
							   <label for="usr">Customer number : <input type="text" class="form-control" id="cusnum"  placeholder="Cus66556"  disabled> 
							 </label> 
							 <label for="usr">
								Requested Date : <input type="text" class="form-control" id="cusnum"  placeholder=" 22-05-2017 "  disabled>
							 </label>
							<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
						  <thead>
							  <tr>
								  <th>Material number</th>
								  <th>Description</th>
								  <th>Quantity</th>
								  <th>Unit type</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM tblusers ORDER BY Firstname";
								$result=mysqli_query($connect,$sql); //rs.open sql,con

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
						</div>
						
						
				</div>
					</div>	
				
	
				
<!--					  Change -->
						<div class="box span12" id="content4">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Change Inquery</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content"  	> 
						
						<button type="button" class="btn btn-primary btn-lg">Submit</button>
						 <div class="form-group">							 
						</div>
						<p></p>
						<p></p>
						 <div class="form-group">
							  <label for="usr">Customer number : <input type="text" class="form-control" id="cusnum"  placeholder="Cus66556"  disabled> 
							 </label> 
						
							 <label for="usr">
								Requested Date : <input type="text" class="form-control" id="cusnum"  placeholder=" 22-05-2017 "  disabled>
							 </label>
							 
							  <label for="usr">
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add Material</button>
							 </label> 
							<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
						  <thead>
							  <tr>

								  <th>Material number</th>
								  <th>Description</th>
								  <th>Quantity</th>
								  <th>Unit type</th>
								  								  <th>Select</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM tblusers ORDER BY Firstname";
								$result=mysqli_query($connect,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal2"> Change</button>
								<button type="button" class="btn btn-primary btn-lg" >Delete</button>
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
							 </label> 
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
									<a href="CUD/item_inquiry.php?id=<?= $row['material_number'] ?>&inq_number=<?= $inq_id ?>" class="btn btn-info" id="insert_mat" type="button">Insert</a>
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