<?php 
// == initialized variable
$customer_name="";
$customer_Address ="";
// == connect to database
$server ="sql113.epizy.com";
$username="epiz_32035199";
$password="wmWJiyCBCG";
$dbname="epiz_32035199_inventorymanagement";

$db = mysqli_connect($server, $username,$password, $dbname);
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    
   // == ADDING CUSTOMER
    if (isset($_POST['c_submit'])) {
        // receive all input values from the form
        $customer_name=mysqli_real_escape_string($db, $_POST['Customer_name']);
        $customer_Age=mysqli_real_escape_string($db, $_POST['Customer_Age']);
        $customer_Gender=mysqli_real_escape_string($db, $_POST['Gender_select']);
        $customer_Address =mysqli_real_escape_string($db, $_POST['Customer_Address']);
        
        //Getting the post value of every input field name
        $customer_items =mysqli_real_escape_string($db, $_POST['medicineName']);
        $customer_items_quantity =mysqli_real_escape_string($db, $_POST['med_quantity']);

        $customer_items_2 =mysqli_real_escape_string($db, $_POST['medicineName_2']);
        $customer_items_quantity_2 =mysqli_real_escape_string($db, $_POST['med_quantity_2']);

        $customer_items_3 =mysqli_real_escape_string($db, $_POST['medicineName_3']);
        $customer_items_quantity_3 =mysqli_real_escape_string($db, $_POST['med_quantity_3']);

        $customer_items_4 =mysqli_real_escape_string($db, $_POST['medicineName_4']);
        $customer_items_quantity_4 =mysqli_real_escape_string($db, $_POST['med_quantity_4']);

        $customer_items_5 =mysqli_real_escape_string($db, $_POST['medicineName_5']);
        $customer_items_quantity_5 =mysqli_real_escape_string($db, $_POST['med_quantity_5']);

      
          
       

            mysqli_query($db, "INSERT INTO customer (name,gender,address,Age,items,quantity,items_2,quantity_2,items_3,quantity_3,items_4,quantity_4,items_5,quantity_5) 
            VALUES('$customer_name','$customer_Gender',' $customer_Address',' $customer_Age','$customer_items','$customer_items_quantity','$customer_items_2','$customer_items_quantity_2','$customer_items_3','$customer_items_quantity_3','$customer_items_4','$customer_items_quantity_4','$customer_items_5','$customer_items_quantity_5')");

            // Updating the product values based on the data that is selected input
            mysqli_query($db,"UPDATE product SET quantity = quantity -$customer_items_quantity  WHERE product_name = '$customer_items'");
            mysqli_query($db,"UPDATE product SET quantity = quantity - $customer_items_quantity_2  WHERE product_name = '$customer_items_2'");
            mysqli_query($db,"UPDATE product SET quantity = quantity -$customer_items_quantity_3  WHERE product_name = '$customer_items_3'");
            mysqli_query($db,"UPDATE product SET quantity = quantity -$customer_items_quantity_4  WHERE product_name = '$customer_items_4'");
            mysqli_query($db,"UPDATE product SET quantity = quantity -$customer_items_quantity_5  WHERE product_name = '$customer_items_5'");
           
       
            header('location: Pharmacist.php');
      }

?>    

