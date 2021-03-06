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
                    <li class="active">
                        <a href="inventory.php"><i class="fa fa-fw fa-dashboard"></i> Inventory</a>
                    </li>
                    <li>
                        <a href="purchase.php"><i class="fa fa-fw fa-table"></i> Purchase</a>
                    </li>
                    <li>
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
                        <h3 class="panel-title">Inventory</h3>
                    </div>
                    

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">

                                        <div class="table-responsive">
                                            <table id="inventory" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Pemesan</th>
                                                        <th>Inventory</th>
                                                        <th>Jumlah Barang</th>
                                                        <th>Status Pembayaran</th>
                                                        <th>Status Pengiriman</th>
                                                        <th>Tanggal Pesan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
 
                                                        //Data mentah yang ditampilkan ke tabel    
                                                        $con = mysqli_connect("localhost","root","","oaksva");
                                                        
                                                        $sql = 'SELECT p.nama_pemesan as nama, i.nama as namainventory, t.jumlah_pesan as jumlah, t.status_pembayaran as bayar, t.status_pengiriman as kirim, Date(p.tanggal_pesan) as tp  FROM pesanan p  NATURAL JOIN transaksi_pesanan t NATURAL JOIN Inventory i ORDER BY t.tanggal_bayar';
                                                        
                                                        $result = mysqli_query($con, $sql);
                                                        $no = 1;
                                                        while ($obj = $result->fetch_object()) {
                                                        //$id = $obj->id;
                                                    ?>
 
                                                    <tr align='left'>
                                                        <td><?php echo  $no;?></td>
                                                        <td><?php echo  $obj->nama; ?></td>
                                                        <td><?php echo  $obj->namainventory; ?></td>
                                                        <td><?php echo  $obj->jumlah; ?></td>
                                                        <td><?php echo  $obj->bayar; ?></td>
                                                        <td><?php echo  $obj->kirim; ?></td>
                                                        <td><?php echo  $obj->tp; ?></td>
                                                        <!--td>
                                                            <buttontype="submit" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal">Validate</button>
                                                        </td-->
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
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
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#inventory").dataTable();
        });
    </script>

</body>

</html>
