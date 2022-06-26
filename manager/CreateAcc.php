<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./bootstrap/bootstrap-icons-1.6.1/font/bootstrap-icons.css">
<title>Pharmacy Inventory and Customer Information system</title>
</head>
<body>
<div class="CCMain">
   <h1><i class="bi bi-pencil-square text-success"></i> <span class="text-primary">REGISTER</span></h1>
   <form method="POST" action="CreateAcc.php">
  <div class="form-group">
  <?php include('errors.php'); ?>
      <label for="firstname">First Name</label>
      <input type="text" 
             name="first_name" 
             required="_required"
             class="form-control col-6" 
             placeholder="Enter Name" required>
        <label for="lastname">Last Name</label>
        <input type="text" 
               name="last_name"
               required="_required" 
               class="form-control col-6" 
               placeholder="Enter Last Name">
           <label for="username">Username</label>
           <input type="text" 
                  name="username"
                  required="_required" 
                  class="form-control col-6" 
                  placeholder="Enter username" required>
            <label for="password">Password</label>
            <input type="password" 
                   name="password_1"
                   required="_required"
                   class="form-control col-6" 
                   placeholder="Enter username"
                   pattern=".{8,}" 
                   title="8 characters minimum">
              <label for="username">Repeat Password</label>
              <input type="password" 
                     name="password_2" 
                     class="form-control col-6" 
                     placeholder="Enter username"
                     pattern=".{8,}" 
                     title="8 characters minimum">
  </div>
  <img src="../Pharmacy Inventory and customer information system/img/Nurse.png">
  <small><a href="../Pharmacy Inventory and customer information system/superuser.php">I already have an account</a></small>
  <input type="submit" name="reg_user" class="btn btn-primary btn-lg"   value="Register"/>
  </form>
</div>

<script src="./js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>