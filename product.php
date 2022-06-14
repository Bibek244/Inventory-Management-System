<?php
   ini_set("display_errors", "1");
   error_reporting(E_ALL);
    include "connection.php";
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $name = $_POST['Name'];
        $QUANTITY = $_POST['QUANTITY'];
        $HAND = $_POST['ON_HAND'];
        $CATAGORY = $_POST['CATAGORY'];
        $query = "INSERT INTO `inventory` (`PRODUCT_ID`, `NAME`, `QUANTITY`, `ON_HAND`, `CATAGORY`, `DATE`) VALUES (NULL, '$name', '$QUANTITY', '$HAND', '$CATAGORY', current_timestamp())";
        $result = mysqli_query($con,$query);
        if((!$result)){
            echo "error" ;
        }
        else{
            echo "sucessfully completed query";
        }
    }
 
    ?>
    <form method = "post" >
        <label for = "Name">Product Name</label>
        <input type="text" name = "Name">
        <label for ="QUANTITY">Quantity</label>
        <input type="number" name = "QUANTITY" >
        <label for ="ON_HAND">ON_HAND </label>
        <input type="number" name ="ON_HAND" require>
        <label for ="CATAGORY">CATAGORY</label>
        <input type="text" name = "CATAGORY" require>
        <button type ="submit"> submit</button>
</form>
