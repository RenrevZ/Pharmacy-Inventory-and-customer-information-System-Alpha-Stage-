<?php include('server.php') ?>
<?php include('addcustomer.php') ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./bootstrap/bootstrap-icons-1.6.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<title>Pharmacy Inventory and Customer Information system</title>
</head>
<body>
<div class="sideNav">
    <header>
    <a href="#"></i></a><i class="bi bi-person-circle logo"></i>
     <h5>Sales Staff</h5> 
</header>
   <ul>
   <li><a href="./Manager.php"  class="button"><i class="bi bi-person-plus-fill"></i> Add Customer</a></li>
   <li><a href="./Customer List.php"  class="button"><i class="bi bi-person-lines-fill" ></i> Customer List</a></li>
    <li class="mt-5"><a href="./index.php" class="button bg-danger"><i class="bi bi-box-arrow-in-left" ></i> Logout</a></li>
</ul>
</div>

<div class="main">
    <header>
        <h1><i class="bi bi-person-plus-fill"></i> <span class="text-danger font-weight-bold">CUSTOMER</span> <span class="text-success font-weight-bolder">PAGE</span></h1>
        
    </header>
    <!--=== Main form for submitting a value that will be deducted to the database =====-->
    <form action="addcustomer.php" method="post" id="managerForm">
        <div class="form-row">
            <div class="form-group col-md-5">
              <label for="Fullname">Name</label>
              <input type="text" name="Customer_name" class="form-control" placeholder="e.g Harvy M. Gascon" required>
            </div>
            <div class="form-group col-md-5">
                <label>Gender</label>
                <select class="custom-select mr-sm-2" name="Gender_select" required>
                    <option selected>Choose...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
            </div>
          </div>

          <div class="form-row">
          <div class="form-group col-md-5">
            <label for="Address">Address</label>
            <input type="text" class="form-control" name="Customer_Address" placeholder="Address" required>
          </div>
          <div class="form-group col-md-3">
            <label for="Age">Age</label>
            <input type="Number" class="form-control" name="Customer_Age" placeholder="Age" min="0" max="200" required>
          </div>
        </div>
        
        <!-- ERROR MASSAGE WHEN TWO VALUES IN INPUT FIELD WAS THE SAME-->
        <div class="alert alert-danger col-8 error-manager" id="error">
          <button type="button" class="close" data-dismiss="alert">&times;</button>Error!! You can't choose an item with the same name
        </div>
        <!-- ERROR MASSAGE-->
        <?php if (isset($_GET['error'])) { ?>
         <div class="alert alert-danger  alert-dismissible fade show w-75" 
              role="alert" id="errorMed">
         <strong>ERROR!! </strong><?php echo $_GET['error']; ?>
           <button type="button" 
                   class="close" 
                   data-dismiss="alert" 
                   aria-label="Close">
            <span  aria-hidden="true">&times;</span>
             </button>
             </div>
     	   <?php } ?>
          <div class="form-row d-flex flex-column align-items-center">
            <!-- === CLONE FORM 1 -->
            <div id="cloneform" class="form-row">
                  <div class="form-group col-md-7">
                    <label>Order</label>
                          <select id="order1" name="medicineName" data-live-search="true" 
                          class="mt-5">
                            <option selected>Choose...</option>
                              <?php 
                                $server ="sql113.epizy.com";
                                $username="epiz_32035199";
                                $password="wmWJiyCBCG";
                                $dbname="epiz_32035199_inventorymanagement";
                                
                                $mysqli_md = new mysqli($server, $username,$password, $dbname);
                                $medicine_list = $mysqli_md->query('SELECT product_name FROM product');

                                while($rows = $medicine_list->fetch_assoc()){
                                  $med_name = $rows['product_name'];
                                  echo "<option value='$med_name'>$med_name</option>";
                                }
                              ?>

                            </select>
                  </div>

              <div class="form-group col-md-3 button_block pt-4 mt-4">
              <input type="Number" class="form-control" name="med_quantity" id="med_quantity1" placeholder="quantity" min="1">
              </div>
            </div>   
      
            <!-- === CLONE FORM 2 -->
            <div id="cloneform" class="form-row">
                  <div class="form-group col-md-7 ">
                    <label>Order</label>
                          <select  id="inlineFormCustomSelect2" name="medicineName_2" data-live-search="true" 
                          class="mt-5">
                              <option selected>Choose...</option>
                              <?php 
                                 $server ="sql113.epizy.com";
                                 $username="epiz_32035199";
                                 $password="wmWJiyCBCG";
                                 $dbname="epiz_32035199_inventorymanagement";
                                 
                                 $mysqli_md = new mysqli($server, $username,$password, $dbname);
                                $medicine_list = $mysqli_md->query('SELECT product_name FROM product');

                                while($rows = $medicine_list->fetch_assoc()){
                                  $med_name = $rows['product_name'];
                                  echo "<option value='$med_name'>$med_name</option>";
                                }
                              ?>

                            </select>
                  </div>

              <div class="form-group col-md-3 button_block pt-4 mt-4">
              <input type="Number" class="form-control" name="med_quantity_2"  id="med_quantity2" placeholder="quantity" min="1">
              </div>
            </div>   

            <!-- === CLONE FORM 3 -->
            <div id="cloneform" class="form-row">
                  <div class="form-group col-md-7 ">
                    <label>Order</label>
                          <select  id="inlineFormCustomSelect3" name="medicineName_3" data-live-search="true" 
                          class="mt-5">
                              <option selected>Choose...</option>
                              <?php 
                                $server ="sql113.epizy.com";
                                $username="epiz_32035199";
                                $password="wmWJiyCBCG";
                                $dbname="epiz_32035199_inventorymanagement";
                                
                                $mysqli_md = new mysqli($server, $username,$password, $dbname);
                                $medicine_list = $mysqli_md->query('SELECT product_name FROM product');

                                while($rows = $medicine_list->fetch_assoc()){
                                  $med_name = $rows['product_name'];
                                  echo "<option value='$med_name'>$med_name</option>";
                                }
                              ?>

                            </select>
                  </div>

              <div class="form-group col-md-3 button_block pt-4 mt-4">
              <input type="Number" class="form-control" name="med_quantity_3"  id="med_quantity3" placeholder="quantity" min="1">
              </div>
            </div>   

            <!-- === CLONE FORM 4 -->
            <div id="cloneform" class="form-row">
                  <div class="form-group col-md-7">
                    <label>Order</label>
                          <select  id="inlineFormCustomSelect4" name="medicineName_4" data-live-search="true" 
                          class="mt-5">
                              <option selected>Choose...</option>
                              <?php 
                                $server ="sql113.epizy.com";
                                $username="epiz_32035199";
                                $password="wmWJiyCBCG";
                                $dbname="epiz_32035199_inventorymanagement";
                                
                                $mysqli_md = new mysqli($server, $username,$password, $dbname);
                                $medicine_list = $mysqli_md->query('SELECT product_name FROM product');

                                while($rows = $medicine_list->fetch_assoc()){
                                  $med_name = $rows['product_name'];
                                  echo "<option value='$med_name'>$med_name</option>";
                                }
                              ?>

                            </select>
                  </div>

              <div class="form-group col-md-3 button_block pt-4 mt-4">
              <input type="Number" class="form-control" name="med_quantity_4"  id="med_quantity4" placeholder="quantity" min="1">
              </div>
            </div>   

            <!-- === CLONE FORM 5 -->
            <div id="cloneform" class="form-row">
                  <div class="form-group col-md-7">
                    <label>Order</label>
                          <select  id="inlineFormCustomSelect5" name="medicineName_5" data-live-search="true" 
                          class="mt-5">
                              <option selected>Choose...</option>
                              <?php
                                $server ="sql113.epizy.com";
                                $username="epiz_32035199";
                                $password="wmWJiyCBCG";
                                $dbname="epiz_32035199_inventorymanagement";
                                
                                $mysqli_md = new mysqli($server, $username,$password, $dbname);
                                $medicine_list = $mysqli_md->query('SELECT product_name FROM product');

                                while($rows = $medicine_list->fetch_assoc()){
                                  $med_name = $rows['product_name'];
                                  echo "<option value='$med_name'>$med_name</option>";
                                }
                              ?>

                            </select>
                  </div>

              <div class="form-group col-md-3 button_block pt-4 mt-4">
              <input type="Number" class="form-control" name="med_quantity_5"  id="med_quantity5" placeholder="quantity" min="1">
              </div>
            </div>   


      
          <div class="form-group col-md-12 button_block">
            <input type="submit" class="btn btn-success font-weight-bolder text-white submit_button" name="c_submit" id="Msubmit" vlue="Submit">
          </div>

   </form> 
</div>

<!-- =============== Modal for logging out notification ========= -->
<div class="modal-2" id="modal">
    <div class="modal-Notification-body">
        <h3>Logging Out</h3>
        <p>are you sure you want to logout?</p>
        <input type="button" 
               value="Cancel" 
               class="btn btn-danger btn-large"
               id="Cancel";>
               
        <button type="button" 
               value="Confirm" 
               class="btn btn-primary btn-large"><a href="./index.php">Confirm</a></button>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="./js/main.js">
</script>
</body>
</html>