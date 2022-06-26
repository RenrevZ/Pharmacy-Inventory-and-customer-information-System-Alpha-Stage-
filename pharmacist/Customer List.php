<?php include("server.php")?>
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
     <h5>Sales Staff</h5> 
</header>
   <ul>
   <li><a href="./Manager.php"  class="button"><i class="bi bi-person-plus-fill"></i> Add Customer</a></li>
   <li><a href="./Customer List.php"  class="button"><i class="bi bi-person-lines-fill" ></i> Customer List</a></li>
    <li><a href="#" class="button bg-danger" id="modalBtn"><i class="bi bi-box-arrow-in-left" ></i> Logout</a></li>
</ul>
</div>

<div class="main">
    <header>
        <h1><i class="bi bi-person-lines-fill text-primary" ></i></i> <span class="text-danger font-weight-bold"> CUSTOMER </span> <span class="text-success font-weight-bolder">INFORMATION</span></h1>
    </header>
    <div class="table_information">
        <table class="table w-100 table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">Age</th>
                <th scope="col">Purchase</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Purchase</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php 
               $server ="sql113.epizy.com";
               $username="epiz_32035199";
               $password="wmWJiyCBCG";
               $dbname="epiz_32035199_inventorymanagement";
               
               $connec = mysqli_connect($server, $username,$password, $dbname);
               $sql = "SELECT * FROM customer";
               $result = $connec->query($sql);
              $date = "SELECT `Date` FROM customer";
              $date_query = $connec->query($date);
             
              
            

					       $count=0;
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				    {       
                  $tmp = $date_query->fetch_assoc();
                  $date = $tmp['Date'];
                  $newdate = date("M d,Y h:i A",strtotime($date)); // converting the timestamp values
					         $count=$count+1;
                
              ?>
                  
                   
                  <tr>
                    <th><?php echo $count ?></th>
                      <th><?php echo $row["name"] ?></th>
                      <th><?php echo $row["gender"]  ?></th>
                      <th><?php echo $row["address"]  ?></th>
                      <th><?php echo $row["Age"]  ?></th>
                      <th>
                          <ul>
                            <li ><?php if($row["items"] == 'Choose...' || $row["items"] == null){
                              echo'<li class="d-none"></li>';
                            }else{
                              echo $row["items"];
                            }   ?></li>
                            <li><?php if($row["items_2"] == 'Choose...' || $row["items_2"] == null){
                               echo'<li class="d-none"></li>';
                            }else{
                              echo $row["items_2"];
                            }   ?></li>
                            <li><?php if($row["items_3"] == 'Choose...' || $row["items_3"] == null){
                               echo'<li class="d-none"></li>';
                            }else{
                              echo $row["items_3"];
                            }   ?></li>
                            <li ><?php if($row["items_4"] == 'Choose...' || $row["items_4"] == null){
                              echo'<li class="d-none"></li>';
                            }else{
                              echo $row["items_4"];
                            }   ?></li>
                            <li><?php if($row["items_5"] == 'Choose...' || $row["items_5"] == null){
                                echo'<li class="d-none"></li>';
                            }else{
                              echo $sum = $row["items_5"];
                            }   ?></li>
                          </ul>
                    </th>
                      <th>
                        
                        <ul>
                        <li><?php if($row["quantity"] ==0){
                          echo'<li class="d-none"></li>';
                        }else{
                          echo $row["quantity"];
                        }?></li>
                        <li><?php if($row["quantity_2"] == 0){
                          echo'<li class="d-none"></li>';
                        }else{
                          echo $row["quantity_2"];
                        } ?></li>
                        <li ><?php if($row["quantity_3"] ==0){
                            echo'<li class="d-none"></li>';
                        }else{
                          echo $row["quantity_3"];
                        };?></li>
                        <li><?php if($row["quantity_4"] ==0){
                            echo'<li class="d-none"></li>';
                        }else{
                          echo $row["quantity_4"];
                        };?></li>
                        <li ><?php if($row["quantity_5"] ==0){
                           echo'<li class="d-none"></li>';
                        }else{
                          echo  $row["quantity_5"];
                        }?></li>
                        <hr>
                        <li><strong>total: </strong><?php echo $sum =  $row["quantity"]  + $row["quantity_2"] + $row["quantity_3"] + $row["quantity_4"] + $row["quantity_5"]?>
                      </li>
                        </ul>
                      </th>
                      <th>
                        <ul>
                          <li><?php 
                          if($row["Total"] === 0){
                            echo'<li class="d-none"></li>';
                          }else{
                            echo 'P'.$row['Total'];
                          }
                          ?>
                          </li>
                          <li><?php 
                          if($row['total2'] == 0){
                            echo'<li class="d-none"></li>';
                          }else{
                            echo 'P'.$row['total2'];
                          }
                          ?></li>
                          <li><?php 
                          if($row['total3'] == 0){
                            echo'<li class="d-none"></li>';
                          }else{
                            echo 'P'.$row['total3'];
                          }
                          
                          ?></li>
                          <li><?php 
                          if($row['total4'] == 0){
                            echo'<li class="d-none"></li>';
                          }else{
                            echo 'P'.$row['total4'];
                          }
                          ?></li>
                          <li><?php 
                          if($row['total5'] == 0){
                            echo'<li class="d-none"></li>';
                          }else{
                            echo 'P'.$row['total5'];
                          }
                          ?></li>
                          <hr>
                          <li><strong>Total:</strong> <?php echo 'P'.$row['overall_total']?></li>
                        </ul>
                      </th>
                      <th><?php echo $newdate  ?></th>
                      <th>
                      <a href="deleteCustomer.php?id=<?php echo $row["ID"] ?>"><button class="btn btn-danger btn-md text-white">Delete <i class="bi bi-trash-fill"></i></th></button></a>
                  </tr>
                  
            <?php 
               
                 
                 }
               
               }
            
            ?>
            </tbody>
          </table>
    </div>
    
    <!-- =============== Modal for logging out notification ========= -->
<div class="C_LIST" id="modal">
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

<script src="./js/main.js"></script>


</script>
</body>
</html>