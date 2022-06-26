<?php 
    include('config.php');
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-d-m h:i A');
    $sales = "SELECT SUM(overall_total) FROM customer WHERE DATE(Date) = DATE(NOW())";
    $sales_data = mysqli_query($db,$sales);
    $row = mysqli_fetch_assoc($sales_data);
    
    $quantity = "SELECT SUM(quantity+quantity_2+quantity_3+quantity_4+quantity_5) FROM customer
    WHERE DATE(Date) = DATE(NOW())";
    $quantity_connect = mysqli_query($db,$quantity);
    $quantity_data = mysqli_fetch_assoc($quantity_connect);

    $customer = "SELECT name,gender,address,Age,overall_total FROM customer WHERE DATE(Date) = DATE(NOW())";
    $customer_connec = mysqli_query($db,$customer);

    

    
    

   
  
    