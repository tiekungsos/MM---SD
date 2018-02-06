<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
    //require_once("Script/sd.php");
    if(!empty($_POST))
    {
    	$_SESSION["inq_number"] = $_POST['inq_number'];
    }
?>
			
<div class="row-fluid sortable">		

	
	<div class="container">
<!--		<button type="button" class="btn btn-primary" id="Display" value="2">Create</button>   -->
  <button type="button" class="btn btn-primary" id="Change" value="1">Change</button>     
  <button type="button" class="btn btn-primary" id="Create" value="3">Display</button>     
	</div>
			<p></p>
	<p></p>
<div class="box span12" style="margin-left: 0px;">
					<div class="box-header" data-original-title;>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Inquery</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content" id="content1" 	> 
					  
					   	
						<div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Create Inquery</h2>
					</div>
					<div class="box-content"  	> 
						
						 <div class="form-group">
							 <h2>Header</h2>
							 <br>
							 <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalcustomer">Find Customer</button> 
							 <label for="usr">Customer number : <input type="text" class="form-control" id="cusnum"  placeholder="Cus66556"  disabled> 
							 </label> 
								 <label for="usr">Inquiry number : <input type="text" class="form-control" disabled name="inq_number" value="<?= $_SESSION["inq_number"] ?>" >
								 </label> 
							<label for="usr">
								PO Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="text" class="form-control" id="ponum">  
								&nbsp;&nbsp;&nbsp;PO Date : <input type="text" class="form-control" id="podate">
							 </label> 
						</div>
						<p></p>
						<p></p>
						 <div class="form-group">
							 <h2>Item Overview</h2>
							 <label for="usr">
								Requested Date : <input type="text" class="form-control" id="re-date">
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
								  <th>Action</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM inq_has_mat INNER JOIN material USING(material_number)";
								$result=mysqli_query($connect,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td></td>
								<td><?= $row['material_number'] ?></td>
								<td><?= $row['description'] ?></td>
								<td><input type="number" name="quantity" /></td>
								<td><?= $row['unit_type'] ?></td>
								<td><a class="btn btn-danger" onclick="return confirmDel()" href="CUD/delete_item_inquiry.php?delID=<?php echo $row['line_item'];?>">
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
							 <button type="submit" class="btn btn-primary btn-lg" >Submit</button>
						</div>
						
				</div>
					</div>
						</div>
	
	
	
					<div class="box-content" id="content3" > 
					  <div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Display Inquery</h2>
					</div>
					<div class="box-content"  	> 
						
						 <div class="form-group">
						
							 <label for="usr">
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalcustomer">Find Customer</button> 
							 </label> 						 
						</div>
						<p></p>
						<p></p>
						 <div class="form-group">
							 <h2>Item Overview</h2>
							   <label for="usr">Customer number : <input type="text" class="form-control" id="cusnum"  placeholder="Cus66556"  disabled> 
							 </label> 
							<label for="usr">Inquery Number : <select name="Invoice" onchange="showCustomer(this.value)">
							<option value="">Inquery Number:</option>
							<option value="">In568</option>
							<option value="">In8954</option>
							<option value="">In7987</option>
								</select></label>
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
					</div>
	
					<div class="box-content" id="content4" > 
<!--					  Change -->
						<div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Change Inquery</h2>
					</div>
					<div class="box-content"  	> 
						
						 <div class="form-group">
						
							 <label for="usr">
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalcustomer">Find Customer</button> &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add Material</button>
							 </label> 						 
						</div>
						<p></p>
						<p></p>
						 <div class="form-group">
							  <label for="usr">Customer number : <input type="text" class="form-control" id="cusnum"  placeholder="Cus66556"  disabled> 
							 </label> 
							<label for="usr">Inquery Number : <select name="Invoice" onchange="showCustomer(this.value)">
							<option value="">Inquery Number:</option>
							<option value="">In568</option>
							<option value="">In8954</option>
							<option value="">In7987</option>
								</select></label>
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
					</div>

</div>

</div><!--/row-->

<!-- Modal 1-->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
								$result=mysqli_query($connect,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['material_number']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td class="center">
									<!-- <button type="button" class="btn btn-primary"><a href="index.php">insert</a></button> -->
									<a href="login.php" class="btn btn-info" role="button">Insert</a>
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

<!--
<script>
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#address').val() == '')  
  {  
   alert("Address is required");  
  }  
  else if($('#designation').val() == '')
  {  
   alert("Designation is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
	
</script>
-->
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



<div class="modal fade bs-example-modal-lg" id="myModalcustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Find Customer</h4> 
      </div>
      <div class="modal-body">
		  
		  <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>First name</th>
								  <th>Email Address</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM customer";
								$result=mysqli_query($connect,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['customer_id']; ?></td>
								<td><?php echo $row['first_name']; ?></td>
								<td><?php echo $row['last_name']; ?></td>
								<td class="center">
									<a class="btn glyphicon glyphicon-ok" href="sd_inquery.php">
										<i class="halflings-icon white edit"></i>  
									</a>
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
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