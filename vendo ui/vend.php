<?php
include("config.php");

//telnet
function telnet($command)
{
	$host    = "127.0.0.1";
	$port    = 7777;
	$message = $command;
	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 0, 'usec' => 7777));
	socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, array('sec' => 0, 'usec' => 7777));
	// connect to server
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	usleep(100000);
	// send string to server
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	usleep(100000);
	// get server response
	if($command == 'q')
	{
		$result = trim(socket_read ($socket, 1024, PHP_NORMAL_READ)) or die("0");// die("Could not read server response\n");
		usleep(100000);
	}
	// close socket
	socket_close($socket);
}

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
	//exec('echo e > /dev/ttyUSB0');
	telnet('e');
	$price--;
}
//notification is in index.php

//notification
$results = $mysqli->query("SELECT * FROM products WHERE product_id='{$product_id}'");
$obj = $results->fetch_object();
$mysqli->query("INSERT INTO notifications (notification) VALUES('Dispensing Item: {$obj->brand_name}')");

//dispense
sleep(2);
//exec('echo '.$slot.' > /dev/ttyUSB0');
telnet($slot);

//notification
$mysqli->query("INSERT INTO notifications (notification) VALUES('Printing Receipt: Ok')");

//print receipt
/*
//   put code here for receipt
*/
//exec('echo pprinting > /dev/ttyUSB0');
telnet("f" . "Vending Machine\n");
telnet("f" . "-----------------\n");
telnet("f" . date("m-d-Y h:i:s A") . "\n"); 
telnet("f" . sprintf("%s     %u.00 php",$obj->brand_name,$obj->price) . "\n");
telnet("f" . "-----------------\n");

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

	//this code is for sms gate way, uncomment if you will use sms gateway
	//header("Location:http://192.168.2.5:9090/sendsms?phone=8888&text=INFO&password=");

	//this code is for gsm module 900a
	telnet("z" . "Critical stocks for " . $obj->brand_name . ". Stocks remaining: " . $obj->stock . ".");
}else{
	//notification
	$mysqli->query("INSERT INTO notifications (notification) VALUES('Checking Stock: Ok')");

}
?>
