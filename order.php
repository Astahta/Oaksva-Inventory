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
                        <a href="inventory.php"><i class="fa fa-fw fa-dashboard"></i> Inventory</a>
                    </li>
                    <li>
                        <a href="purchase.php"><i class="fa fa-fw fa-table"></i> Purchase</a>
                    </li>
                    <li class="active">
                        <a href="order.php"><i class="fa fa-fw fa-edit"></i> Order</a>
                    </li>
                    <li>
                        <a href="Delivery.php"><i class="fa fa-fw fa-wrench"></i> Delivery</a>
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
                        <h3 class="panel-title">Order Form</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">

                                <form role="form">

                                    <div class="form-group">
                                        <label>Customer name</label>
                                        <input class="form-control" placeholder="Enter customer name">
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" placeholder="Enter customer address">
                                    </div>

                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input class="form-control" placeholder="Phone number : 0813236074">
                                    </div>

                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date">
                                    </div>
                                    
                                     <table>
									  <tr>
                                        <th>No</th>
										<th>Nama Produk</th>
										<th></th>
										<th>Jumlah Produk</th>
									  </tr>
										<?php
 
                                        //Data mentah yang ditampilkan ke tabel    
                                        $con = mysqli_connect("localhost","root","","oaksva");
                                                        
                                        $sql = 'SELECT transaksi_pesanan.id_pesanan as id, pesanan.nama_pemesan as nama, pesanan.no_telpon as telp  FROM pesanan NATURAL JOIN transaksi_pesanan WHERE transaksi_pesanan.status_pembayaran = "undone"';
                                        $result = mysqli_query($con, $sql);
                                        $no = 1;
                                        while ($obj = $result->fetch_object()) {
                                            $id = $obj->id;
                                            ?>
 
                                            <tr align='left'>
                                                <td><?php echo  $no;?></td>
                                                <td><?php echo  $obj->nama; ?></td>
                                                <td></td>
                                                <td><?php echo  $obj->jml; ?></td>
                                                <td>
                                                    <buttontype="submit" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal">Validate</button>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?>
									  
									</table> 
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
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
