<?php
include("config.php");

//POST
$slot = $_POST['slot'];
$price = $_POST['price'];
$product_id = $_POST['product_id'];

//transaction
$mysqli->query("INSERT INTO transactions (transaction_id) VALUES('')");
$results = $mysqli->query("SELECT MAX(transaction_id) AS transaction FROM transactions");
$obj = $results->fetch_object();
//echo $obj->transaction; //debug	
$mysqli->query("INSERT INTO orders VALUES('','{$product_id}','1','{$obj->transaction}')");
//notification
$mysqli->query("INSERT INTO notifications (notification) VALUES('New Transaction: {$obj->transaction}')");

//income
$results = $mysqli->query("UPDATE income SET income=income+{$price} WHERE income_id='1'");
//notification
$results = $mysqli->query("SELECT * FROM income WHERE income_id='1'");
$obj = $results->fetch_object();
$mysqli->query("INSERT INTO notifications (notification) VALUES('Updating Income: &#8369; {$obj->income}.00')");

//stocks
$results = $mysqli->query("UPDATE products SET stock=stock-1 WHERE product_id='$product_id'");
//notification
$results = $mysqli->query("SELECT * FROM products WHERE product_id='{$product_id}'");
$obj = $results->fetch_object();
$mysqli->query("INSERT INTO notifications (notification) VALUES('Updating Stock: {$obj->stock}')");

//credit
while($price != 0){
	exec('echo e > /dev/ttyUSB0');
	$price--;
}
//notification is in index.php

//notification
$results = $mysqli->query("SELECT * FROM products WHERE product_id='{$product_id}'");
$obj = $results->fetch_object();
$mysqli->query("INSERT INTO notifications (notification) VALUES('Dispensing Item: {$obj->brand_name}')");

//dispense
sleep(2);
exec('echo '.$slot.' > /dev/ttyUSB0');

//notification
$mysqli->query("INSERT INTO notifications (notification) VALUES('Printing Receipt: Ok')");

//print receipt
/*
//   put code here for receipt
*/
//exec('echo pprinting > /dev/ttyUSB0');

//check stock
$results = $mysqli->query("SELECT * FROM settings WHERE setting='stocks_critical_level'");
$obj = $results->fetch_object();
$critical_level = $obj->value;
$results = $mysqli->query("SELECT * FROM products WHERE product_id='{$product_id}'");
$obj = $results->fetch_object();
if($obj->stock <= $critical_level){
	//notification
	$mysqli->query("INSERT INTO notifications (notification) VALUES('Checking Stock: Low')");
	$mysqli->query("INSERT INTO notifications (notification) VALUES('Alert: Sending SMS')");
	//sms
	header("Location:http://192.168.2.5:9090/sendsms?phone=8888&text=INFO&password=");
}else{
	//notification
	$mysqli->query("INSERT INTO notifications (notification) VALUES('Checking Stock: Ok')");

}
?>
