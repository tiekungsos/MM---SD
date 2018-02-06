<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
		get_bread_five();
    //require_once("Script/sd.php");
?>

<div class="row-fluid sortable">		

			<p></p>
	<p></p>
<div class="box span12" style="margin-left: 0px;">
					<div class="box-header" data-original-title;>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Reorder Point</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content" id="content1" 	> 
					  
					   	
						<div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Required Data</h2>
					</div>
					<div class="box-content"> 
						<form action="cal_reorder_point.php" method="post">
						 <div class="form-group">
							 <br>
							 <label for="usr">Demand Rate : <input type="text" name="demand_rate" class="form-control"  >&nbsp;&nbsp;&nbsp;Unit per Day</label>  
							 <label for="usr">Lead Time : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lead_t" class="form-control" value=5 disabled>&nbsp;&nbsp;&nbsp;Day(s)</label>  
							 
							<input type=hidden name="lead_time" class="form-control" value=5 > 	
							 
							 <label for="usr">Safty Stock : &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="safty_stock" class="form-control"  >&nbsp;&nbsp;&nbsp;Unit</label>  
							 <button type="submit" onclick="showStuff('resutl-reorder')" class="btn btn-primary">Submit</button>
						</div>
						</form>
						<p></p>
						<p></p>
						
					
					</div>
						</div>

					</div>
    </div>
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