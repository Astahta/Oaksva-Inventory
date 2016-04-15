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
                    
                     <li>
                        <a href="adminDisplayEmployee.php"><i class="fa fa-fw fa-dashboard"></i> Display Employee</a>
                    </li>
                   
                     <li class="active">
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
                        <h3 class="panel-title">Add New Employee</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php
                                // define variables and set to empty values
                                $Email_Employee = $Name_Employee = $Phone_Employee = $Division_Employee = $Password_Employee = "";
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                   $Name_Employee = test_input($_POST["Name_Employee"]);
                                   $Phone_Employee = test_input($_POST["Phone_Employee"]);
                                   $Division_Employee = test_input($_POST["Division_Employee"]);
                                   $Email_Employee = test_input($_POST["Email_Employee"]);
                                   $Password_Employee = test_input($_POST["Password_Employee"]);
                                }

                                function test_input($data) {
                                   $data = trim($data);
                                   $data = stripslashes($data);
                                   $data = htmlspecialchars($data);
                                   return $data;
                                }
                                            if(!isset($Name_Employee) || trim($Name_Employee)==='' || !isset($Phone_Employee) || trim($Phone_Employee)==='' || !isset($Division_Employee) || trim($Division_Employee)==='' || !isset($Email_Employee) || trim($Email_Employee)==='' || !isset($Password_Employee) || trim($Password_Employee)===''){}
                                                else{
                                            //Data mentah yang ditampilkan ke tabel    
                                                $con = mysqli_connect("localhost","root","","oaksva");
                                                $stmt = $con->prepare("INSERT INTO pegawai (email, nama, no_telpon, divisi, password) VALUES (?, ?, ?, ?, ?)");
                                                $stmt->bind_param("sssss", $email, $nama, $telpon, $divisi, $password);
                                                $email = $Email_Employee;
                                                $nama = $Name_Employee;
                                                $telpon = $Phone_Employee;
                                                $divisi = $Division_Employee;
                                                $password = $Password_Employee;
                                                $stmt->execute();
                                                $stmt->close();
                                                $con->close();
                                            }
                                                    
                                ?>
                                <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" placeholder="Enter Employee email" type="text" name="Email_Employee" id="Email_Employee">
                                    </div>                                 
								    <div class="form-group">
                                        <label>Employee Name</label>
                                        <input class="form-control" placeholder="Enter Employee name" type="text" name="Name_Employee" id="Name_Employee">
                                    </div>

                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" placeholder="Enter Employee phone number" type="text" name="Phone_Employee" id="Phone_Employee">
                                    </div>

                                    <div class="form-group">
                                        <label>Division</label>
                                        <input class="form-control" placeholder="Enter Employee Division" type="text" name="Division_Employee" id="Division_Employee">
                                    </div>
                                      <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" placeholder="Enter Employee Password" type="password" name="Password_Employee" id="Password_Employee">
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
