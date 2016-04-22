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
    <?php
        if(isset($_GET['stat'])){
            $stat = $_GET['stat'];
            if($stat==1){
                echo "<script type='text/javascript'>alert('Validate success');</script>";
            }else if($stat == 0){
                echo "<script type='text/javascript'>alert('Wrong Acount');</script>";
            }
        }
    ?>
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
                    <li class="active">
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
                        <h3 class="panel-title">Purchase</h3>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <form action="validate-purchase.php"  method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Validation Form</h4>
                                </div>
                                    <div class="modal-body">
                                        <label>email</label>
                                        <input name ="email" class="form-control" placeholder="Enter your email">
                                        <br>
                                        <label>password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Enter your password">
                                        <input name="order-id" type="hidden" id="orderId" value="">
                                        <input name="stoki" type="hidden" id="stoki" value="">
                                        <input name="iven" type="hidden" id="iven" value="">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="Post" class="btn btn-sm btn-warning">OK</button>
                                        <button type="button"  data-dismiss="modal" class="btn btn-sm btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">

                                        <div class="table-responsive">
                                            <table id="purchase" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Order ID</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Inventory</th>
                                                        <th>Total Harga</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
 
                                                        //Data mentah yang ditampilkan ke tabel    
                                                        $con = mysqli_connect("localhost","root","","oaksva");
                                                        
                                                        $sql = 'SELECT transaksi_pesanan.id_inventory as iv, transaksi_pesanan.id_pesanan as ip, inventory.nama as ni, transaksi_pesanan.id_pesanan as id, pesanan.nama_pemesan as nama, pesanan.no_telpon as telp, transaksi_pesanan.jumlah_pesan * inventory.harga as harga, transaksi_pesanan.jumlah_pesan as jml  FROM pesanan NATURAL JOIN transaksi_pesanan NATURAL JOIN inventory WHERE transaksi_pesanan.status_pembayaran = "undone" ORDER BY transaksi_pesanan.id_pesanan';
                                                            
                                                        $result = mysqli_query($con, $sql);
                                                        $no = 1;
                                                        while ($obj = $result->fetch_object()) {
                                                        $id = $obj->id;
                                                    ?>
 
                                                    <tr align='left'>
                                                        <td><?php echo  $no;?></td>
                                                        <td><?php echo  $obj->ip; ?></td>
                                                        <td><?php echo  $obj->nama; ?></td>
                                                        <td><?php echo  $obj->telp; ?></td>
                                                        <td><?php echo  $obj->ni; ?></td>
                                                        <td><?php echo  $obj->harga; ?></td>

                                                        <td>
                                                            <input type="hidden" name="idinventory" id="<?php echo $no?>"  value="<?php echo $obj->iv ?>"></input>
                                                            <input type="hidden" name="stok" id="<?php echo $no?>"  value="<?php echo $obj->jml ?>"></input>
                                                            <button type="submit" name="noid" data-id=<?php echo $no?> class="vpurchase btn btn-sm btn-warning" value="<?php echo $id?>"  data-toggle="modal" data-target="#myModal" onclick= "validate()" >Validate</button>
                                                            
                                                        </td>
                                                        
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
    <script>
    var validate = function(){
        $(document).on("click", ".vpurchase", function () {
        var OrderId = $(this).data('id');
        var Value = document.getElementsByName("noid")[OrderId-1].value;
        var stok = document.getElementsByName("stok")[OrderId-1].value;
        var iven = document.getElementsByName("idinventory")[OrderId-1].value;
        $(".modal-body #orderId").val( Value );
        $(".modal-body #stoki").val( stok );
        $(".modal-body #iven").val( iven );
        });

    };
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#purchase").dataTable();
        });
    </script>

</body>

</html>
