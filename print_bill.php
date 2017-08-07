<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Bill</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        window.print();
    });
</script>
</head>
<body>	

    <?php
        include_once('db.php');

        $product_name = array();
        $price = array();
        $quantity = array();
        $final_price = array();
        $product_type = array();
        // $vat_amt = array();
        // $total = array();

        $sql = "SELECT * FROM bill_info WHERE status='0'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {

                $bill_id = $row['bill_id'];
                $name = $row['name'];
                $address = $row['address'];
                $phone = $row['phone'];
                $email = $row['email'];
                array_push($product_type, $row['product_type']);
                array_push($product_name, $row['product_name']);
                array_push($price, $row['price']);
                array_push($quantity, $row['quantity']);
                $final_price1 = $row['price']*$row['quantity'];
                array_push($final_price, $final_price1); 
                
                $mode_of_payment = $row['mode_of_payment'];
            }
        }
        // else{

        // }
    ?>
	<div class="outerdiv">
    	<div class="innerdiv">
				<table cellpadding="10" cellspacing="0" width="100%" border="1">
                	<tr>
                    	<td valign="top" width="50%" align="center"></td><td valign="top" width="50%" align="center">Orignal</td>
                	</tr>
                    
                    <tr>
                    	<td valign="top" width="50%">
                        	<table cellpadding="10" cellspacing="0" width="100%" border="1">
                                <tr>
                                    <td valign="top" width="35%">Customer Name</td>
                                    <td valign="top" width="65%"><?php echo $name; ?></td>
                                </tr>
                                
                                <tr>
                                    <td valign="top" width="35%">Address</td>
                                    <td valign="top" width="65%"><?php echo $address; ?></td>
                                </tr>
                                
                                <tr>
                                    <td valign="top" width="35%">Email</td>
                                    <td valign="top" width="65%"><?php echo $email; ?></td>
                                </tr>
                                
                                <tr>
                                    <td valign="top" width="35%">Contact No</td>
                                    <td valign="top" width="65%"><?php echo $phone; ?></td>
                                </tr>
                            </table>
                        </td>
                        
                        <td valign="top" width="50%">
                        	<table cellpadding="10" cellspacing="0" width="100%" border="1">
                                <table cellpadding="10" cellspacing="0" width="100%" border="1">
                                <tr>
                                    <td valign="top"><h2>DEEPAK TRADING CO. </h2>Shop No. 5-6, Sector-82, Opp. St. Mary School,<br />Tigaon Road, Greater Faridabad</td>
                                </tr>
                                
                                <tr>
                                    <td valign="top"><strong>Ph </strong> :0129-4323799, 9910817898</td>
                                </tr> 
                                
                                <tr>
                                    <td valign="top"><strong>E-mail </strong> : dtc.dt2017@gmail.com</td>
                                </tr>  
                                
                                <tr>
                                	<td valign="top">
                                    	<table cellpadding="0" cellspacing="0" width="100%" border="0">
                                    		<tr>
                                            	<td valign="top" width="30%"><strong>Tin No :</strong></td>
                                                <td valign="top" width="70%" >45467768787</td>
                                            </tr>
                                            
                                            <tr>
                                            	<td valign="top" width="30%"><strong>CST No :</strong></td>
                                                <td valign="top" width="70%" >45467768787</td>
                                            </tr>
                                            
                                            <tr>
                                            	<td valign="top" width="30%"><strong>Services Tax No :</strong></td>
                                                <td valign="top" width="70%" >45467768787</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr> 
                                
                                <tr>
                                	<td valign="top">
                                    	<table cellpadding="0" cellspacing="0" width="100%" border="0">
                                    		<tr>
                                            	<td valign="top" width="50%"><strong>Invoice No :</strong>IN-17-18-<?php echo $bill_id; ?></td>
                                                <td valign="top" width="50%"><strong>Cust Ref No :</strong> CRN-0<?php echo $bill_id; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr>
                                	<td valign="top">
                                    	<table cellpadding="0" cellspacing="0" width="100%" border="0">
                                    		<tr>
                                            	<td valign="top" width="50%"><strong>Date :</strong> <?php echo date("d/m/Y"); ?></td>
                                                <td valign="top" width="50%"><strong>Time :</strong> <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i A"); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr> 
                                
                            </table>
                        </td>
                    
                    </tr>
                </table><br /><br />
                
                <center><h2>Retail Invoice/Cash Memo/Bill/Tax Invoice</h2></center>
                
                <table cellpadding="10" cellspacing="0" width="100%" border="1">
                	<tr>
                    	<td valign="top" align="center"><strong>S No</strong></td>
                        <td valign="top" align="center"><strong>Product Name</strong></td>
                        <!-- <td valign="top" align="center"><strong>Net Price</strong></td> -->
                        <td valign="top" align="center"><strong>Quantity</strong></td>
                        <td valign="top" align="center"><strong>Price</strong></td>
                        <td valign="top" align="center"><strong>VAT %</strong></td>
                        <td valign="top" align="center"><strong>VAT Amt.&nbsp;&nbsp;&nbsp;&nbsp;Schg.</strong></td>
                        <!-- <td valign="top" align="center"><strong>VAT %</strong></td>
                        <td valign="top" align="center"><strong>Vat Amount</strong></td> -->
                        <td valign="top" align="center"><strong>Total</strong></td>
                    </tr>
                    <?php 
                        $total = array();
                        $cnt=1;foreach ($product_name as $product_name_key => $product_name_value) { ?>
                        <tr>
                            <td valign="top" align="center"><strong><?php echo $cnt; ?></strong></td>
                            <td valign="top" align="center"><strong><?php echo $product_name_value; ?></strong></td>
                            <!-- <td valign="top" align="center"><strong><?php print_r($price[$product_name_key]); ?></strong></td> -->
                            <td valign="top" align="center"><strong><?php print_r($quantity[$product_name_key]); ?></strong></td>
                            

                            <?php 
                                $amt = $final_price[$product_name_key];
                                if($product_type[$product_name_key] == "Electronic"){
                                    $vat = '13.125%';
                                    $tax = '0.5%';
                                    $amt_divided = 113.125;
                                    $amt_without_vat1 = $amt*100/$amt_divided;
                                    $amt_without_vat = round($amt_without_vat1,2);
                                    $vat_amt = (13.125/100)*$amt_without_vat;
                                    $tax_amt = 0;
                                } 
                                else if($product_type[$product_name_key] == "Phone"){
                                    if($price[$product_name_key] <= 10000){
                                        $vat = '5.0%';
                                        $tax = '5.0%';
                                        $amt_divided = 105.25;
                                        $amt_without_vat1 = $amt*100/$amt_divided;
                                        $amt_without_vat = round($amt_without_vat1,2);
                                        $vat_amt = (5/100)*$amt_without_vat;
                                        $tax_amt = (5/100)*$vat_amt;
                                    }
                                    else{
                                        $vat = '8.0%';
                                        $tax = '5.0%';
                                        $amt_divided = 108.4;
                                        $amt_without_vat1 = $amt*100/$amt_divided;
                                        $amt_without_vat = round($amt_without_vat1,2);
                                        $vat_amt = (8/100)*$amt_without_vat;
                                        $tax_amt = (5/100)*$vat_amt;
                                    }
                                } 
                                 
                                array_push($total, $amt); 
                            ?>

                            <td valign="top" align="center"><strong><?php print_r($amt_without_vat); ?></strong></td>
                            
                            <td valign="top" align="center"><strong><?php echo $vat; ?></strong></td>
                            <td valign="top" align="center"><strong><?php echo round($vat_amt,2); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo round($tax_amt,2); ?></strong></td>
                            <td valign="top" align="center"><strong><?php echo round($amt,2); ?></strong></td>
                        </tr>
                    <?php $cnt++; } ?>

                </table>
                
                <div class="table_right">
                	<table cellpadding="10" cellspacing="0" width="100%" border="1">
                    	<tr>
                            <td valign="top" width="45%"><strong>Total Amount</strong></td>
                            <td valign="top" width="55%"><?php $total_sum = array_sum($total); $f_total_sum=number_format($total_sum); print_r($f_total_sum); ?> INR</td>
                    	</tr>
                    </table>
                </div>
                
                <?php
                    $number = array_sum($total);
                   $no = round($number);
                   $point = round($number - $no, 2) * 100;
                   $hundred = null;
                   $digits_1 = strlen($no);
                   $i = 0;
                   $str = array();
                   $words = array('0' => '', '1' => 'one', '2' => 'two',
                    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                    '7' => 'seven', '8' => 'eight', '9' => 'nine',
                    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                    '13' => 'thirteen', '14' => 'fourteen',
                    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                    '60' => 'sixty', '70' => 'seventy',
                    '80' => 'eighty', '90' => 'ninety');
                   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                   while ($i < $digits_1) {
                     $divider = ($i == 2) ? 10 : 100;
                     $number = floor($no % $divider);
                     $no = floor($no / $divider);
                     $i += ($divider == 10) ? 1 : 2;
                     if ($number) {
                        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                        $str [] = ($number < 21) ? $words[$number] .
                            " " . $digits[$counter] . $plural . " " . $hundred
                            :
                            $words[floor($number / 10) * 10]
                            . " " . $words[$number % 10] . " "
                            . $digits[$counter] . $plural . " " . $hundred;
                     } else $str[] = null;
                  }
                  $str = array_reverse($str);
                  $result = implode('', $str);
                  // $points = ($point) ?
                  //   "." . $words[$point / 10] . " " . 
                  //         $words[$point = $point % 10] : '';
                  // echo $result . "Rupees  " . $points . " Paise";
                ?>

                <div class="table_left">
                	<strong>Amount in Words : <?php echo $result; ?></strong><br /><br />
                	<table cellpadding="10" cellspacing="0" width="100%" border="1">
                    	<tr>
                            <td valign="top" width="100%" colspan="2"><h2>Payment Details</h2></td>
                    	</tr>
                        <?php if($mode_of_payment == 'cash'){ ?>
                        <tr>
                            <td valign="top" width="30%"><strong>Cash Amount :</strong></td>
                            <td valign="top" width="70%"><?php echo $f_total_sum; ?> INR</td>
                    	</tr>
                        <?php } else{ ?>
                        <tr>
                            <td valign="top" width="30%"><strong>Cash Amount :</strong></td>
                            <td valign="top" width="70%">0.00</td>
                        </tr>
                        <?php  } ?>

                        <?php if($mode_of_payment == 'card'){ ?>
                        <tr>
                            <td valign="top" width="30%"><strong>Card Amount :</strong></td>
                            <td valign="top" width="70%"><?php echo $f_total_sum; ?> INR</td>
                        </tr>
                        <?php } else{ ?>
                        <tr>
                            <td valign="top" width="30%"><strong>Card Amount :</strong></td>
                            <td valign="top" width="70%">0.00</td>
                        </tr>
                        <?php  } ?>

                        <?php if($mode_of_payment == 'cheque'){ ?>
                        <tr>
                            <td valign="top" width="30%"><strong>Cheque Amount :</strong></td>
                            <td valign="top" width="70%"><?php echo $f_total_sum; ?> INR</td>
                        </tr>
                        <?php } else{ ?>
                        <tr>
                            <td valign="top" width="30%"><strong>Cheque Amount :</strong></td>
                            <td valign="top" width="70%">0.00</td>
                        </tr>
                        <?php  } ?>

                        <?php if($mode_of_payment == 'online'){ ?>
                        <tr>
                            <td valign="top" width="30%"><strong>Online Amount :</strong></td>
                            <td valign="top" width="70%"><?php echo $f_total_sum; ?> INR</td>
                        </tr>
                        <?php } else{ ?>
                        <tr>
                            <td valign="top" width="30%"><strong>Online Amount :</strong></td>
                            <td valign="top" width="70%">0.00</td>
                        </tr>
                        <?php  } ?>
                    </table>
                    
                    <table cellpadding="10" cellspacing="0" width="100%" border="0">
                        <tr>
                            <td valign="top" width="30%"><strong>Mark/Reference :</strong></td>
                            <td valign="top" width="70%">Discount percentage deviates from discount total due to rounding*</td>
                    	</tr>
                    </table>
                </div>
  		</div> 
 	</div>
	
	
</body>
</html>

