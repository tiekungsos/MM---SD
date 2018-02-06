<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
?>
	<div class="row-fluid sortable">		
				 <div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Sale History</h2>
					</div>
					<div class="box-content"  	> 		 
						<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
						  <thead>
							  <tr>
								  <th>Invoice</th>
								  <th>Customer</th>
								  <th>Net value</th>
								  <th>Date Order</th>
								  <th>Date Payment</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM document INNER JOIN customer USING(customer_id) WHERE doc_type_id = '5'";
								$result=mysqli_query($connect,$sql); //rs.open sql,con

								$sql2 = "SELECT * FROM document INNER JOIN customer USING(customer_id) WHERE doc_type_id = '1'";
								$result2=mysqli_query($connect,$sql2);

							while ($row=mysqli_fetch_array($result))
							{ $row2=mysqli_fetch_array($result2); ?><!--open of while -->
							<tr>
								<td><?= $row['doc_id'] ?></td>
								<td><?= $row['first_name'].' '.$row['last_name'] ?></td>
								<td>$<?= number_format($row['net_price'],2) ?></td>
								<td><?= $row2['doc_date'] ?></td>
								<td><?= $row['billing_date'] ?></td>
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