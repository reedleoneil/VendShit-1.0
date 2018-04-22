<?php include("config.php");?>

<h2 id="cIncome">
<span>&#8369;</span>
<?php
$results = $mysqli->query("SELECT * FROM income");
$obj = $results->fetch_object();
echo number_format($obj->income, 2);
?>
</h2>

<h2 id="lIncome">
<span>&#8369;</span>
<?php 
$results = $mysqli->query("SELECT * FROM collections ORDER BY collection_id DESC LIMIT 1");
$obj = $results->fetch_object();
echo number_format($obj->income, 2);
?>
</h2>

<h2 id="hIncome">
<span>&#8369;</span>
<?php 
$results = $mysqli->query("SELECT * FROM collections ORDER BY income DESC LIMIT 1");
$obj = $results->fetch_object();
echo number_format($obj->income, 2);
?>
</h2>

<h2 id="tIncome">
<span>&#8369;</span>
<?php 
$results = $mysqli->query("SELECT SUM(income) AS total_income FROM collections;");
$obj = $results->fetch_object();
echo number_format($obj->total_income, 2);
?>
</h2>