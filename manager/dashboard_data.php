<?php 
               $server ="sql113.epizy.com";
               $username="epiz_32035199";
               $password="wmWJiyCBCG";
               $dbname="epiz_32035199_inventorymanagement";
               
               $conn = mysqli_connect($server, $username,$password, $dbname);
               $sql = "SELECT * FROM product";
               $running_out_quant = "SELECT * FROM product WHERE quantity <=100";
               $user_count = "SELECT * FROM register";

               $result = $conn->query($sql);
               $quant = $conn->query($running_out_quant);
               $user_count_quant = $conn->query($user_count);

			   $count=0;
			   $count_quant=0;
               $count_user=0;
                
               if ($result -> num_rows >  0) {
                    //Counting the number of Medicine
                    while ($row = $result->fetch_assoc()) 
                    {
                        $count=$count+1;
                    
                    }
               }
               if ($quant -> num_rows >  0) {
                      //Counting the number of Medicine that is about to run out
                    while ($row_2 = $quant->fetch_assoc()) 
                    {
                        $count_quant=$count_quant+1;
                    }
               }
               if ($user_count_quant -> num_rows >  0) {
                    //Counting the number of Users
                    while ($row_3 = $user_count_quant->fetch_assoc()) 
                    {
                        $count_user=$count_user+1;
                    }
               }

?>