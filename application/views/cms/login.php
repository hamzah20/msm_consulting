<!doctype html>
<html lang="en"> 
  <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/fontawesome-5/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- CSS External for Login Page -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css'); ?>">

    <title>LOGIN</title>
  </head>
  <body class="bg-login">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 mx-auto pt-5">
          <div class="card mt-5">
            <h5 class="card-header"><img src="<?php echo base_url('assets/images/pictures/enduser_logo.png'); ?>" class="img-fluid"></h5>
            <div class="card-body">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <a class="btn btn-login btn-block font-weight-bold" href="<?php echo base_url('Dashboard/index'); ?>" role="button">LOGIN</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> 
  </body>
</html>