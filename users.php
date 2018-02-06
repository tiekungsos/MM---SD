<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_two();
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Customers</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Add Customer</button>
						<br>
						<br>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Customer number</th>
								  <th>Name</th>
								  <th>Customer type</th>
								  <th>Address</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM customer INNER JOIN customer_type USING(customer_type_id) ORDER BY first_name DESC";
								$result=mysqli_query($connect,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['customer_id']; ?></td>
								<td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
								<td><?php echo $row['customer_type_description']; ?></td>
								<td><?php echo $row['house_number'].' '.$row['district'].' '.$row['province']; ?></td>
								<td class="center">
									<a class="btn btn-info" href="edit_customer.php?uID=<?php echo $row['customer_id']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onclick="return confirmDel()" href="CUD/delete_customer.php?delID=<?php echo $row['customer_id'];?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

<form action="CUD/create_customer.php" method="post">
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
      </div>
      <div class="modal-body">
		  
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Person</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					
						</div>
					</div>
					<div class="box-content">

		   <div class="form-group">
  		First name: &nbsp;  &nbsp; 
  		<input type="text" class="form-control" name="firstName" id="first_name">
		</div>
		  
		  <div class="form-group">
  		Last name:  &nbsp;  &nbsp;  
  		<input type="text" class="form-control" name="lastName" id="last_name">
		</div>
		  

		  
		  <div class="form-group">
  		Gender :  &nbsp;  &nbsp;  
			  <label class="radio-inline"><input type="radio" name="optradio" value="male">Male </label>
  	 <label class="radio-inline"><input type="radio" name="optradio" value="female">Female </label>
		</div>
		  
		  <div class="form-group">
  <label for="sel1">Select Customer type:</label>
  <select class="form-control" name="customer_type" id="sel1">
    <option value="1">Gold</option>
    <option value="2">Silver</option>
    <option value="3">Normal</option>
  </select>
</div>
		  <!-- <div class="form-group">
  		Date of Birth:  &nbsp;  &nbsp;  
  		<input type="text" class="form-control" name="DOB" id="birth">
		</div> -->
		  
		  
      </div>
      
    </div>
  </div>
		  
		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Address</h2>
						<div class="box-icon">
						
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						
						</div>
					</div>
					<div class="box-content">

		   <div class="form-group">
  		House number: &nbsp;  &nbsp; 
  		<input type="text" class="form-control" name="house_number" id="House">
		</div>
		  
		  <div class="form-group">
  		District:  &nbsp;  &nbsp;  
  		<input type="text" class="form-control" name="District" id="District">
		</div>
		  

		  
		  <div class="form-group">
  		Province:  &nbsp;  &nbsp;  
  		<input type="text" class="form-control" name="Province" id="Province">
		</div>
		  
		  <div class="form-group">
  		Post Code:  &nbsp;  &nbsp;  
  		<input type="text" class="form-control" name="post_code" id="post">
		</div>
		
		  
		  
      </div>
      
    </div>
  </div>  
		  
</div>	
		<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button  type="button submit" class="btn btn-primary">Add Customer</button>
      </div>
	</div></div></div>	
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