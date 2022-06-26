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
        <h1><i class="bi bi-card-list"></i>  <span class="text-danger font-weight-bold"> MEDICINE</span> <span class="text-success font-weight-bolder">CATEGORY</span></h1>
    </header>
    <div class="form_button">
        <form method="POST" action="addmedcategory.php">
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="Brand">Medicine Category</label>
                  <input type="text" 
                         class="form-control" 
                         name="Medtype_Category" 
                         placeholder="Add Medicine Category">
                </div>
                <div class="form-group col-md-5">
                    <button type="submit" class="btn btn-btn-md btn-primary mt-4" name="add">Add <i class="bi bi-plus-circle"></i></button>
                </div>
        </form>
               
    </div>
    <div class="table_information w-75">
        <table class="table">
            <thead class="thead-dark">
              <tr>
              <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $server ="sql113.epizy.com";
              $username="epiz_32035199";
              $password="wmWJiyCBCG";
              $dbname="epiz_32035199_inventorymanagement";
              
              $conn = new mysql($server, $username,$password, $dbname);
               $sql = "SELECT * FROM med_category";
               $result = $conn->query($sql);
					       $count=0;
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				 {           
					          $count=$count+1;
                   ?>
                  
                   
                  <tr id="myUL">
                    <th><?php echo $count ?></th>
                     <th><?php echo $row["Medicine_Category"] ?></th>
					  
					  <th>
            <a href="delete_med_category.php?id=<?php echo $row["id"] ?>"><button class="btn btn-danger btn-md text-white">Delete <i class="bi bi-trash-fill"></i></button></a></th>
                    
                      
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