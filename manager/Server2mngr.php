
<?php
session_start();

// === initializing variables
$username = "";

$errors = array();


// ==== connect to the database
$server ="sql113.epizy.com";
$username="epiz_32035199";
$password="wmWJiyCBCG";
$dbname="epiz_32035199_inventorymanagement";

$db = mysqli_connect($server, $username,$password, $dbname);


//===Getting the value that is inputed by user
if (isset($_POST['currentPassword']) && isset($_POST['newPassword'])
    && isset($_POST['confirmPassword'])) {

	function validate($data){
      $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    //=== Getting the value and put into variables
    $op = validate($_POST['currentPassword']);
	  $np = validate($_POST['newPassword']);
	  $c_np = validate($_POST['confirmPassword']);

    if(empty($op)){
        header("Location: options.php?error=Current Password is required");
        exit();
      }else if(empty($np)){
        header("Location: options.php?error=New password  does not match");
        exit();
      }else if($np !== $c_np){
        header("Location: options.php?error=New and Current password  does not match");
        exit();
      }else {
          // hashing the password
          $op = md5($op);
          $np = md5($np);
          $id = $_SESSION['username'];
  
          $sql = "SELECT password_1
                  FROM register WHERE 
                  username='$id' AND password_1='$op'";
          $result = mysqli_query($db, $sql);
          if(mysqli_num_rows($result) === 1){
              
              $sql_2 = "UPDATE register
                        SET password_1='$np'
                        WHERE username='$id'";
              mysqli_query($db, $sql_2);
              header("Location: options.php?success=Your password has been changed successfully");
	        exit();

  
          }else {
            header("Location: options.php?error=Incorrect password");
	        exit();
          }
  
      }
  
      
  }else{
      header("Location: options.php");
      exit();
  }



?>