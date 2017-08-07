<?php
include("db.php");

$start 	= $_REQUEST['iDisplayStart'];		//from where the table starts
$length = $_REQUEST['iDisplayLength'];		// length of table 
$sSearch = $_REQUEST['sSearch'];			// for search box

$col = $_REQUEST['iSortCol_0'];		//for sorting the column

$arr = array(0 => 'name'); 		// the column on which you apply sorting

$sort_by = $arr[$col];
$sort_type = $_REQUEST['sSortDir_0'];		// to tell about INC or DESC while sorting
	
$qry = "SELECT name, address, phone, email, product_name, price, quantity, mode_of_payment from bill_info where name LIKE '%".$sSearch."%' or address LIKE '%".$sSearch."%' or phone LIKE '%".$sSearch."%' or email LIKE '%".$sSearch."%'  or product_name LIKE '%".$sSearch."%'  or price LIKE '%".$sSearch."%'  or quantity LIKE '%".$sSearch."%'  or mode_of_payment LIKE '%".$sSearch."%'  ORDER BY ".$sort_by." ".$sort_type." LIMIT ".$start.", ".$length;
$res = mysqli_query($conn, $qry);
while($row = mysqli_fetch_assoc($res))
{
	$data[] = $row;
}

$qry = "select count(bill_id) as count from bill_info";
$res = mysqli_query($conn, $qry);

while($row =  mysqli_fetch_assoc($res))
{
	$iTotal = $row['count'];
}

$rec = array(
	'iTotalRecords' => $iTotal,				// entering total number of records in a table
	'iTotalDisplayRecords' => $iTotal,		// this is for pagination
	'aaData' => array()						// INITIALIZING  an array in which we enter the data of a table
);

$k=0;
if (isset($data) && is_array($data)) {

	foreach ($data as $item) {
		$rec['aaData'][$k] = array(
			'0' => $item['name'],
			'1' => $item['address'],
			'2' => $item['phone'],
			'3' => $item['email'],
			'4' => $item['product_name'],
			'5' => $item['price'],
			'6' => $item['quantity'],
			'7' => $item['mode_of_payment']
		);
		$k++;
	}
}

echo json_encode($rec);
?>