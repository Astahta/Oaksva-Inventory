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
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Inventory</a>
                    </li>
                    <li>
                        <a href="purchase.php"><i class="fa fa-fw fa-table"></i> Purchase</a>
                    </li>
                    <li class="active">
                        <a href="order.php"><i class="fa fa-fw fa-edit"></i> Order</a>
                    </li>
                    <li>
                        <a href="delivery.php"><i class="fa fa-fw fa-wrench"></i> Delivery</a>
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
                            <div class="col-sm-12">
                                     <?php
                                // define variables and set to empty values
                                $Nama_Pemesan = $No_Telpon = $Alamat_Pesan = $Id_Produk = $Nama_Produk = $Jumlah_Pesanan = "";
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                   $Nama_Pemesan = test_input($_POST["Customer"]);
                                   $No_Telpon = test_input($_POST["Notelp"]);
                                   $Alamat_Pesan = test_input($_POST["Address"]);
                                   $Id_Produk = test_input($_POST["sel1"]);
                                   $Jumlah_Pesanan = test_input($_POST["JumlahPesanan"]);
                                }       

                                function test_input($data) {
                                   $data = trim($data);
                                   $data = stripslashes($data);
                                   $data = htmlspecialchars($data);
                                   return $data;
                                }
                                if(!isset($Nama_Pemesan) || trim($Nama_Pemesan)==='' || !isset($No_Telpon) || trim($No_Telpon)==='' || !isset($Alamat_Pesan) || trim($Alamat_Pesan)===''){}
                                    else{
                                //Data mentah yang ditampilkan ke tabel    
                                    $con = mysqli_connect("localhost","root","","oaksva");
                                    $stmt = $con->prepare("INSERT INTO pesanan (nama_pemesan, no_telpon, tanggal_pesan, alamat_pemesan) VALUES (?, ?, now(), ?)");
                                    $stmt->bind_param("sss", $nama, $telpon, $alamat);
                                    $nama = $Nama_Pemesan;
                                    $telpon = $No_Telpon;                                        
                                    $alamat = $Alamat_Pesan;
                                    $stmt->execute();
                                    $stmt->close();
                                    $con->close();
                                }

                            //Data mentah yang ditampilkan ke tabel    
                                $con = mysqli_connect("localhost","root","","oaksva");
                                        
                                $sql = 'SELECT max(id_pesanan) as max FROM pesanan';
                                        $result = mysqli_query($con, $sql);
                                        while ($obj = $result->fetch_object()) {
                                        $id_pesanan = $obj->max;   
                                    }
                                    $con->close();

                                    //Insert ke tabel transaksi_pesanan
                                      if(!isset($id_pesanan) || trim($id_pesanan)==='' || !isset($Id_Produk) || trim($Id_Produk)==='' || !isset($Jumlah_Pesanan) || trim($Jumlah_Pesanan)===''){}
                                    else{
                                //Data mentah yang ditampilkan ke tabel    
                                    $con = mysqli_connect("localhost","root","","oaksva");
                                    $stmt = $con->prepare("INSERT INTO transaksi_pesanan (id_pesanan, id_inventory, jumlah_pesan) VALUES (?, ?, ?)");
                                    $stmt->bind_param("sss", $idpesan, $idproduk, $jumlahpesan);
                                    $idpesan = $id_pesanan;
                                    $idproduk = $Id_Produk;                                        
                                    $jumlahpesan = $Jumlah_Pesanan;
                                    $stmt->execute();
                                    $stmt->close();
                                    $con->close();
                                }
                                                    
                                ?>
                                <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                                <h3>Customer</h3>
                                    <div class="form-group">
                                        <label>Customer name</label>
                                        <input type="text" class="form-control input-lg" name="Customer" id="Customer" placeholder="Enter customer name">
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control input-lg" name="Address" id="Address" placeholder="Enter customer address">
                                    </div>

                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control input-lg" name="Notelp" id="Notelp" placeholder="Phone number : 0813236074">
                                    </div>

                                    <br><br>
                                    <h3>Masukkan Pesanan</h3>
                                    <div class="form-group">
                                       <div class="dropdown">
                                            <label>Nama Produk</label>
                                            <br>
                                          <select class="form-control" id="sel1" name="sel1">
                                                     <?php
             
                                                        //Data mentah yang ditampilkan ke tabel    
                                                            $con = mysqli_connect("localhost","root","","oaksva");
                                                                    
                                                            $sql = 'SELECT id_inventory, nama FROM inventory';
                                                                    $result = mysqli_query($con, $sql);
                                                                    while ($obj = $result->fetch_object()) {
                                                                    $id_inventory = $obj->id_inventory;    
                                                                    $namaproduk = $obj->nama;
                                                                    echo "<option value=$id_inventory>$namaproduk</option>";
                
                                                                }
                                                                $con->close();
                                                    ?>
                                          </select>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label>Jumlah Pesanan</label>
                                        <input type="number" class="form-control input-lg" id="JumlahPesanan" name="JumlahPesanan" value="1">
                                    </div>
                                    <div class="table-responsive">  
                                     <table class='table table-bordered table-hover table-striped ' id="tablee">
                                      </table>
                                      </div>                                   
                                    <br>
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-ok"> Submit</button> 
                                    <button type="reset" class="btn btn-lg btn-danger right" ><span class="glyphicon glyphicon-remove"></span>  Cancel</button>
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

<script>
function myFunction() {
    var x = document.getElementById("myNumber").value;
    var table = document.getElementById("tablee");
    for (var i = x-1; i >= 0; i--) {
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = "<input type='text' class='form-control input-lg' name='barang' placeholder='Input barang'>";
        cell2.innerHTML = "<input type='text' class='form-control input-lg' name='jumlah' placeholder='Jumlah barang'>";
        cell3.innerHTML = "<input type='button' class='btn btn-danger btn-lg' value='Delete' onclick='deleteRow(this)'>";
    }
}

function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("tablee").deleteRow(i);
}
</script>

<script type="text/javascript">
        $(function() {
            $("#myTable").dataTable();
        });
    </script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
