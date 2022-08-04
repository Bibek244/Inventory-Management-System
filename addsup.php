<?php
include'connection.php';
?>
<div class ="form-container">
<form method ="POST">
    <label for = "company">Company name</label>
    <input type = "text" name = "company" required>
    <label for = "address">Address</label>
    <input type = "text" name = "address" required>
    <label for = "phone">Phone number</label>
    <input type = "tel" pattern = "[0-9]{3}[0-9]{4}[0-9]{3}" name ="phone"  required>
    <button type = "submit" >submit</button>
    <button type = "reset" >reset</button>
</form>
</div>
<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
   $company = $_POST['company'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];

   $query = "INSERT INTO `supplier` (`Supplier_id`, `Company_name`, `Address`, `Phone`) VALUES (NULL, '$company', '$address', '$phone');";
   $result = mysqli_query($con,$query);
   if(!$result){
       echo "error".mysqli_error($con);
   }
}


?>