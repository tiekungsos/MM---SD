<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_five();
?>
	<div class="row-fluid sortable">		
				 <div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Check inventory</h2>
					</div>
					<div class="box-content"  	> 		 
						<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
						  <thead>
							  <tr>
								  <th>Material ID</th>
								  <th>Description</th>
								  <th>Qty</th>
								  <th>Status</th>
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
								<td><?= $row['material_number'] ?></td>
								<td><?= $row['description'] ?></td>
								<td><?= $row['default_qty'] ?></td>
								<td><?php if($row['default_qty']==0){echo "<span style='color:#FF0000;'>Out of Stock</span>";} 
								else if($row['default_qty']<10){ echo "<span style='color: #FFA500;'>Low in stock</span>"; } 
								else{ echo "<span style='color: #228B22;'>Available</span>";} ?></td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
							 </label> 
						
				</div>
					</div>
			
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