<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./bootstrap/bootstrap-icons-1.6.1/font/bootstrap-icons.css">
<title>Pharmacy Inventory and Customer Information system</title>
</head>
<body>
<div class="contain">
<div class=" p-3 text-dark text-align-center title">
     <img src="./img/Logoc.jpg" class="logo" alt="">
</div>
<div class="flex mt-5">
<div class="card bg-secondary text-white" id="card">
  <div class="card-header">
    <span class="text-warning">St. Anne </span> <span class="font-weight-bold">Pharmacy</span>
  </div>
  <div class="card-body text">
    <h1 class="card-title" id="Card-Text2">Manager</h1>
    <img src="./img/manager.png" alt="" style="width:48%; margin-top:3px;">
    <a href="#" id="ManagerButton" class="btn btn-lg btn-success"  data-toggle="modal" data-target="#Manager">Login</a>
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="modal fade" data-backdrop="static" data-keyboard="false"  id="Manager">
                  <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="Title_Manager text-align-center">
                              <span class="text-info">  Welcome</span><span class="text-primary"> Manager</span></h3>
                        </div>
                          <div class="modal-body">

                            <!--==== Log in Form For Manager===-->
                              <form method="POST" action="index.php" class="ml-5">
                              <img src="./img/NUrse.png"  style="width:40%; position:relative; top:60px;">
                                <div class="form-group">
                                    <div style="position:relative; left:320px; bottom:200px; font-size:20px;">

                                    <!--Including Error To the system-->
                                    <?php include('errors.php'); ?> 
                                  <label for="Name" class="text-dark  "><i class="bi bi-person-circle"  style="font-size:130%"> Username</i></label>
                                  <input type="text" class="form-control col-5" id="form_username" name="username"placeholder="Enter Username">
                                <div class="form-group">
                                  <label for="password" class="text-dark  "><i class="bi bi-key-fill" style="font-size:130%"> Password</i></label>
                                  <input type="password" class="form-control col-5" id="Form_password" name="password" placeholder="Enter Password"  pattern=".{8,}" title="Minimum of 8 Characters">
                                </div>
                                
                                <div class="mt-3">
                                <a href="index.php" data-dismiss="modal"  class="btn btn-danger btn-large">Cancel</a>
                                <input type="submit" name="submit" class="btn btn-success btn-large" value="Login" >
                                </div>
                                     </div>
                                   </div>
                              </form>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
  
<div class="card bg-primary text-white ml-4">
  <div class="card-header ">
    <span class="text-warning">St. Anne </span> <span class="font-weight-bold">Pharmacy</span>
  </div>
  <div class="card-body">
    <h1 class="card-title title-out" id="Card-Text">Sales Staff.</h1>
    <img src="./img/Pharma.png" alt="" style="width:50%;">
    <a href="./Manager.php" class="btn btn-lg btn-success">Login</a>
  </div>
</div>
</div>
</div>
<script src="./js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>