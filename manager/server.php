
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
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// ==== REGISTER USER
if (isset($_POST['reg_user'])) {
  // ==== receive all input values from the form
  $first_name=mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name=mysqli_real_escape_string($db, $_POST['last_name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // === adding an alert if the password doesn't match
  if ($password_1 != $password_2) {
	array_push($errors, 
  "<div><span  class='alert alert-danger 
  alert-dismissible fade show' role='alert col-4'>
  <strong>ERROR!</strong> Password do not match
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</span></div>");
  }

  // ==== first check the database to make sure 
  // ==== a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM register WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // ==== if user exists
    if ($user['username'] === $username) {
      array_push($errors, "<div><span  class='alert alert-danger 
      alert-dismissible fade show' role='alert col-4'>
      <strong>ERROR!</strong> Username Already Exist
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </span></div>");
    }
  }

  // ==== register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);// ==== encrypt the password before saving in the database

  	$query = "INSERT INTO register (username,password_1,first_name,last_name) 
  			  VALUES('$username', '$password','$first_name','$last_name')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['first_name'] =$first_name;
	  $_SESSION['last_name'] =$last_name;
  	header('location: superuser.php');
  }
}

// ====== LOGIN USER
if(isset($_POST['submit']))
{
  
  //===== mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 
  
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if($username == 'adminsuperuser' || $username == 'adminsuperuser' && $password=='admin1234' || $password=='ADMIN1234'){
      header('location: superuser.php');
    }
  
    if (empty($username)) {
      array_push($errors, "<span  class='alert alert-danger 
      alert-dismissible fade show' role='alert col-4'>
      <strong>ERROR!</strong> Username is Required
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </span>");
    }
    if (empty($password)) {
      array_push($errors, "<div><span  class='alert alert-danger 
      alert-dismissible fade show' role='alert col-4'>
      <strong>ERROR!</strong> Password is Required
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </span></div>");
    }
    
    if (count($errors) == 0) 
    {
      $password = md5($password);
      if (md5($_POST['password']) !== $password)
{
    echo "Password is invalid";
}
$query = "SELECT * FROM register WHERE username='$username' AND password_1 ='$password'";
		
		
		
		
$sql="SELECT first_name,last_name FROM register WHERE username='$username' AND password_1 ='$password'";
$result=mysqli_query($db,$sql);  
$row=mysqli_fetch_assoc($result);



  $results = mysqli_query($db, $query);
  $res=mysqli_num_rows($results);
  if ($res) 
  {
    $_SESSION['username'] = $username;
    $_SESSION['first_name'] =$row["first_name"];

    $_SESSION['last_name'] =$row["last_name"];
        header('location: dashboard.php');
      }
      else 
      {
        array_push($errors, "<span class='text-dark'><strong>ERROR! </strong>Wrong username/password </span>");
      }
    }

    

   
  }
  ?>
  