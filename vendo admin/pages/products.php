<?php 
include("config.php");

if(isset($_POST['add_product']))
{
	$brand_name= $_POST['brand_name'];
	$generic_name= $_POST['generic_name'];
	$price= $_POST['price'];
	$mysqli->query("INSERT INTO products VALUES('','{$brand_name}','{$generic_name}','','{$price}','', '')");
}

if(isset($_POST['edit_product']))
{
	$product_id = $_POST['product_id'];
	$brand_name= $_POST['brand_name'];
	$generic_name= $_POST['generic_name'];
	$stock= $_POST['stock'];
	$price= $_POST['price'];
	$slot= $_POST['slot'];
	$mysqli->query("UPDATE  products SET brand_name ='{$brand_name}', generic_name='{$generic_name}', stock='{$stock}', price='{$price}', slot='{$slot}' WHERE product_id='{$product_id}'");
}

if(isset($_POST['delete_product'])){
	$product_id = $_POST['product_id'];
	$mysqli->query("UPDATE products SET deleted = '1' WHERE product_id='{$product_id}'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Products</title>

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
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-plus-square fa-fw"></i> <button style="border:none; background-color:rgba(0,0,0,0);" type="button"  data-toggle="modal" data-target="#add_product"> Add Product</button></a>
                        </li>
                        <li><a href="#"><i class="fa fa-minus-square fa-fw"></i> <button style="border:none; background-color:rgba(0,0,0,0);" type="button"  data-toggle="modal" data-target="#edit_product"> Edit Product</button></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
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
                    <h1 class="page-header">Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
				<div class="row">
					<div class="col-lg-6">Products</div>
                            		<!--<div class="col-lg-6">
						<button style="float:right;" type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#add_product"><i class="fa fa-plus-square fa-fw"></i>  Add Product</button>
                                           	<button style="float:right;" type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit_product"><i class="fa fa-minus-square fa-fw"></i> Edit Product</button>
                        		</div>-->
				</div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Brand Name</th>
                                            <th>Generic Name</th>
                                            <th>Stock</th>
                                            <th>Price</th>
					    <th>Slot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$results = $mysqli->query("SELECT * FROM products WHERE deleted ='0'");
if ($results) { 
	while($obj = $results->fetch_object()){
		echo "<tr>";
		echo "<td><a href='#' class='editProduct' data-toggle='modal' data-target='#edit_product'>".$obj->product_id."</a></td>";
		echo "<td class='edit_brand_name'>".$obj->brand_name."</td>";
		echo "<td class='edit_generic_name'>".$obj->generic_name."</td>";
		echo "<td class='edit_stock'>".$obj->stock."</td>";
		echo "<td class='edit_price'>&#8369; ".strval(number_format($obj->price, 2))."</td>";
		echo "<td class='edit_slot'>".$obj->slot."</td>";
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
								echo "Highest Stock: ";
								$results = $mysqli->query("SELECT * FROM products WHERE stock=(SELECT MAX(stock) AS lowstock FROM products)");
								$obj = $results->fetch_object();
								echo $obj->brand_name;	
								echo "<br>";			
								echo "Lowest Stock: ";
								$results = $mysqli->query("SELECT * FROM products WHERE stock=(SELECT MIN(stock) AS lowstock FROM products)");
								$obj = $results->fetch_object();
								echo $obj->brand_name;
								//echo "Total Sales/Product: ";
								$products = array();
								$total_orders_per_product = array();
								$r=0;
								$results = $mysqli->query("SELECT * FROM products WHERE deleted = '0'");
								if ($results) { 
									while($obj = $results->fetch_object()){
										$products[$r] = $obj->brand_name;
										//echo "<br>&nbsp;&nbsp;&nbsp;-".$obj->brand_name.": ";
										//$results1 = $mysqli->query("SELECT SUM(quantity) AS TotalItemsOrdered FROM orders WHERE product_id = '{$obj->product_id}'");
										$results1 = $mysqli->query("SELECT COUNT(*) AS TotalItemsOrdered FROM orders WHERE product_id='{$obj->product_id}'");
										$obj1 = $results1->fetch_object();
										if($obj1->TotalItemsOrdered == null){
											$total_orders_per_product[$r] = 0;
											//echo 0;
										}else{
											$total_orders_per_product[$r] = $obj1->TotalItemsOrdered;
											//echo $obj1->TotalItemsOrdered;
										}
										$r++;
									}
								}
								echo "<br>Highest Sales: ";
								arsort($total_orders_per_product);
								$key_of_max = key($total_orders_per_product);
								echo $products[$key_of_max];
								echo "<br>Lowest Sales: ";
								asort($total_orders_per_product);
								$key_of_min = key($total_orders_per_product);
								echo $products[$key_of_min];
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
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Product</h4>
        </div>
        <div class="modal-body">
    <div class="form-group" style="display:none">
      <div class="col-sm-12">
        <input type="text" class="form-control" id="edit_product_id" placeholder="Product ID" name="product_id">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Brand Name:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="edit_product_brand_name" placeholder="Brand Name" name="brand_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Generic Name:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control" id="edit_product_generic_name" placeholder="Generic Name" name="generic_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Stock:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control" id="edit_product_stock" placeholder="Stock" name="stock">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Price:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control" id="edit_product_price" placeholder="Price" name="price">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Slot:</label>
      <div class="col-sm-9">          
	<select class="form-control" id="edit_product_slot" name="slot">
		<option>0</option>
    		<option>1</option>
    		<option>2</option>
    		<option>3</option>
    		<option>4</option>
	</select>
      </div>
    </div>
        </div>
        <div class="modal-footer">
		  <button type="submit" class="btn btn-default" name="delete_product">Delete</button>
		  <button type="submit" class="btn btn-default" name="edit_product">Save</button>
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

    $(".editProduct").click(function() {
	var $row = $(this).closest("tr");    // Find the row
	var $id = $(this).closest(".editProduct").text();
	var $brand_name = $row.find(".edit_brand_name").text(); 
	var $generic_name = $row.find(".edit_generic_name").text();
	var $stock = $row.find(".edit_stock").text(); 
	var $price = $row.find(".edit_price").text();
	$price = $price.slice(2);
	$price = $price.slice(0, $price.length - 3);
	var $slot = $row.find(".edit_slot").text()

	$("#edit_product_id").val($id);
	$("#edit_product_brand_name").val($brand_name);
	$("#edit_product_generic_name").val($generic_name);
	$("#edit_product_stock").val($stock);
	$("#edit_product_price").val($price);
	$("#edit_product_slot").val($slot);
	//alert($id + " " +$brand_name + " " + $generic_name + " " + $stock + " " + $price);
    });
    </script>

</body>

</html>
