<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Oaksva Inventory</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Oaksva</a>
            </div>
           
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="adminDisplayInventory.html"><i class="fa fa-fw fa-dashboard"></i> Display Inventory</a>
                    </li>
                    <li>
                        <a href="adminUpdateProduct.html"><i class="fa fa-fw fa-edit"></i> Update Product</a>
                    </li>
                    <li class="active">
                        <a href="adminAddProduct.html"><i class="fa fa-fw fa-edit"></i> Add New Product</a>
                    </li>
                    <li>
                        <a href="adminDeleteProduct.html"><i class="fa fa-fw fa-edit"></i> Delete Product</a>
                    </li>
                     <li>
                        <a href="adminDisplayEmployee.html"><i class="fa fa-fw fa-dashboard"></i> Display Employee</a>
                    </li>
                     <li>
                        <a href="adminUpdateEmployee.html"><i class="fa fa-fw fa-edit"></i> Update Employee</a>
                    </li>
                     <li>
                        <a href="adminAddEmployee.html"><i class="fa fa-fw fa-edit"></i> Add New Employee</a>
                    </li>
                     <li>
                        <a href="adminDeleteEmployee.html"><i class="fa fa-fw fa-edit"></i> Delete Employee</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <br>
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add New Product</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">

                                <form role="form">                                   
								    <div class="form-group">
                                        <label>Product Name</label>
                                        <input class="form-control" placeholder="Enter Product name">
                                    </div>

                                    <div class="form-group">
                                        <label>Vendor</label>
                                        <input class="form-control" placeholder="Enter Vendor name">
                                    </div>

                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input class="form-control" placeholder="Enter Product Stock">
                                    </div>

                                    <div class="form-group">
                                        <label>Price</label>
                                        <input class="form-control" placeholder="Product Price : 100000">
                                    </div>
									<br>
                                    <button type="submit" class="btn btn-sm btn-warning">Submit</button>
                                    <button type="reset" class="btn btn-sm btn-danger">Cancel</button>
                                </form>

                            </div>
                           
                        </div>
                <!-- /.row -->   

                    </div>
                 </div>

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
