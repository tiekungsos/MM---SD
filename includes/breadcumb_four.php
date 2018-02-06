<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.php">Home</a> 
			<i class="icon-angle-right"></i>
			<a href="#">SD</a>
			<i class="icon-angle-right"></i>
			<a href="#">SD</a>
			
			
			<?php
			
	 $pageName = basename($_SERVER['SCRIPT_NAME']);
		
			if( $pageName== "before_inq.php"){
				
				echo "Inquery";
			}
			
			if( $pageName== "sd_inquery.php"){
				
				echo "Inquery Create";
			}
			
			if( $pageName== "sd_inquery_display.php"){
				
				echo "Inquery Change & Display";
			}
			
			if( $pageName== "sd_qt.php"){
				
				echo "Quotation";
			}
			if( $pageName== "sd_qt_next.php"){
				
				echo "Quotation Create";
			}
			
			if( $pageName== "sd_qt_display.php"){
				
				echo "Quotation Change & Display";
			}
			
			if( $pageName== "sd_sale.php"){
				
				echo "Sale Order";
			}
			if( $pageName== "sd_sale_next.php"){
				
				echo "Sale Order Create";
			}
			if( $pageName== "sd_so_display.php"){
				
				echo "Sale Order Display";
			}
			if( $pageName== "sd_post.php"){
				
				echo "Post goods";
			}
			if( $pageName== "sd_invoice_pre.php"){
				
				echo "Invoice";
			}
			if( $pageName== "sd_invoice.php"){
				
				echo "Invoice Create";
			}if( $pageName== "sd_invoice_display.php"){
				
				echo "Invoice Display";
				
			}if( $pageName== "sd_docflow.php"){
				
				echo "Document Flow";
			}
			if( $pageName== "sd_history.php"){
				
				echo "History";
			}
			
			
			

			
?>
		</li>		
		
	</ul>
