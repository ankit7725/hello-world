<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bill System</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="all">
	<script src="js/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$(document).on('click', '.add_more', function(){
				var dynamicHtml = '<tr><td>Product Type</td><td><select id="product_type" style="width:85%;" name="product_type[]"><option disabled selected>--Select--</option><option value="Electronic">Electronic</option><option value="Phone">Phone</option></select></td></tr><tr><td>Product Name</td><td><input type="text" id="product_name" name="product_name[]"/></tr><tr><td>Price</td><td><input type="text" id="price" name="price[]" /></tr><tr><td>Quantity</td><td><input type="text" id="quantity" name="quantity[]" /> <a href="javascript:void(0);" class="add_more"><img src="images/icon_plus.png"></a> <a href="javascript:void(0);" class="remove"><img src="images/icon_minus.png"></a></td></tr>';
				$(this).parent().parent().after(dynamicHtml);
			});

			$(document).on('click', '.remove', function(){
				$(this).parent().parent().prev().prev().prev().remove();
				$(this).parent().parent().prev().prev().remove();
				$(this).parent().parent().prev().remove();
				$(this).parent().parent().remove();
			});

			$("#bill_btn").on("click",function(){
				var data = $("#bill_form").serialize();
				//alert("working");
				$.ajax({
		            method: "POST",
		            url: "bill_db.php",
		            data: data,
		            success: function(response){
		                var url = "http://localhost/BillingSystem/print_bill.php";
		                myWindow = window.open(url, "_blank");

		                window.setTimeout(function() {
							var update_flag = 1;
			                $.ajax({
					            method: "POST",
					            url: "bill_update.php",
					            data : {
					                update_flag : update_flag
					            },
					            success: function(output){
					            	window.location.href = "bill.php";
					            }
					        });
						}, 5000);

		            }
		        });
	        });
        });
	</script>
</head>
<body style="color:#C70000; ">
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
            <div class="form_inner">
            	<form id="bill_form">
					<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td width="30%" valign="top">Name</td>
							<td width="70%" valign="top">
								<input type="text" id="name" name="name" placeholder="Name"></input>
							</td>
						</tr>
						<tr>
							<td valign="top">
								Billing Address
							</td>
							<td valign="top">
								<textarea rows="3" cols="6" id="address" name="address" placeholder="Billing Address"></textarea>
							</td>
						</tr>
						<tr>
							<td valign="top">
								Phone Number
							</td>
							<td valign="top">
								<input type="text" id="phone" name="phone" placeholder="Phone Number"></input>
							</td>
						</tr>
						<tr>
							<td valign="top">
								Email
							</td>
							<td valign="top">
								<input type="text" id="email" name="email" placeholder="Email Address"></input>
							</td>
						</tr>
						<tr>
							<td valign="top">
								Product Type
							</td>
							<td valign="top">
								<select id="product_type" style="width:85%;" name="product_type[]">
									<option disabled selected>--Select--</option>
									<option value="Electronic">Electronic</option>
									<option value="Phone">Phone</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">
								Product Name
							</td>
							<td valign="top">
								<input type="text" id="product_name" name="product_name[]" placeholder="Product Name"></input>
							</td>
						</tr>
						<tr>
							<td valign="top">
								Price
							</td>
							<td valign="top">
								<input type="text" id="price" name="price[]" placeholder="Price"></input>
							</td>
						</tr>
						<tr>
							<td valign="top">
								Quantity
							</td>
							<td valign="top">
								<input type="text" id="quantity" name="quantity[]" placeholder="Quantity"></input>
								<a href="javascript:void(0);" class="add_more"><img src="images/icon_plus.png"></a>
							</td>
						</tr>
						
						<tr>
							<td valign="top">
								Mode Of Payment
							</td>
							<td valign="top">
								<input type="radio" name="mode_of_payment" value="cash" checked>Cash&nbsp;
								<input type="radio" name="mode_of_payment" value="card">Card&nbsp;
								<input type="radio" name="mode_of_payment" value="cheque">Cheque&nbsp;
								<input type="radio" name="mode_of_payment" value="online">Online
							</td>
						</tr>
						<tr>
							<td valign="top">
								New Input Box
							</td>
							<td valign="top">
								<input type="text">
							</td>
						</tr>
						
					</table>
				</form>
				<div style="text-align: center;"><button id="bill_btn">Generate Bill</button></div>
				<!-- <div style="position:absolute; top:0; right:0; padding: 20px 15px 10px 10px;">
					<a href="logout.php"><img src="images/logout.png" width="100" height="80"></a>
				</div> -->
			</div>
		</div>
	</div>
</div>
</body>
</html>
