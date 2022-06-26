<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php


// initializing variables
$item_name = "";
$item_price    = "";


// connect to the database
$server ="sql113.epizy.com";
$username="epiz_32035199";
$password="wmWJiyCBCG";
$dbname="epiz_32035199_inventorymanagement";

$db = mysqli_connect($server, $username,$password, $dbname);
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Add item
if (isset($_POST['add'])) {
  // receive all input values from the form
  echo "connect";
  $item_name=mysqli_real_escape_string($db, $_POST['product_name']);
  $item_unit=mysqli_real_escape_string($db, $_POST['unit']);
  $item_type=mysqli_real_escape_string($db, $_POST['medicineType']);
  $item_category=mysqli_real_escape_string($db, $_POST['medicineCategory']);
  $item_price=mysqli_real_escape_string($db, $_POST['price']);
  $quant=mysqli_real_escape_string($db, $_POST['quant']);
  
    $query = "INSERT INTO product (product_name,Unit,Type,categories,price,quantity) 
  			  VALUES('$item_name','$item_unit','$item_type','$item_category','$item_price','$quant')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: Medicine List.php');
  
}
?>
