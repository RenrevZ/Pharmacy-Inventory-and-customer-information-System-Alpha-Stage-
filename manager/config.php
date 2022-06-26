<?php

$server ="sql113.epizy.com";
$username="epiz_32035199";
$password="wmWJiyCBCG";
$dbname="epiz_32035199_inventorymanagement";

$db = mysqli_connect($server, $username,$password, $dbname);
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>