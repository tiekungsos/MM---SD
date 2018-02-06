<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread();
	if(!empty($_GET))
	{
		$id=$_GET['uID'];
	}
	$so_id="SO$id";
?>
	<div class="row-fluid sortable">		
				 <div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Check Material</h2>
					</div>
					<div class="box-content"  	> 
					<?php 
						include("includes/connection.php");
						$sql3 = "select * from document where doc_id = '$so_id'";
						$result3=mysqli_query($connect,$sql3);
						$row3=mysqli_fetch_array($result3); 
					?>
						<p></p>
						 <label for="usr">
						<h2>Sale order number : <input type="text" value="<?= $so_id ?>" disabled></h2>
						<h3>Document Date : &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" value="<?= $row3['doc_date'] ?>" disabled></h3>
						<p> </p>
						<p> </p>
						<p> </p>
						<p> </p>
						</label>
						<p></p>
						<p></p>
						 <div class="form-group">
							 <h2>Item Overview</h2>
							 
							<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
						  <thead>
							  <tr>
								  <th></th>
								  <th>Material number</th>
								  <th>Description</th>
								  <th>Quantity</th>
								  <th>Unit</th>
								  <th>Available Qty</th>
								  <th>Unit</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");
								$sql4 = "select * from inq_has_mat INNER JOIN material USING(material_number) where doc_id = '$id'";
								$result4=mysqli_query($connect,$sql4);

							while ($row4=mysqli_fetch_array($result4))
							{ ?><!--open of while -->
							<tr>
								<td></td>
								<td><?= $row4['material_number']; ?></td>
								<td><?= $row4['description']; ?></td>
								<td><?= $row4['quantity']; ?></td>
								<td><?= $row4['unit_type']; ?></td>

								<td><?= $row4['default_qty']; ?></td>
								<td>EA</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
							 </label> 
							 <a href="sd_post.php" class="btn btn-danger" role="button">Back</a>
						</div>
						
						
				</div>
					</div>
			
			</div><!--/row-->
<?php
	get_footer();
?>		
