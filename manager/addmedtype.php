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
  $med_type=mysqli_real_escape_string($db, $_POST['Medtype_name']);
  
    $query = "INSERT INTO `med type` (`Medicine Type`) 
  			  VALUES('$med_type')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: Medicine Type.php');
  
}
?>