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
    <!-- override custome CSS -->
    <link href="css/oaksva.css" rel="stylesheet">

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
  <div class="container">
              <div class="row" >
                  <div class="col-lg-4"></div>
                  <div class="col-lg-4">
                    <div id="form-login" >
                        <img src="android-5-0-lollipop-material-3638.jpg" class="img-responsive">
                      <div style="padding:5px;background:#fff;color:#222;">
                          <a href="index.php"> <h1 class="text-center">OAKSVA</h1></a>
                      </div>
                      <div style="background:#fff;padding: 5px 20px 30px 20px ;">                 
                        <form role="form" method="post" action="loginValidation.php">                                   
                        <div class="form-group">
                              <label>E-mail</label>
                              <input type="email" name="email" autocomplete="on" class="form-control input-lg" name="email" placeholder="Enter username">
                          </div>
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control input-lg" name="password" placeholder="Enter password">
                          </div>
                          <div class="form-group">
                              <label><a href="#">Lupa password?</a></label>
                          </div>
                          <div class="text-center button-grup">
                          <button type="submit" class="btn btn-lg btn-info btn-primary"><span class="glyphicon glyphicon-ok"> Login</button> 
                          <button type="reset" class="btn btn-lg btn-warning btn-primary" ><span class="glyphicon glyphicon-remove"></span>  Cancel</button>
                          </div>
                      </form>
                  </div>
                  </div>
                 </div>  
                 <div class="col-lg-4"></div>
              </div>
      <!-- /.row -->                   

  </div>
  <!-- /.container-fluid -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
