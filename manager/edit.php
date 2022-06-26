<?php

include('config.php');

if (isset($_POST['submit']))
{
$id=$_POST['id'];
$name=mysqli_real_escape_string($db, $_POST['product_name']);
$unit=mysqli_real_escape_string($db, $_POST['unit']);
$Type=mysqli_real_escape_string($db, $_POST['Type']);
$Categories=mysqli_real_escape_string($db, $_POST['categories']);
$price=mysqli_real_escape_string($db, $_POST['price']);
$quant=mysqli_real_escape_string($db, $_POST['quantity']);

mysqli_query($db,"UPDATE product SET product_name='$name', unit ='$unit', Type = '$Type', categories = '$Categories', price='$price' ,quantity='$quant' WHERE product_id='$id'");

header("Location:Medicine List.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM product WHERE product_id=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$id = $row['product_id'];
$name = $row['product_name'];
$unit = $row["Unit"];
$type= $row["Type"];
$categories = $row["categories"];
$price= $row["price"];
$quant=$row['quantity'];

}
else
{
echo "No results!";
}
}
?>


<html>
<head>
<title>Edit Item</title>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<style>
    .form_Edit{
        position:relative;
        top:230px;
        left:550px;
        width: 500px;
        box-shadow: 3px 3px 3px rgba(0,0,0,0.5)
    }
      ul{
        list-style:none;
        color:white;
        font-size:20px;
    }
    h1{
        margin:auto;
        margin-left:100px;
        color:white;
    }
</style>
<body>


<div class="form_Edit">
<div class="card bg-primary">
  <div class="card-header">
    <h1> Edit Records </h1>
  </div>
  <div class="card-body form-group">
  <form action="" method="post" action="edit.php">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <ul>
        <li>Item Name  <input type="text" 
                              class="form-control col-10" 
                              name="product_name" 
                              value="<?php echo $name; ?>" readonly/></li>
        <li>Unit <input type="number"  
                         class="form-control col-10" 
                         name="unit" 
                         value="<?php echo $unit ?>" readonly/></li>
        <li>Type <input type="text"  
                         class="form-control col-10" 
                         name="Type" 
                         value="<?php echo $type ?>" /></li>
        <li>Categories <input type="text"  
                         class="form-control col-10" 
                         name="categories" 
                         value="<?php echo $categories ?>" /></li>
        <li>Price <input type="number"  
                         class="form-control col-10" 
                         name="price" 
                         value="<?php echo $price ?>" /></li>
        <li>Quantity <input type="number"  
                            class="form-control col-10" 
                            name="quantity" 
                            value="<?php echo $quant;?>" /></li>
    </ul>
    <input type="submit" class="btn btn-success ml-3" name="submit" value="Save Changes">
  </div>
  </form>
</div>
</body>
</html>