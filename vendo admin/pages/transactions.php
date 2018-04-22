<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transactions</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Vending Machine Admin 1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="products.php"><i class="fa fa-medkit fa-fw"></i> Products</a>
                        </li>
						<li>
                            <a href="transactions.php"><i class="fa fa-shopping-cart fa-fw"></i> Transactions</a>
                        </li>
						<li>
                            <a href="income.php"><i class="fa fa-money fa-fw"></i> Income</a>
                        </li>
						<li>
                            <a href="notifications.php"><i class="fa fa-bell"></i> Notifications</a>
                        </li>
						<li>
                            <a href="settings.php"><i class="fa fa-cogs fa-fw"></i> Settings</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Transactions</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Orders
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Brand Name</th>
                                            <th>Generic Name</th>
                                            <!--<th>Quantity</th>-->
                                            <th>Price</th>
					    <th>Transaction Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$results1 = $mysqli->query("SELECT * FROM orders");
if ($results1) { 
	while($obj1 = $results1->fetch_object()){
		echo "<tr>";
		echo "<td>".$obj1->order_id."</td>";
		$results2 = $mysqli->query("SELECT * FROM products WHERE product_id = '{$obj1->product_id}'");
		$obj2 = $results2->fetch_object();
		echo "<td>".$obj2->brand_name."</td>";
		echo "<td>".$obj2->generic_name."</td>";
		//echo "<td>".$obj1->quantity."</td>";
		//echo "<td>&#8369; ".strval(number_format($obj1->quantity * $obj2->price, 2))."</td>";
		echo "<td>&#8369; ".strval(number_format($obj2->price, 2))."</td>";
		$results3 = $mysqli->query("SELECT * FROM transactions WHERE transaction_id = '{$obj1->transaction_id}'");
		$obj3 = $results3->fetch_object();
		echo "<td>".$obj3->date_time."</td>";
		echo "</tr>";
    }    
}
?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				<div class="col-lg-4">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Details
                        </div>
                        <div class="panel-body">
                            <?php
								/*echo "Transactions: ";
								$results = $mysqli->query("SELECT COUNT(transaction_id) AS no_transcations FROM transactions;");
								$obj = $results->fetch_object();
								echo $obj->no_transcations;*/
								echo "Transactions: ";
								$results = $mysqli->query("SELECT COUNT(order_id) AS no_orders FROM orders;");
								$obj = $results->fetch_object();
								echo $obj->no_orders;
								$products = array();
								$total_orders_per_product = array();
								$r=0;
								$results = $mysqli->query("SELECT * FROM products WHERE deleted = '0'");
								if ($results) { 
									while($obj = $results->fetch_object()){
										$products[$r] = $obj->brand_name;
										echo "<br>&nbsp;&nbsp;&nbsp;-".$obj->brand_name.": ";
										//$results1 = $mysqli->query("SELECT SUM(quantity) AS TotalItemsOrdered FROM orders WHERE product_id = '{$obj->product_id}'");
										$results1 = $mysqli->query("SELECT COUNT(*) AS TotalItemsOrdered FROM orders WHERE product_id='{$obj->product_id}'");
										$obj1 = $results1->fetch_object();
										if($obj1->TotalItemsOrdered == null){
											$total_orders_per_product[$r] = 0;
											echo 0;
										}else{
											$total_orders_per_product[$r] = $obj1->TotalItemsOrdered;
											echo $obj1->TotalItemsOrdered;
										}
										$r++;
									}
								}
								/*echo "<br>Average Order/Transaction: ";
								$orders_per_transactions = array();
								$r=0;
								$results = $mysqli->query("SELECT * FROM transactions;");
								if ($results) { 
									while($obj = $results->fetch_object()){
										$results1 = $mysqli->query("SELECT COUNT(*) AS NumberOfOrders FROM orders WHERE transaction_id = '{$obj->transaction_id}'");
										$obj1 = $results1->fetch_object();
										$orders_per_transactions[$r] = $obj1->NumberOfOrders;
										$r++;
									}
								}
								echo number_format(array_sum($orders_per_transactions) / count($orders_per_transactions), 0);
								/*echo "<br>Average Item/Order: ";
								$results = $mysqli->query("SELECT AVG(quantity) AS avg_quantity FROM orders;");
								$obj = $results->fetch_object();
								echo number_format($obj->avg_quantity, 0);*/
							?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
				</div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
  
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
		$('#dataTables-example1').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
