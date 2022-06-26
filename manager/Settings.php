<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./bootstrap/bootstrap-icons-1.6.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<title>Pharmacy Inventory and Customer Information system</title>
</head>
<body>
 <div class="sideNav">
    <header>
    <a href="#"></i></a><i class="bi bi-person-circle logo"></i>
    <!--== echo the name of the manager ==--> 
     <h5><?php echo $_SESSION['first_name']; ?>&nbsp<span><?php echo $_SESSION['last_name'];?></span></h5>
    </header>
    
     <!--=== sideNav button for choosing ===-->
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
        <h1><i class="fa-solid fa-chart-line"></i><span class="text-danger font-weight-bold">Settings</span> <span class="text-success font-weight-bolder">PAGE</span></h1>
    </header>
<div class="wrapper-b">
    
        <div class="Medicine-column">
            <div class="card text-white">
                <div class="card-body">

                    <a href="./options.php" class="text-white"><div class="medicine-count d-flex mb-2">
                    <i class="bi bi-gear-fill text-white"></i>
                        <h4>Change Password</h4>
                    </div></a>

                </div>
            </div>
        </div>
        <div class="Medicine-column">
            <div class="card text-white">
                <div class="card-body">

                <a href="./CreateAcc.php" class="text-white"><div class="medicine-count d-flex mb-2">
                    <i class="bi bi-person-plus-fill text-white"></i>
                        <h4>Register new manager</h4>
                    </div></a>

                </div>
            </div>
        </div>

       
    
</div>

<!-- =============== Modal for logging out notification ========= -->
<div class="Dash_M" id="modal">
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