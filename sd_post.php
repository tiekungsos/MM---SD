<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
    //require_once("Script/sd.php");
?>

<div class="row-fluid sortable">		

	<div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Post Goods </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content" id="content1" 	> 
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Sale order</th>
								  <th>Customer id</th>
								  <th>Document date</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");
								// $sql2 = "SELECT doc_id,SUM(quantity) as total_qty
								// 		FROM inq_has_mat INNER JOIN document USING(doc_id)
								// 		WHERE doc_type_id = '1'
								// 		GROUP BY doc_id";
								$sql2="SELECT * FROM document WHERE doc_type_id ='3'";
								$result2=mysqli_query($connect,$sql2); //rs.open sql,con

							while ($row=mysqli_fetch_array($result2))
							{ ?><!--open of while -->
							<tr>
								<?php
										$status_doc=$row['doc_id'];
										$sql3="SELECT * FROM document WHERE doc_id = '$status_doc'";
										$result3=mysqli_query($connect,$sql3); //rs.open sql,con
										$row3=mysqli_fetch_array($result3)

									?>
								<td><?= $row['doc_id'] ?></td>
								<td><?= $row['customer_id'] ?></td>
								<td><?= $row['doc_date'] ?></td>
								<td>
									<?php if($row3['status_gi']==1){ echo 'Posted'; } 
									else { echo 'Not yet'; }?>
									<!--  -->
								</td>
								<td class="center">
									<a class="btn btn-info" href="sd_post_check.php?uID=<?php echo $row['ref_doc']; ?>">
										Check Material
									</a>
									<!-- <?php if($row3['status_gi']==1){ echo 'disabled'; } ?> -->

									<!-- <input type="button"  onclick="return confirmDel()" value="Post Goods" class="btn btn-info" <?php if($row3['status_gi']==1){ echo 'disabled'; } ?> href="CUD/commit_gi.php?comID=<?= $row['ref_doc'] ?>" > -->
									<span <?php if($row3['status_gi']==1){ echo 'hidden'; } ?> >
									<a type="button"  onclick="return confirmDel()"  class="btn btn-info" <?php if($row3['status_gi']==1){ echo 'disabled'; } ?> href="CUD/commit_gi.php?comID=<?= $row['ref_doc'] ?>" >Post Goods</a></span>
									
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table> 
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