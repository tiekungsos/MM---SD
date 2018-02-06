<?php
	$cus_id = $_GET['uID'];
	include("C:/xampp/htdocs/admin2/includes/connection.php");

	$sql ="SELECT * FROM customer where customer_id = '$cus_id'";
	$query = mysqli_query($connect,$sql);
	$result=mysqli_fetch_assoc($query);

	$num = mysqli_num_rows($query);

	$i = 0;
	while ($i < $num)
	{
		$firstName=$result['first_name'];
		$lastName=$result['last_name'];
		$gender=$result['gender'];
		$DOB=$result['DOB'];
		$house_number=$result['house_number'];
		$cusType=$result['customer_type_id'];
		$District=$result['district'];
		$Province=$result['province'];
		$post_code=$result['post_code'];
		$i++;
	}

?>
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
?>	
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Update User's Data</h2>
						<div class="box-icon">
							<a href="users.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="CUD/update_customer.php">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Firstname:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="firstName" id="focusedInput" type="text" placeholder="firstName" 
								  value="<?php echo $firstName; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Lastname:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="lastName" id="focusedInput" type="text" placeholder="lastName"
								  value="<?php echo $lastName; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Gender:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="gender" id="focusedInput" type="text" placeholder="gender"
								  value="<?php echo $gender; ?>">
								</div>
							  </div>
							  <!-- <div class="control-group">
								<label class="control-label" for="focusedInput">Date of Birth:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="DOB" id="focusedInput" type="text" placeholder="DOB"
								  value="<?php echo $DOB; ?>">
								</div>
							  </div> -->
							  <div class="control-group">
								<label class="control-label" for="focusedInput">House Number:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="house_number" id="focusedInput" type="text" placeholder="House Number"
								  value="<?php echo $house_number; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">District:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="district" id="focusedInput" type="text" placeholder="District"
								  value="<?php echo $District; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Province:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="province" id="focusedInput" type="text" placeholder="Province"
								  value="<?php echo $Province; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Post code:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="post_code" id="focusedInput" type="text" placeholder="Post Code"
								  value="<?php echo $post_code; ?>">
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary">Save Changes</button>
								<input type="hidden" name="cus_id" value="<?php echo $cus_id; ?>">
								<input type="hidden" name="customer_type" value="<?php echo $cusType; ?>">
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
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