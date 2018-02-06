<?php 
require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_five();
	$demand_rate=$_POST['demand_rate'];
	$lead_time=$_POST['lead_time'];
	$safty_stock=$_POST['safty_stock'];
	$reorder=($demand_rate*$lead_time)+$safty_stock;

?>
 <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
	 
      </script>
      <script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart','line']});  
      </script>


<div class="row-fluid sortable">		

			<p></p>
	<p></p>
<div class="box span6" style="margin-left: 0px;">
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
						<h2><i class="icon-file white user"></i><span class="break"></span>Result</h2>
					</div>
					<div class="box-content" > 
						<table class="table table-bordered" style="width: 60%;">
							<thead>
								<tr class="info">
									<th></th>
									<th>Product</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><b>Demand Rate</b></td>
									<td><?= $demand_rate ?></td>
								</tr>
								<tr>
									<td><b>Supplier Lead Time</b></td>
									<td><?= $lead_time ?></td>
								</tr>
								<tr>
									<td><b>Safty Stock</b></td>
									<td><?= $safty_stock ?></td>
								</tr>
								<tr class="info">
									<td><b>Reorder Point Unit</b></td>
									<td><b><?= $reorder ?></b></td>
								</tr>

							</tbody>
						</table>
						<p></p>
						<p></p>
						
					
					</div>
						</div>

					</div>
    </div>
	
	<script>
		
var number =<?= $reorder?>;
var demand =<?= $demand_rate?>;

var stock = number + demand*6;
var safty_stock = <?= $safty_stock?>;	
var stock_cal = (demand*6)/6;	
var lead_time = <?= $lead_time?>;

var stock1 = stock - stock_cal ;
var stock2 = stock1	- stock_cal ;		
var stock3 = stock2	- stock_cal ;	
var stock4 = stock3	- stock_cal ;	
var stock5 = stock4	- stock_cal ;	
var stock6 = number - demand ;
var stock7 = stock6	- demand ;		
var stock8 = stock7	- demand ;	
var stock9 = stock8	- demand ;	
var stock10 = stock9 - demand ;	
		
var stock_name = 'stock';
var Reorder_name = 'Reorder';		
var Safty_name = 'Safty stock';		

	google.charts.load('current', {
  callback: function () {
    var data = google.visualization.arrayToDataTable
            ([['Day', 'Stock', {'type': 'string', 'role': 'style'}],
              [stock_name, stock, stock_name],
              [2, stock1, null],
              [3, stock2, null],
              [4, stock3, null],
              [5, stock4, null],
              [6, stock5, null],
              [Reorder_name, number, 'point { size: 18; shape-type: star; fill-color: #a52714; }'],
	          [8, stock6, null],
              [9, stock7, null],
              [10, stock8, null],
              [11, stock9, null],
			  [Safty_name, safty_stock, 'point { size: 18; shape-type: star; fill-color: #a52458; }'],
		      [13,  stock, stock_name],
//			  [9, null, null],
//			  [10, null, null],
//			  [11, 3, null],
//			  [12, 3, null],
//			  [13, 3, null],
			  
        ]);
//    var options = {
//      title:'Reorder point ',
//      width:500,
//      height:300
//    };
	   var options = {
		  title:'Reorder Point',
          legend: 'none',
          hAxis: { minValue: 0, maxValue: 20 },
          curveType: 'function',
          pointSize: 10,
          dataOpacity: 0.3,
		   width:600,
		   	height:300
        };

    for (var i = 0; i < 1; i++) {
      var container = document.getElementById('line-charts').appendChild(document.createElement('div'));
      var chart = new google.visualization.LineChart(container);
      chart.draw(data, options);
    }
  },
  packages: ['corechart']
});
	</script>
	
	
		
	<div class="box span6">
					<div class="box-header" data-original-title;>
						<h2><i class="fa fa-area-chart"></i><span class="break"></span>reorder point </h2>
					</div>
					<div class="box-content"  	> 
				<ul id="line-charts"></ul>
						
						
		</div>
		
		
	</div>
  </div>

<?php
	get_footer();
?>		




