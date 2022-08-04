<?php
include'connection.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);
$PRODUCT_ID = $_GET['PRODUCT_ID'];
$name = $_GET['NAME'];
$quantity = $_GET['QUANTITY'];
$cprice = $_GET['cprice'];
$sprice = $_GET['sprice'];
$catagory = $_GET['CATAGORY'];

if($PRODUCT_ID == NULL){
        header("location: inventory.php");
}
?>
<div class ="form-container">
<form method = "post" >
        <label for = "Name">Product Name</label>
        <input type="text" name = "Name" value ="<?php echo $name?>">
        <label for ="QUANTITY">Quantity</label>
        <input type="number" name ="QUANTITY" value =<?php echo $quantity?>>
        <label for ="cprice">Cost Price </label>
        <input type="number" name ="cprice" value ="<?php echo $cprice?>">
        <label for ="sprice">Selling Price</label>
        <input type="number" name ="sprice" value ="<?php echo $sprice?>">
        <label for ="CATAGORY">CATAGORY</label>
        <input type="text" name = "CATAGORY" value ="<?php echo $catagory?>">
        <button type ="submit"> submit</button>
</form>
</div>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
$NAME = $_POST['Name'];
$QUANTITY = $_POST['QUANTITY'];
$cprice = $_POST['cprice'];
$sprice = $_POST['sprice'];
$CATAGORY= $_POST['CATAGORY'];
$query =  "UPDATE inventory  set NAME = '$NAME', QUANTITY = '$QUANTITY', ON_HAND = '$ON_HAND',CATAGORY = '$CATAGORY'  WHERE  PRODUCT_ID =$PRODUCT_ID";
$result = mysqli_query($con,$query);
if(!$result){
        echo "error".mysqli_error($con);
}
else{
        echo "<script>alert('sucess')</script>";
}
header("location:inventory.php");
}
?>