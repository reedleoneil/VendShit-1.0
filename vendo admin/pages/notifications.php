<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Notifications</title>

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
                    <h1 class="page-header">Notifications</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Notification ID</th>
                                            <th>Notification</th>
                                            <th>Date and Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$results = $mysqli->query("SELECT * FROM notifications");
if ($results) { 
	while($obj = $results->fetch_object()){
		echo "<tr>";
		echo "<td>".$obj->notification_id."</td>";
		echo "<td>".$obj->notification."</td>";
		echo "<td>".$obj->date_time."</td>";
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
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
  
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<!--Add Edit Delete Product-->
<form class="form-horizontal" role="form" method="post" action="">
	  <div class="modal fade" id="add_product" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
    <div class="form-group">
      <div class="col-sm-12">
        <input type="text" class="form-control" id="add_product_brand_name" placeholder="Brand Name" name="brand_name">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">          
        <input type="text" class="form-control" id="add_product_generic_name" placeholder="Generic Name" name="generic_name">
      </div>
    </div>
	<div class="form-group">
      <div class="col-sm-12">          
        <input type="text" class="form-control" id="add_product_price" placeholder="Price" name="price">
      </div>
    </div>
        </div>
        <div class="modal-footer">
		  <button type="submit" class="btn btn-default" name="add_product">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</form>

<form class="form-horizontal" role="form" method="post" action="">
  <div class="modal fade" id="edit_product" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Product</h4>
        </div>
        <div class="modal-body table-responsive">
<table class="table table-hover table-condensed" id="product_table">
			<thead>
			<tr>
				<th>Brand Name</th>
				<th>Generic Name</th>
				<th>Price</th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
<?php
$results = $mysqli->query("SELECT * FROM products WHERE deleted = '0'");
if ($results) { 
	while($obj = $results->fetch_object()){
		echo "<tr>";
		echo "<td style='display: none;'><input type='text' name='product_id[]' value='".$obj->product_id."'></td>";
		echo "<td><input type='text' name='brand_name[]' value='".$obj->brand_name."'></td>";
		echo "<td><input type='text' name='generic_name[]' value='".$obj->generic_name."'></td>";
		echo "<td><input type='text' name='price[]' value='".$obj->price."'></td>";
		echo "<td><a href='delete_product.php?product_id=".$obj->product_id."' class='btn btn-default btn-xs'><span class='glyphicon glyphicon-remove'></span> Delete</a></td>";
		echo "</tr>";
    }    
}
?>
			</tbody>
</table> 
        </div>
        <div class="modal-footer">
		  <button type="submit" class="btn btn-default" name="edit_product">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</form>

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
    });
    </script>

</body>

</html>
