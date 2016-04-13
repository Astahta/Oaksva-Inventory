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
                        <a href="adminDisplayInventory.php"><i class="fa fa-fw fa-dashboard"></i> Display Inventory</a>
                    </li>
                    
                    <li>
                        <a href="adminAddProduct.php"><i class="fa fa-fw fa-edit"></i> Add New Product</a>
                    </li>
                    
                     <li class="active">
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
                        <h3 class="panel-title">Display Employee</h3>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="confirmation" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Konfirmasi Penghapusan</h4>
                            </div>
                            <div class="modal-body">
                                <label>Anda yakin akan menghapus pegawai tersebut?</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button"  data-dismiss="modal" class="btn btn-sm btn-warning">OK</button>
                                <button type="button"  data-dismiss="modal" class="btn btn-sm btn-danger">Cancel</button>
                            </div>
                          </div>
                          
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Formulir Perubahan</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Enter new password">
                                    <label>Nama</label>
                                    <input type="password" class="form-control" placeholder="Enter new name">
                                    <label>Nomor Telpon</label>
                                    <input type="password" class="form-control" placeholder="Enter new number phone">
                                    <label>Divisi</label>
                                    <input type="password" class="form-control" placeholder="Enter new division">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button"  data-dismiss="modal" class="btn btn-sm btn-warning">OK</button>
                                <button type="button"  data-dismiss="modal" class="btn btn-sm btn-danger">Cancel</button>
                            </div>
                          </div>
                          
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                
                                <form role="form">  
                                <div class="table-responsive">                                 
                                     <table id="employee" class="table table-bordered table-hover table-striped">
									  <tr>
                                        <th>No</th>
										<th>Email</th>
										<th>Nama Pegawai</th>
										<th>No. Telp Pegawai</th>
										<th>Divisi</th>
                                        <th>Hapus</th>
                                        <th>Delete</th>
									  </tr>
									    <tbody>
                                            <?php
 
                                            //Data mentah yang ditampilkan ke tabel    
                                                $con = mysqli_connect("localhost","root","","oaksva");
                                                        
                                                $sql = 'SELECT email, nama, no_telpon, divisi  FROM pegawai';
                                                        $result = mysqli_query($con, $sql);
                                                        $no = 1;
                                                        while ($obj = $result->fetch_object()) {
                                                        $email = $obj->email;
                                                ?>
 
                                                <tr align='left'>
                                                    <td><?php echo  $no;?></td>
                                                    <td><?php echo  $obj->email; ?></td>
                                                    <td><?php echo  $obj->nama; ?></td>
                                                    <td><?php echo  $obj->no_telpon; ?></td>
                                                    <td><?php echo  $obj->divisi; ?></td>
                                                    <td>
                                                        <buttontype="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmation">Hapus</button>
                                                    </td>
                                                    <td>    
                                                        <buttontype="submit" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal">Ubah</button>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no++;
                                                }
                                            ?>
                                        </tbody>
									</table> 
                                    <br>
                                </div>
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
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#employee").dataTable();
        });
    </script>

</body>

</html>
