
<?php
// == connect to database
$errors = array();
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

      

        // Selecting the first quantity in input 
        $Quantity_sql = "SELECT quantity FROM product WHERE product_name = '$customer_items'";
        $Quant_result = mysqli_query($db,$Quantity_sql);
        $quant_Check = mysqli_num_rows($Quant_result);

        // Selecting the second quantity in input
        $Quantity_sql_2 = "SELECT quantity FROM product WHERE product_name = '$customer_items_2'";
        $Quant_result_2 = mysqli_query($db,$Quantity_sql_2);
        $quant_Check_2 = mysqli_num_rows($Quant_result_2);

        // Selecting the third quantity in input
        $Quantity_sql_3 = "SELECT quantity FROM product WHERE product_name = '$customer_items_3'";
        $Quant_result_3 = mysqli_query($db,$Quantity_sql_3);
        $quant_Check_3 = mysqli_num_rows($Quant_result_3);

         //Selecting the fourth quantity in input
         $Quantity_sql_4 = "SELECT quantity FROM product WHERE product_name = '$customer_items_4'";
         $Quant_result_4 = mysqli_query($db,$Quantity_sql_4);
         $quant_Check_4 = mysqli_num_rows($Quant_result_4);

         //Selecting the fourth quantity in input
         $Quantity_sql_5 = "SELECT quantity FROM product WHERE product_name = '$customer_items_5'";
         $Quant_result_5 = mysqli_query($db,$Quantity_sql_5);
         $quant_Check_5 = mysqli_num_rows($Quant_result_5);

         // Getting price of all selected item
         $item_select = "SELECT price FROM product WHERE product_name='$customer_items'";
         $item_query = mysqli_query($db,$item_select);
         $item_check = mysqli_fetch_assoc($item_query);
         

         $item_select2 = "SELECT price FROM product WHERE product_name='$customer_items_2'";
         $item_query2 = mysqli_query($db,$item_select2);
         $item_check2 = mysqli_fetch_assoc($item_query2);
         
        
         $item_select3 = "SELECT price FROM product WHERE product_name='$customer_items_3'";
         $item_query3 = mysqli_query($db,$item_select3);
         $item_check3 = mysqli_fetch_assoc($item_query3);
         

         $item_select4 = "SELECT price FROM product WHERE product_name='$customer_items_4'";
         $item_query4 = mysqli_query($db,$item_select4);
         $item_check4 = mysqli_fetch_assoc($item_query4);
        

         $item_select5 = "SELECT price FROM product WHERE product_name='$customer_items_5'";
         $item_query5 = mysqli_query($db,$item_select5);
         $item_check5 = mysqli_fetch_assoc($item_query5);
        
         
         
        

       
        // Conditional for first product selection
        if($quant_Check > 0){
            $row = mysqli_fetch_assoc($Quant_result);
            $current_stock_quantity = $row['quantity'];

            if($current_stock_quantity <= 0 ){
              header("Location: Manager.php?error=".$customer_items." is out of Stock therefore can't make a sale on this product");
              exit();
            }
            elseif($current_stock_quantity <  $customer_items_quantity){
              header("Location: Manager.php?error=".$customer_items." quantity is higher than the stocks quantity please lower the quantity or select new product");
              exit();
            }
            else{

              $price_item = $item_check['price'];
              $price_total_1 = $price_item * $customer_items_quantity;
              if(!empty($customer_items_quantity_2)){
              $price_item2 = $item_check2['price'];
              $price_total_2 = $price_item2 * $customer_items_quantity_2;
              }
              if(!empty($customer_items_quantity_3)){
              $price_item3 = $item_check3['price'];
              $price_total_3 = $price_item3 * $customer_items_quantity_3;
              }
              if(!empty($customer_items_quantity_4)){
              $price_item4 = $item_check4['price'];
              $price_total_4 = $price_item4 * $customer_items_quantity_4;
              }
              if(!empty($customer_items_quantity_5)){
              $price_item5 = $item_check5['price'];
              $price_total_5 = $price_item5 * $customer_items_quantity_5;
              }
              if($customer_items_quantity_2 === 0 || $customer_items_quantity_2 === null){
                $overall = $price_total_1;
              }elseif($customer_items_quantity_3 === 0 || $customer_items_quantity_3 === null){
                $overall = $price_total_1 + $price_total_2;
              }elseif($customer_items_quantity_4 === 0 || $customer_items_quantity_4 === null){
                $overall = $price_total_1 + $price_total_2 + $price_total_3;
              }elseif($customer_items_quantity_5 === 0 || $customer_items_quantity_5 === null){
                $overall = $price_total_1 + $price_total_2 + $price_total_3 + $price_total_4;
              }else{
                $overall = $price_total_1 + $price_total_2 + $price_total_3 + $price_total_4 + $price_total_5;
              }
              mysqli_query($db, "INSERT INTO customer (name,gender,address,Age,items,quantity,items_2,quantity_2,items_3,quantity_3,items_4,quantity_4,items_5,quantity_5,
              Total,total2,total3,total4,total5,overall_total)
              VALUES('$customer_name','$customer_Gender',' $customer_Address',' $customer_Age','$customer_items','$customer_items_quantity','$customer_items_2','$customer_items_quantity_2','$customer_items_3','$customer_items_quantity_3','$customer_items_4','$customer_items_quantity_4','$customer_items_5','$customer_items_quantity_5',
              '$price_total_1','$price_total_2','$price_total_3','$price_total_4','$price_total_5','$overall')");
                $deduct_quant=mysqli_query($db,"UPDATE product SET quantity = quantity -$customer_items_quantity  WHERE product_name = '$customer_items'");
            }
        }

        // Conditional for Second product selection
        if($quant_Check_2 > 0){
            $row_2 = mysqli_fetch_assoc($Quant_result_2);
            $current_stock_quantity_2 = $row_2['quantity'];

            if($current_stock_quantity_2 <= 0 ){
              header("Location: Manager.php?error=".$customer_items_2." is out of Stock therefore can't make a sale on this product");
              exit();
            }
            elseif($current_stock_quantity_2 <  $customer_items_quantity_2){
              header("Location: Manager.php?error=".$customer_items_2." quantity is higher than the stocks quantity please lower the quantity or select new product");
              exit();
            }
            else{
              $price_item2 = $item_check2['price'];
              $price_total_2 = $price_item2 * $customer_items_quantity_2;
              $overall = $price_total_1 + $price_total_2;
                $deduct_quant_2=mysqli_query($db,"UPDATE product SET quantity = quantity -$customer_items_quantity_2  WHERE product_name = '$customer_items_2'");
            }
        }

        // Conditional for third product selection
        if($quant_Check_3 > 0){
            $row_3 = mysqli_fetch_assoc($Quant_result_3);
            $current_stock_quantity_3 = $row_3['quantity'];

            if($current_stock_quantity_3 <= 0 ){
              header("Location: Manager.php?error=".$customer_items_3." is out of Stock therefore can't make a sale on this product");
              exit();
            }
            elseif($current_stock_quantity_3 <  $customer_items_quantity_3){
              header("Location: Manager.php?error=".$customer_items_3." quantity is higher than the stocks quantity please lower the quantity or select new product");
              exit();
            }
            else{
              $price_item3 = $item_check3['price'];
              $price_total_3 = $price_item3 * $customer_items_quantity_3;
              $overall = $price_total_1 + $price_total_2 + $price_total_3;
                $deduct_quant_3=mysqli_query($db,"UPDATE product SET quantity = quantity -$customer_items_quantity_3  WHERE product_name = '$customer_items_3'");
            }
        }

        // Conditional for fourth product selection
        if($quant_Check_4 > 0){
            $row = mysqli_fetch_assoc($Quant_result_4);
            $current_stock_quantity_4 = $row['quantity'];

            if($current_stock_quantity_4 <= 0 ){
              header("Location: Manager.php?error=".$customer_items_4." is out of Stock therefore can't make a sale on this product");
              exit();
            }
            elseif($current_stock_quantity_4 <  $customer_items_quantity_4){
              header("Location: Manager.php?error=".$customer_items_4." quantity is higher than the stocks quantity please lower the quantity or select new product");
              exit();
            }
            else{
              $price_item4 = $item_check4['price'];
              $price_total_4 = $price_item4 * $customer_items_quantity_4;
              $overall = $price_total_1 + $price_total_2 + $price_total_3 + $price_total_4;
                $deduct_quant_4=mysqli_query($db,"UPDATE product SET quantity = quantity -$customer_items_quantity_4  WHERE product_name = '$customer_items_4'");
            }
        }

        // Conditional for fifth product selection
        if($quant_Check_5 > 0){
            $row_5 = mysqli_fetch_assoc($Quant_result_5);
            $current_stock_quantity_5 = $row['quantity'];

            if($current_stock_quantity_5 <= 0 ){
              header("Location: Manager.php?error=".$customer_items_5." is out of Stock therefore can't make a sale on this product");
              exit();
            }
            elseif($current_stock_quantity_5 <  $customer_items_quantity_5){
              header("Location: Manager.php?error=".$customer_items_5." quantity is higher than the stocks quantity please lower the quantity or select new product");
              exit();
            }
            else{
              $price_item5 = $item_check5['price'];
              $price_total_5 = $price_item5 * $customer_items_quantity_5;
              $overall = $price_total_1 + $price_total_2 + $price_total_3 + $price_total_4 + $price_total_5;
                $deduct_quant_5=mysqli_query($db,"UPDATE product SET quantity = quantity -$customer_items_quantity_5  WHERE product_name = '$customer_items_5'");
            }
        }
        
     
        header("location: Manager.php");
      }

?>    

