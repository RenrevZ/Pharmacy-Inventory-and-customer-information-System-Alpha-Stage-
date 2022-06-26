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
 <div class="sideNav">
    <header>
    <a href="#"></i></a><i class="bi bi-person-circle logo"></i>
    <!-- ==== Echoed out the Full name of the User === -->
    <h5><?php echo $_SESSION['first_name']; ?>&nbsp<span><?php echo $_SESSION['last_name'];?></span></h5>
</header>
   <ul>
   <li><a href="./dashboard.php"  class="button"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
    <li> <a href="./Medicine List.php"  class="button"><i class="bi bi-list-ul" ></i> Medicine list</a></li>
    <li><a href="./Settings.php"  class="button"><i class="bi bi-gear-fill"></i></i> Settings</a></li>
    <li><a href="#" class="button bg-danger" id="modalBtn"><i class="bi bi-box-arrow-in-left" ></i> Logout</a></li>
</ul>
</div>

<!-- ==== Form for Inputing Password ==========-->
<div class="main">
    <header>
        <h1><i class="bi bi-gear-fill text-primary"></i></i> <span class="text-danger font-weight-bold"> OPTIONS </span></h1>
    </header>
    <form action="Server2mngr.php" method="post">
        <div class="form-row">
        <!-- Error Message before Changing password-->
        <?php if (isset($_GET['error'])) { ?>
         <div class="alert alert-danger ml-5 alert-dismissible fade show" 
              role="alert"  id="error">
         <strong>ERROR!! </strong><?php echo $_GET['error']; ?>
           <button type="button" 
                   class="close" 
                   data-dismiss="alert" 
                   aria-label="Close">
            <span  aria-hidden="true">&times;</span>
             </button>
             </div>
     	   <?php } ?>
        <!-- ===== Success Message After Changing password == -->
     	<?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success ml-5 alert-dismissible fade show" 
             role="alert" id="success">
         <strong>Success!! </strong><?php echo $_GET['success']; ?>
           <button type="button" 
                   class="close" 
                   data-dismiss="alert" 
                   aria-label="Close">
            <span  aria-hidden="true">&times;</span>
             </button>
             </div>
        <?php } ?>

            <div class="form-group col-md-10 ml-5">
              <label for="pass">Current Password</label>
              <input type="password" 
                     class="form-control" 
                     name="currentPassword"
                     id="currentPassword"
                     placeholder="Current Password"
                     pattern=".{8,}" 
                     title="8 characters minimum">
            </div>
            <div class="form-group col-md-10 ml-5">
                <label for="pass">New Password</label>
                <input type="password" 
                       class="form-control" 
                       name="newPassword"
                       id="newPassword"
                       placeholder="New Password" 
                       pattern=".{8,}" 
                       title="8 characters minimum">
              </div>
              <div class="form-group col-md-10 ml-5">
                <label for="pass">Confirm Password</label>
                <input type="password" class="form-control" 
                       name="confirmPassword"
                       id="confirmPassword"
                       placeholder="Confirm Password" 
                       pattern=".{8,}" 
                       title="8 characters minimum">
                <input type="submit" class="btn btn-bumit btn-btn-md btn-primary mt-4" 
                name="submit" value="Save Changes">
              </div>
        </div>
    </form>
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

let error = document.getElementById('error');
let success = document.getElementById('success');

setTimeout(()=> error.style.display='none',2000);
setTimeout(()=> success.style.display='none',2000);
</script>
</body>
</html>