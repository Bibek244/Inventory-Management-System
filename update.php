<?php
include'connection.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);
$PRODUCT_ID = $_GET['PRODUCT_ID'];
$NAME = $_GET['NAME'];
$QUANTITY= $_GET['QUANTITY'];
$ON_HAND= $_GET['ON_HAND'];
$CATAGORY= $_GET['CATAGORY'];
?>
<form method = "post" >
        <label for = "Name">Product Name</label>
        <input type="text" name = "Name" value ="<?php echo $NAME?>">
        <label for ="QUANTITY">Quantity</label>
        <input type="number" name ="QUANTITY" value =<?php echo $QUANTITY?>>
        <label for ="ON_HAND">ON_HAND </label>
        <input type="number" name ="ON_HAND" value ="<?php echo $ON_HAND?>">
        <label for ="CATAGORY">CATAGORY</label>
        <input type="text" name = "CATAGORY" value ="<?php echo $CATAGORY?>">
        <button type ="submit"> submit</button>
</form>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
$NAME = $_POST['Name'];
$QUANTITY= $_POST['QUANTITY'];
$ON_HAND= $_POST['ON_HAND'];
$CATAGORY= $_POST['CATAGORY'];
$query =  "UPDATE inventory  set NAME = '$NAME', QUANTITY = '$QUANTITY', ON_HAND = '$ON_HAND',CATAGORY = '$CATAGORY'  WHERE  PRODUCT_ID =$PRODUCT_ID";
$result = mysqli_query($con,$query);
if(!$result){
        echo "error".mysqli_error();
}
else{
        echo "<script>alert('sucess')</script>";
}
header("location:inventory.php");
}
?>