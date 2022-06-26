<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
?>
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
 <div class="sideNav">
    <header>
    <a href="#"></i></a><i class="bi bi-person-circle logo"></i>
    <h5><?php echo $_SESSION['first_name']; ?>&nbsp<span><?php echo $_SESSION['last_name'];?></span></h5>
</header>
   <ul>
   <li><a href="./dashboard.php"  class="button"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
    <li> <a href="./Medicine List.php"  class="button"><i class="bi bi-list-nested"></i> Medicine list</a></li>
    <li> <a href="./Medicine Type.php"  class="button"><i class="bi bi-list-check"></i> Medicine Type</a></li>
    <li> <a href="./Medicine Category.php"  class="button"><i class="bi bi-card-list"></i>Med Category</a></li>
    <li> <a href="./dailysales.php"  class="button"><i class="bi bi-file-earmark-text"></i>Sales Report</a></li>
    <li><a href="./Settings.php"  class="button"><i class="bi bi-gear-fill"></i></i> Settings</a></li>
    <li><a href="#" class="button bg-danger" id="modalBtn"><i class="bi bi-box-arrow-in-left" ></i> Logout</a></li>
</ul>
</div>

<div class="main">
    <header>
        <h1><i class="bi bi-list-ul text-primary" ></i> <span class="text-danger font-weight-bold"> MEDICINE</span> <span class="text-success font-weight-bolder">LIST</span></h1>
    </header>
    <div class="form_button">
        <form method="POST" action="additem.php">
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="Brand">Brand</label>
                  <input type="text" 
                         class="form-control" 
                         name="product_name" 
                         placeholder="Add Medicine">
                </div>
                <div class="form-group col-md-3">
                  <label for="Price">Unit</label>
                  <input type="Number" 
                         class="form-control" 
                         name="unit" 
                         placeholder="Add Unit">
                </div>
                <div class="form-group col-md-3">
                <label for="medtype">Medicine Type</label>
                <select class="custom-select"  name="medicineType">
                     <option selected>Choose...</option>
                    </div>
                        <?php 
                          $server ="sql113.epizy.com";
                          $username="epiz_32035199";
                          $password="wmWJiyCBCG";
                          $dbname="epiz_32035199_inventorymanagement";
                          
                          $mysqli_md = new mysqli($server, $username,$password, $dbname);
                           $medicine_list = $mysqli_md->query('SELECT `Medicine Type` FROM `med type`');

                          while($rows = $medicine_list->fetch_assoc()){
                              $med_type = $rows['Medicine Type'];
                              echo "<option value='$med_type'>$med_type</option>";
                                }
                        ?>

                  </select>
                 </div>
                 <div class="form-group col-md-4">
                <label for="medtype">Medicine Category</label>
                <select class="custom-select"  name="medicineCategory">
                     <option selected>Choose...</option>
                        <?php 
                          $server ="sql113.epizy.com";
                          $username="epiz_32035199";
                          $password="wmWJiyCBCG";
                          $dbname="epiz_32035199_inventorymanagement";
                          
                          $mysqli_md = new mysqli($server, $username,$password, $dbname);
                           $medicine_list = $mysqli_md->query('SELECT Medicine_Category FROM med_category');

                          while($rows = $medicine_list->fetch_assoc()){
                              $med_category = $rows['Medicine_Category'];
                              echo "<option value='$med_category'>$med_category</option>";
                                }
                        ?>

                  </select>
                 </div>
                <div class="form-group col-md-3">
                  <label for="Quantity">Price</label>
                  <input type="number" 
                         class="form-control" 
                         name="price" 
                         placeholder="Add Price">
                </div>
                <div class="form-group col-md-2">
                  <label for="Quantity">Quantity</label>
                  <input type="number" 
                         class="form-control" 
                         name="quant" 
                         placeholder="Add Quantity">
                </div>
                <div class="form-group col-md-5">
                    <button type="submit" class="btn btn-btn-md btn-primary" name="add">Add <i class="bi bi-plus-circle"></i></button>
                </div>
        </form>
               
    </div>
    <nav aria-label="breadcrumb ">
           <ol class="breadcrumb w-75">
                         <?php 
                           $server ="sql113.epizy.com";
                           $username="epiz_32035199";
                           $password="wmWJiyCBCG";
                           $dbname="epiz_32035199_inventorymanagement";
                           
                           $mysqli_md = new mysqli($server, $username,$password, $dbname);
                           $medicine_list = $mysqli_md->query('SELECT Medicine_Category FROM med_category');
                      
                          while($rows = $medicine_list->fetch_assoc()){
                              $med_category = $rows['Medicine_Category'];
                              echo "<li class='breadcrumb-item'><a href='Medicine List.php?let=$med_category'> $med_category</a></li>";
                                }
                        ?>
           </ol>
      </nav>
    <div class="table_information w-75">
        <table class="table table-bordered text-sm">
            <thead class="thead-dark">
              <tr>
              <th scope="col">ID</th>
                <th scope="col">Brand</th>
                <th scope="col">Unit</th>
                <th scope="col">Type</th>
                <th scope="col">Categories</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php 
               $server ="sql113.epizy.com";
               $username="epiz_32035199";
               $password="wmWJiyCBCG";
               $dbname="epiz_32035199_inventorymanagement";
               
               $conn = new mysqli($server, $username,$password, $dbname);
               $sql = "SELECT * FROM product";
               if(isset($_GET['let'])){
                $let='';
                $let = $_GET['let'];
               
                if($_GET['let'] == $let){
                  $sql = "SELECT * FROM product WHERE categories='$let'";
                }
                else{
                  $sql = "SELECT * FROM product";
                }
              }
               $result = $conn->query($sql);
					       $count=0;
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				 {           
					          $count=$count+1;
                   ?>
                  
                   
                  <tr id="myUL">
                    <th><?php echo $count ?></th>
                     <th><?php echo $row["product_name"] ?></th>
                     <th><?php echo $row["Unit"]  ?></th>
                     <th><?php echo $row["Type"]  ?></th>
                     <th><?php echo $row["categories"]  ?></th>
                     <th><?php echo "P".$row["price"]  ?></th>
                     <th><?php echo $row["quantity"]  ?></th>
					  
					  <th><a href="edit.php?id=<?php echo $row["product_id"] ?> "><button class="btn_mdcedit btn btn-info btn-md mr-2 text-white">Edit <i class="bi bi-pencil-square"></i></button></a>
            <a href="delete.php?id=<?php echo $row["product_id"] ?>"><button class="btn btn-danger btn-md text-white">Delete <i class="bi bi-trash-fill"></i></button></a></th>
                    
                      
                    </tr>
                   
            <?php
                 
                 }
               }

            ?>
            </tbody>
          </table>
    </div>
    
    <!-- =============== Modal for logging out notification ========= -->
<div class="M_List" id="modal">
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

<script type="text/javascript">
//modal notification
var modal = document.getElementById("modal");
var modalBtn =document.getElementById("modalBtn");
var closeBtn = document.getElementById("Cancel");


// Opens the modal
modalBtn.onclick = function() {
    modal.style.display = "block";
}
// close the modal
closeBtn.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event){
    if(event.target == modal){
      modal.style.display = "none";
    }
}


</script>
</body>
</html>