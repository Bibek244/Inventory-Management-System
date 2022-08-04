<?php
include'connection.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);

$pid = $_GET["PRODUCT_ID"];
$query = "DELETE FROM inventory WHERE PRODUCT_ID ='$pid'";
$result = mysqli_query($con,$query);
if(!$result){
    echo "error".mysqli_error($con);
}
else{
    echo "<script>alert('The product has been deleted')</script>";
}
header("location:inventory.php");
?>