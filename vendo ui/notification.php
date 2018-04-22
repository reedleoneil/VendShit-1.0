<?php
include("config.php");
$notification = $_POST['notification'];
$mysqli->query("INSERT INTO notifications (notification) VALUES('{$notification}')");
echo($notification);
?>
