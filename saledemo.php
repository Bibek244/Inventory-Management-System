<?php
require 'connection.php'; 
require'session.php';
confirm_logged_in();
$query = "SELECT PRODUCT_ID,NAME FROM inventory";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$product = "<select id = 'product' >
<option> Select Product</option>";
while($row = mysqli_fetch_assoc($result)){
    $product .="<option  id = ".$row['PRODUCT_ID']."value =".$row['NAME'].">".$row['NAME']."</option>";
}
$product .= "</select>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALES</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body> 
    <form action="add_sale.php" method = "POST">
    <input type="text" name = "customer" placeholder="Enter customer name">
    <a href ="javascript:void(0)" id = "add-btn"class = "add-more-form">add</a>
       <div class="main-from">
           <div class="row">
               <div class="col">
                   <div class="form-group">
                       <label for = "">product</label>
        
                       <?=$product?>
                   </div>
               </div>
               <div class="col">
                   <div class="form-group">
                       <label for = "">QTY</label>
                       <input type = "number" require>
                   </div>
               </div>
               <div class="col">
                   <div class="form-group">
                       <label for = "">Price</label>
                      
                      <input type="text" id="price" disabled>
                   </div>
               </div>
           </div>
       </div>
            
   
<button >submit</button>
    
    </form>     
   <script>
$('#product').change(function() {
   var id = $(this).find(':selected')[0].id;
       $.ajax ({
          url:"showsales.php",
          method:"POST",
         data:{
            id  :  id 
         }, 
         success:function(data){
             
            $("#price").val(data);
         }
       })
    });
   
    $.ajax ({
          url:"showproduct.php",
          method:"POST",
         datatype: "html", 
         success:function(data){
             
            $("#product").val(data);
         }
       })

   
</script>
</body>
</html>