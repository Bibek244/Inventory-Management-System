<?php
   ini_set("display_errors", "1");
   error_reporting(E_ALL);
    include "connection.php";
    include 'sidebar.php';
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $name = $_POST['Name'];
        $QUANTITY = $_POST['QUANTITY'];
        $cprice= $_POST['cprice'];
        $sprice= $_POST['sprice'];
        $CATAGORY = $_POST['CATAGORY'];
        $query = "INSERT INTO `inventory` (`PRODUCT_ID`, `NAME`, `QUANTITY`, `cprice`,`sprice`, `CATAGORY`, `DATE`) VALUES (NULL, '$name', '$QUANTITY', '$cprice', '$sprice','$CATAGORY', current_timestamp())";
        $result = mysqli_query($con,$query);
        if((!$result)){
            echo "error".mysqli_error($con);
        }
        else{
            echo "sucessfully completed query";
        }
    }
 
    ?>
    <div id="content">
    <form method = "post" >
        <label for = "Name">Product Name</label>
        <input type="text" name = "Name">
        <label for ="QUANTITY">Quantity</label>
        <input type="number" name = "QUANTITY" >
        <label for ="cprice">Cost price </label>
        <input type="number" name ="cprice" require>
        <label for ="sprice">Selling price </label>
        <input type="number" name ="sprice" require>
        <label for ="CATAGORY">CATAGORY</label>
        <input type="text" name = "CATAGORY" require>
        <button type ="submit"> submit</button>
</form>
    </div>