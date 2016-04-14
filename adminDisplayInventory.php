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
                        <a href="adminDisplayInventory.php"><i class="fa fa-fw fa-dashboard"></i> Display Inventory</a>
                    </li>
                    
                    <li>
                        <a href="adminAddProduct.php"><i class="fa fa-fw fa-edit"></i> Add New Product</a>
                    </li>
                    
                     <li>
                        <a href="adminDisplayEmployee.php"><i class="fa fa-fw fa-dashboard"></i> Display Employee</a>
                    </li>
                     
                     <li>
                        <a href="adminAddEmployee.php"><i class="fa fa-fw fa-edit"></i> Add New Employee</a>
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
                        <h3 class="panel-title">Display Inventory</h3>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="confirmation" role="dialog">
                        <div class="modal-dialog">
                        <form action="validateadi.php"  method="post">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Konfirmasi Penghapusan</h4>
                            </div>
                            <div class="modal-body">
                                <label>Anda yakin akan menghapus produk tersebut?</label>
                                <input name="order-id" type="hidden" id="orderId" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="Post" class="btn btn-sm btn-warning">OK</button>
                                <button type="button"  data-dismiss="modal" class="btn btn-sm btn-danger">Cancel</button>
                            </div>
                          </div>
                          </form>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <form action="validateaui.php" method="post">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Formulir Perubahan</h4>
                            </div>
                            <div class="modal-body">
    
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter new password" id="nameId" value="">
                                    <label>Vendor</label>
                                    <input type="text" name="vendor"class="form-control" placeholder="Enter new name" id="vendorId" value="">
                                    <label>Stok</label>
                                    <input type="text" name="stock" class="form-control" placeholder="Enter new number phone" id="stockId" value="">
                                    <label>Harga</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter new division" id="priceId" value="">
                                    <input name="inventoryid" type="hidden" id="inventoryId" value="">
                            
                            </div>
                            <div class="modal-footer">
                                <button type="submit"  name="Post" class="btn btn-sm btn-warning">OK</button>
                                <button type="button"  data-dismiss="modal" class="btn btn-sm btn-danger">Cancel</button>
                            </div>
                          </div>
                          </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">

                                <form role="form">                                   
                                     <table id="inventory" class="table table-bordered table-hover table-striped">
                                      <tr>
                                        <th>No</th>
                                        <th>Id Inventory</th>
                                        <th>Nama Produk</th>
                                        <th>Vendor</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Hapus</th>
                                        <th>Edit</th>
                                      </tr>
                                      <tbody>
                                            <?php
 
                                            //Data mentah yang ditampilkan ke tabel    
                                                $con = mysqli_connect("localhost","root","","oaksva");
                                                        
                                                $sql = 'SELECT id_inventory, nama, vendor, stok, harga  FROM inventory';
                                                        $result = mysqli_query($con, $sql);
                                                        $no = 1;
                                                        while ($obj = $result->fetch_object()) {
                                                        $id = $obj->id_inventory;
                                                        $nama = $obj->nama;
                                                        $vendor = $obj->vendor;
                                                        $stok = $obj->stok;
                                                        $harga = $obj->harga;
                                                ?>
 
                                                <tr align='left'>
                                                    <td><?php echo  $no;?></td>
                                                    <td><?php echo  $obj->id_inventory; ?></td>
                                                    <td><?php echo  $obj->nama; ?></td>
                                                    <td><?php echo  $obj->vendor; ?></td>
                                                    <td><?php echo  $obj->stok; ?></td>
                                                    <td><?php echo  $obj->harga; ?></td>
                                                    <td>
                                                        <buttontype="submit" class="delete-inventory btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmation" data-id=<?php echo $id?> value=<?php echo $id?> onclick= "validate()">Hapus</button>
                                                    </td>
                                                    <td>    
                                                        <buttontype="submit" class="update-inventory btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" data-id=<?php echo $no?> value=<?php echo $id?> onclick= "validateupdate()">Ubah</button>
                                                        <input name="nama-id" type="hidden" id="<?php echo $no?>" value="<?php echo $nama?>">
                                                        <input name="vendor-id" type="hidden" id="<?php echo $no?>" value="<?php echo $vendor?>">
                                                        <input name="stok-id" type="hidden" id="<?php echo $no?>" value="<?php echo $stok?>">
                                                        <input name="harga-id" type="hidden" id="<?php echo $no?>" value="<?php echo $harga?>">
                                                        <input name="inventory-id" type="hidden" id="<?php echo $no?>" value="<?php echo $id?>">
                                                    </td>
                                                </tr>
                                            <?php
                                                $no++;
                                                }
                                            ?>
                                        </tbody>
                                    </table> 
                                    <br>

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
        <script>
    var validate = function(){
        $(document).on("click", ".delete-inventory", function () {
        var OrderId = $(this).data('id');
        alert(OrderId);
        $(".modal-body #orderId").val( OrderId );
        });

    };

     var validateupdate = function(){
        $(document).on("click", ".update-inventory", function () {
        var OrderId = $(this).data('id');
        var InventoryId = document.getElementsByName("inventory-id")[OrderId-1].value;
        var NameId = document.getElementsByName("nama-id")[OrderId-1].value;
        var VendorId = document.getElementsByName("vendor-id")[OrderId-1].value;
        var StockId = document.getElementsByName("stok-id")[OrderId-1].value;
        var PriceId = document.getElementsByName("harga-id")[OrderId-1].value;
        $(".modal-body #inventoryId").val( InventoryId );
        $(".modal-body #nameId").val( NameId );
        $(".modal-body #vendorId").val( VendorId );
        $(".modal-body #stockId").val( StockId );
        $(".modal-body #priceId").val( PriceId );
        });

    };
        
    </script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#inventory").dataTable();
        });
    </script>

</body>

</html>
