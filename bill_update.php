<?php
	include("db.php");
	if (isset($_POST["update_flag"]) &&  !empty($_POST["update_flag"])){
		$sql = "UPDATE bill_info SET status='1'";

		if (mysqli_query($conn, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
?>