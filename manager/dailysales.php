<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }

  include('dailysalesdata.php');
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
        <h1><i class="bi bi-list-ul text-primary" ></i> <span class="text-danger font-weight-bold"> Sales</span> <span class="text-success font-weight-bolder">Report</span></h1>
    </header>
    <div class="form_button">
        <form method="POST" action="dailysales.php">
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="Brand">Current Date</label>
                  <input type="date" 
                         class="form-control" 
                         name="current_date" 
                         placeholder="get current date">
                </div>
                <div class="form-group col-md-3">
                  <label for="Price">End Date</label>
                  <input type="date" 
                         class="form-control" 
                         name="end_date" 
                         placeholder="Add Unit">
                </div>
                <div class="form-group col-md-5">
                    <button type="submit" class="btn btn-btn-md btn-primary" id="show"name="addate">
                      Show purchase from these dates <i class="bi bi-plus-circle"></i></button>
                </div>
        </form>      
    </div>
    <?php
          if(isset($_POST['addate'])){
            $get_currentdt = $_POST['current_date'];
            $get_enddt = $_POST['end_date'];
            $newcurredate = date("M d,Y",strtotime($get_currentdt));
            $newendedate = date("M d,Y",strtotime($get_enddt));
           

            $getdate = mysqli_query($db,"SELECT SUM(overall_total),SUM(quantity+quantity_2+quantity_3+quantity_4+quantity_5)
            FROM customer WHERE (`Date` >='$get_currentdt' && `Date`<='$get_enddt')");
            $getcustomer = mysqli_query($db,"SELECT name,gender,address,Age,overall_total,Date FROM customer WHERE (`Date` >='$get_currentdt' && `Date`<='$get_enddt')");
            $rowdate = mysqli_fetch_assoc($getdate);
            
            ?>
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#purchaseModal">
            See all customer
            </button> 
            <h1 class="text-primary ml-5 mt-5"> Sales on <?php echo $newcurredate ?> TO  <?php echo $newendedate ?></h1>
           <div class="contain d-flex pl-5">
           <!-- ======== getting total Quantity sales =========== -->
           <div class="card text-white bg-success mb-3 mr-3" style="max-width: 22rem;">
           <div class="card-header">Total Quantity sales</div>
           <div class="card-body d-flex justify-content-evenly">
           <i class="bi bi-diagram-3 report mr-5"></i> <h1><?php  echo  $rowdate['SUM(quantity+quantity_2+quantity_3+quantity_4+quantity_5)']; ?></h1>
           </div>
         </div>
       
           <!-- ======== getting total Purchase sales =========== -->
           <div class="card text-white bg-danger mb-3" style="max-width: 22rem;">
           <div class="card-header">Total Purchse sales</div>
           <div class="card-body d-flex justify-content-evenly">
           <i class="bi bi-cash-coin report mr-5"></i><h1><?php echo 'P'.$rowdate['SUM(overall_total)']; ?></h1>
         </div>
       </div>
       </div>
        <!--==== Modal for data on every sales ====-->
<div class="modal fade"  data-keyboard="false"  id="purchaseModal">
   <div class="modal-dialog modal-lg">
        <div class="modal-content">
         <div class="modal-header">
              <h3 class="text-center text-primary">
                     Overall customer this<?php echo $newcurredate ?> TO  <?php echo $newendedate ?></h3>
            </div>           
                <div class="modal-body">
                <table class="table">
  <thead>
  <tr>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">Age</th>
                <th scope="col">Total Purchase</th>
                <th scope="col">Date</th>
              </tr>
  </thead>
  <tbody>

              <?php 
                  while($rowcustomer = mysqli_fetch_assoc($getcustomer)){
                    ?>
                  <tr>
                   <td><?php echo $rowcustomer["name"] ?></td>
                   <td><?php echo $rowcustomer["gender"] ?></td>
                   <td><?php echo $rowcustomer["address"] ?></td>
                   <td><?php echo $rowcustomer["Age"] ?></td>
                   <td><?php echo $rowcustomer["overall_total"] ?></td>
                   <td><?php 
                   $get_rowdate= $rowcustomer["Date"];
                   $new_rowdate = date("M d,Y",strtotime($get_rowdate)); 
                   echo $new_rowdate ?></td>
                  </tr>
                    <?php
                  }
              ?>
  </tbody>
</table>
                </div>  
              </div>
          </div>
      </div>
 </div>
</div>
       <?php

        }else{
          ?>
           <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#purchaseModal">
            See all customer
        </button> 
          <h1 class="text-primary ml-5 mt-5"> Sales Today <?php 
          $date = date('d-m-Y');
          $newdate = date("M d,Y",strtotime($date));
         ?></h1>
         <div class="contain d-flex pl-5">
         <!-- ======== getting total Quantity sales =========== -->
         <div class="card text-white bg-success mb-3 mr-3" style="max-width: 22rem;">
         <div class="card-header">Total Quantity sales</div>
         <div class="card-body d-flex justify-content-evenly">
         <i class="bi bi-diagram-3 report mr-5"></i> <h1><?php  echo $quantity_data['SUM(quantity+quantity_2+quantity_3+quantity_4+quantity_5)']; ?></h1>
         </div>
       </div>
     
         <!-- ======== getting total Purchase sales =========== -->
         <div class="card text-white bg-danger mb-3" style="max-width: 22rem;">
         <div class="card-header">Total Purchse sales</div>
         <div class="card-body d-flex justify-content-evenly">
         <i class="bi bi-cash-coin report mr-5"></i><h1><?php echo 'P'.$row['SUM(overall_total)']; ?></h1>
       </div>
     </div>
     </div>
     <!--==== Modal for data on every sales ====-->
<div class="modal fade"  data-keyboard="false"  id="purchaseModal">
   <div class="modal-dialog modal-lg">
        <div class="modal-content">
         <div class="modal-header">
              <h3 class="text-center text-primary">
                     Overall customer this day</h3>
            </div>           
                <div class="modal-body">
                <table class="table">
  <thead>
  <tr>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">Age</th>
                <th scope="col">Total Purchase</th>
              </tr>
  </thead>
  <tbody>

              <?php 
                  while($customer_data = mysqli_fetch_assoc($customer_connec)){
                    ?>
                  <tr>
                   <td><?php echo $customer_data["name"] ?></td>
                   <td><?php echo $customer_data["gender"] ?></td>
                   <td><?php echo $customer_data["address"] ?></td>
                   <td><?php echo $customer_data["Age"] ?></td>
                   <td><?php echo $customer_data["overall_total"] ?></td>
                  </tr>
                    <?php
                  }
              ?>
  </tbody>
</table>
                </div>  
              </div>
          </div>
      </div>
 </div>
</div>

     <?php
        }
    
    ?>
    
   


    
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
<script src="./js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>