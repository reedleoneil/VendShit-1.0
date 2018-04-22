<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-right">
										<div id="cIncome_Div">
											<!--dynamic-->
										</div>
                                    <div>Current Income</div>
                                </div>
                            </div>
                        </div>
                        <a href="income.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-right">
										<div id="lIncome_Div">
											<!--dynamic-->
										</div>
                                    <div>Last Income</div>
                                </div>
                            </div>
                        </div>
                        <a href="income.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-right">
										<div id="hIncome_Div">
											<!--Dynamic-->
										</div>
                                    <div>Highest Income</div>
                                </div>
                            </div>
                        </div>
                        <a href="income.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-right">
										<div id="tIncome_Div">
											<!--Dynamic-->
										</div>
                                    <div>Total Income</div>
                                </div>
                            </div>
                        </div>
                        <a href="income.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
						<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-shopping-cart fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Date and Time</th>
                                                <th>Product</th>
                                                <!--<th>Quantity</th>-->
						<th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tPanel">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="transactions.php">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group" id="nPanel">
							<!--
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
								-->
                            </div>
                            <!-- /.list-group -->
                            <div class="text-right">
                                    <a href="notifications.php">View All Notifications <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- asdfasdfasdf -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-pie-chart fa-fw"></i> Sales
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <a href="products.php" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
					<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Stocks
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                            <a href="products.php" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    
	<!--Morris Data
	<script src="../js/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<!--Dynamic Panels-->
	<script type="text/javascript">
		setInterval(function(){ 
			$("#tPanel").load("tPanel.php");
			$("#nPanel").load("nPanel.php");
			$("#cIncome_Div").load("iPanel.php #cIncome");
			$("#lIncome_Div").load("iPanel.php #lIncome");
			$("#hIncome_Div").load("iPanel.php #hIncome");
			$("#tIncome_Div").load("iPanel.php #tIncome");
			//alert("ok");
		}, 1000);
	</script>

	<!--Dynamic Morris Data-->
<script type="text/javascript">
$(function() {
    var sales = Morris.Donut({
        element: 'morris-donut-chart',
        data: [
		<?php 
			$results = $mysqli->query("SELECT * FROM products WHERE deleted = '0'");
			if ($results) { 
				while($obj = $results->fetch_object()){
					echo "{ ";
					echo "label: '".$obj->brand_name."',";
					$results1 = $mysqli->query("SELECT COUNT(*) AS totalorders FROM orders WHERE product_id='{$obj->product_id}'");
					$obj1 = $results1->fetch_object();
					if($obj1->totalorders == null){
						echo "value: 0";
					}else{
						echo "value: ".$obj1->totalorders;
					}
					echo "},";
				}
			}
								/*
								$results = $mysqli->query("SELECT * FROM products WHERE deleted = '0'");
								if ($results) { 
									while($obj = $results->fetch_object()){
										echo "{ ";
										echo "label: '".$obj->brand_name."',";
										$results1 = $mysqli->query("SELECT SUM(quantity) AS TotalItemsOrdered FROM orders WHERE product_id = '{$obj->product_id}'");
										$obj1 = $results1->fetch_object();
										if($obj1->TotalItemsOrdered == null){
											echo "value: 0";
										}else{
											echo "value: ".$obj1->TotalItemsOrdered;
										}
										echo "},";
									}
								}
								*/
		?>
		],
        resize: true
    });

    var stocks = Morris.Bar({
        element: 'morris-bar-chart',
        data: [
		<?php
								
								$results = $mysqli->query("SELECT * FROM products WHERE deleted = '0'");
								if ($results) { 
									while($obj = $results->fetch_object()){
										echo "{ ";
										echo "y: '".$obj->brand_name."', ";
										echo "a: ".$obj->stock." },";
									}
								}
		?>
		],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Stock'],
        hideHover: 'auto',
        resize: true
    });

    setInterval(function(){ 
	$.post("sales.php", function(data, status){
		var text = data;
		var str = text.slice(0, -5);
		str = str + " ] }";
		var obj = JSON.parse(str);
		sales.setData(obj.data);
		//alert(str);
    	});

	$.post("stocks.php", function(data, status){
		var text = data;
		var str = text.slice(0, -5);
		str = str.slice(3);
		str = str + " ] }";
		var obj = JSON.parse(str);
		stocks.setData(obj.data);
		//alert(str);
    	});
	//var text = '{ "data" : [ { "y":"John" , "a":0 }, { "y":"Anna" , "a":1 }, { "y":"Peter" , "a":10 } ] }';
	//var obj = JSON.parse(text);
	//stocks.setData(obj.data);
    }, 1000);

});
</script>
	
</body>

</html>
