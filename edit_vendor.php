<?php
	$vendor_id = $_GET['uID'];
	include("C:/xampp/htdocs/admin2/includes/connection.php");

	$sql ="SELECT * FROM vendor where vendor_id = '$vendor_id'";
	$query = mysqli_query($connect,$sql);
	$result=mysqli_fetch_assoc($query);

	$num = mysqli_num_rows($query);

	$i = 0;
	while ($i < $num)
	{
		$vendor_id=$result['vendor_id'];
		$company_name=$result['company_name'];
		$house_number=$result['v_house_number'];
		$district=$result['v_district'];
		$tel=$result['tel'];
		$email=$result['email'];
		$province=$result['v_province'];
		$post_code=$result['v_post_code'];
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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Update Supplier's Data</h2>
						<div class="box-icon">
							<a href="users.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="CUD/update_vendor.php">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Company Name:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="company_name" id="focusedInput" type="text" placeholder="company name" 
								  value="<?php echo $company_name; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Telephone Number:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="tel" id="focusedInput" type="text" placeholder="telephone number"
								  value="<?php echo $tel; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">E-mail:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="email" id="focusedInput" type="text" placeholder="email"
								  value="<?php echo $email; ?>">
								</div>
							  </div>

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
								  value="<?php echo $district; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Province:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="province" id="focusedInput" type="text" placeholder="Province"
								  value="<?php echo $province; ?>">
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
								<input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>">
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