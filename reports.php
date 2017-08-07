<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bill System</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="all">
	<script src="js/jquery.min.js"></script>
		<link href="css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
		<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="css/jquery.dataTables_themeroller.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
		
		<script type="text/javascript" language="javascript" class="init">
		$(document).ready(function() {
			$('#data_table').dataTable({
				"sServerMethod": "POST", 
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "report_data.php",
			});

			// $('#data_table_select').change( function() { 
	  		// t.fnFilter( $(this).val() );
	  		//      });

		});
		</script>
		
		<style>
		.odd{
			background-color: #EAEAEA !important;
		}
		.even{
			background-color: #a09b9d !important;
		}
		</style>
	</head>
	<body>
	<body>
<?php

if(empty($_SESSION['login_user']))
{
    header('Location: index.php');
}
?>
	<div class="black">
 	<div class="outerdiv">
		<div class="innerdiv">
        	<div class="logo_left"><a href="#"><img src="images/logo_sony.png"></a></div>
            <div class="logo_right"><a href="#"><img src="images/logo_apple.png"></a></div>
        </div>
    </div>    
</div>
<div class="outerdiv">
	<div class="innerdiv">
    	<div class="content_panel">
            <h1>Deepak Trading Co.</h1>
            <div class="right_button">
            	<a href="bill.php"><img src="images/bill.png"></a><a href="reports.php"><img src="images/report-3-xxl.png"></a><a href="logout.php"><img src="images/logout.png"></a> 
           	</div>
	<div style="width:100%; margin:0 auto; padding-top: 140px;">
	
	<table id="data_table">
		<thead>
			<tr>
				<th style="width:10%;">Name</th>
				<th style="width:20%;">Billing Address</th>
				<th style="width:10%;">Phone Number</th>
				<th style="width:10%;">Email</th>
				<th style="width:10%;">Product Name</th>
				<th style="width:10%;">Price</th>
				<th style="width:10%;">Quantity</th>
				<th style="width:10%;">Mode Of Payment</th>
			</tr>
		</thead>
	</table>
	</div>
	</div>
	</div>
	</div>
	</body>
	
</html>