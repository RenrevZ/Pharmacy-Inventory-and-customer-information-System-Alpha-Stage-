<?php include('config.php')?>
<html>
<head>
<title>Edit Item</title>
<link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .form_Edit{
        position:relative;
        top:230px;
        left:550px;
        width: 500px;
        box-shadow: 3px 3px 3px rgba(0,0,0,0.5)
    }
      ul{
        list-style:none;
        color:white;
        font-size:20px;
    }
    h1{
        margin:auto;
        margin-left:100px;
        color:white;
    }
</style>
<body>


<div class="form_Edit">
<div class="card bg-primary">
  <div class="card-header">
    <h1> Admin| Superuser </h1>
  </div>
    <?php
        $sql = "SELECT * FROM register";
        $result = mysqli_query($db, $sql);
        
        if (isset($_GET['user']))
            {
            $Username = $_GET['user'];
            $data = mysqli_query($db,"DELETE FROM register WHERE first_name='$Username'");
            }

    ?>
    <table class="table table-bordered text-white">
      <a href="CreateAcc.php" class="btn btn-success btn-md">Add Manager</a>
      <a href="index.php" class="btn btn-danger btn-md">Log out</a>
  <thead class="thead-dark">
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Username</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $number = 0;
   while($fetch = mysqli_fetch_assoc($result)){
        $number = $number+1;
        ?>
         <tr>
            <th scope="col"><?php echo $number?></th>
            <th scope="col"><?php echo $fetch['username']?></th>
            <th scope="col"><?php echo  $fetch['first_name']?></th>
            <th scope="col"><?php echo $fetch['last_name']?></th>
            <th><a href="superuser.php?user=<?php echo $fetch["first_name"] ?>"><button class="btn btn-danger btn-md text-white">Delete <i class="bi bi-trash-fill"></i></th></button></a></th>
        </tr>

        <?php
   }
  
  ?>
    </tbody>
    </table>
  </div>
  </form>
</div>
</body>
</html>