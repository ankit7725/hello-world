<?php
	
	include("db.php");

	foreach ($_POST['product_name'] as $key => $value) {

		$sql = "INSERT INTO bill_info (name, address, phone, email, product_type, product_name, price, quantity, tax, vat, discount, mode_of_payment, status)
		VALUES ('".$_POST['name']."', '".$_POST['address']."', '".$_POST['phone']."', '".$_POST['email']."','".$_POST['product_type'][$key]."' , '".$_POST['product_name'][$key]."', '".$_POST['price'][$key]."', '".$_POST['quantity'][$key]."', '".$_POST['tax']."', '".$_POST['vat']."', '".$_POST['discount']."', '".$_POST['mode_of_payment']."', '0')";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	mysqli_close($conn);
?>