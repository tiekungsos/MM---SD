<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.php">Home</a> 
			<i class="icon-angle-right"></i>
			<a href="">MM</a>
			<i class="icon-angle-right"></i>
			<a href="#">MM</a>
			
			
			<?php
			
	 $pageName = basename($_SERVER['SCRIPT_NAME']);
		
			if( $pageName== "mm_create_mat.php"){
				echo "Create Materials ";
			}
			if( $pageName== "mm_checkstore.php"){
				echo "Check Store ";
			}
			if( $pageName== "mm_before_rfq.php"){
				echo "RFQ ";
			}
			if( $pageName== "mm_request.php"){
				echo "Create RFQ ";
			}
			if( $pageName== "mm_rfq_display.php"){
				echo "Display RFQ ";
			}
			if( $pageName== "mm_before_qt.php"){
				echo "Quotation ";
			}
			
			if( $pageName== "mm_qt_next.php"){
				echo "Create Quotation ";
			}
			if( $pageName== "mm_qt_display.php"){
				echo "Display Quotation ";
			}if( $pageName== "mm_before_po.php"){
				echo "PO ";
			}if( $pageName== "mm_po_next.php"){
				echo "Create PO ";
			}if( $pageName== "mm_po_display.php"){
				echo "Display PO ";
			}
			if( $pageName== "mm_before_gr.php"){
				echo "Goods Receipt ";
			}if( $pageName== "mm_gr_next.php"){
				echo "Create GR ";
			}if( $pageName== "mm_gr_display.php"){
				echo "Display PO ";
			}
			
			if( $pageName== "mm_invoice_pre.php"){
				echo "Invoice ";
			}
			if( $pageName== "mm_inv_next.php"){
				echo "Create Invoice ";
			}
			if( $pageName== "mm_inv_mm_display.php"){
				echo "Display Invoice ";
			}
			if( $pageName== "mm_reorderpoint.php"){
				echo "Reorder Point ";
			}
			if( $pageName== "cal_reorder_point.php"){
				echo "Reorder Point Cal ";
			}
			
			
			

			
?>
		</li>		
		
	</ul>
