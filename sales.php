<?php
require 'connection.php'; 
require'session.php';
confirm_logged_in();
$query = "SELECT PRODUCT_ID,NAME FROM inventory";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$product = "<select id = 'product' >
<option  disabled> Select Product</option>";
while($row = mysqli_fetch_assoc($result)){
    $product .="<option  id = ".$row['PRODUCT_ID']." value =".$row['NAME'].">".$row['NAME']."</option>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
       .hiddenfield {
  opacity: 0;
  width: 0;
  float: left; /* Reposition so the validation message shows over the label */
}
    </style>
</head>
<body> 
    <table border = "2">
       <tr>
          <td><label for = "cutsomer">Customer</label></td>
    <td><label for ="product">Product</label>
    </td>
    <td><label for = "qty">Quantity</label> </td>
    <td>Price</td>
    <td> <button id = "add" > Add </button></td>
       </tr>
       <tr>
       <td><input type ="text"id ="customer" name = "customer" placeholder="customer"></td>   
       <td><?= $product?></td>
          <td> <input type = "number" min ="1" max ="9999999" id = "qty" ></td>
          <td id = "price"></td>
       </tr>
    </table>
    <div role="alert" id="errorMsg" class="mt-5" >
                 <!-- Error msg  -->
              </div>
    <div class = "container">
      
    <table id="receipt_bill" class="table"  border="2">
                        <thead>
                           <tr>
                              <th> No.</th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Total</th>
                           </tr>
                        </thead>
                        <tbody id="new" >
                          
                          </tbody>

                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           
                           <td class="text-right text-dark" >
                                <h5><strong>Sub Total:  RS </strong></h5>
                                <p><strong>Tax (13%) : RS </strong></p>
                           </td>
                           <td class="text-center text-dark" >
                              <h5> <strong><span id="subTotal"></strong></h5>
                              <h5> <strong><span id="taxAmount"></strong></h5>
                           </td>
                        </tr>
                        <tr >
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark">
                              <h5><strong>Gross Total: RS</strong></h5>
                           </td>
                           <td class="text-center text-danger">
                              <h5 id="totalPayment"><strong> </strong></h5>
                           </td>
                        </tr>
                     </table>
                 
                 
      <form id ="form" method = "POST" onsubmit="save()">
   <input type="text" id ="totalpay" oninvalid="this.setCustomValidity('Please add a product before submitting')"name="totalpayment"required class="hiddenfield" >
   <input type="hidden" id ="cus"  name="customer" required>
   <input type="hidden" id="sub" name="subtotal"  required>
   <input type="hidden" id="vat"  name="vat" required>
  
   <div id = "newitem">
      
   </div>
<input type = "submit" value ="Submit">    
   <button type ="reset" onclick="clicked()">Reset</button>  
</form>

 <script>
       //passing the variable to html from for php
      var pro = [];
      var qtyno = [];
      var prices = [];
 $('#product').change(function() {
   var id = $(this).find(':selected')[0].id;
       $.ajax ({
          url:"showsales.php",
          method:"POST",
         data:{
            id  :  id 
         }, 
         success:function(data){
            $("#price").html(data);
         }
       })
    });
  
//Add to cart
var count = 1;
$('#add').on('click',function(){
  var name = $('#product').val();
  var qty = $('#qty').val();
  var price =$('#price').text();
  var cus = $('#customer').val();
   
 
  if(pro.indexOf(name) !== -1){
   var erroMsg =  '<span class="alert alert-danger ml-5">Item already exist in cart to add please press reset and select desired quantity</span>';
      $('#errorMsg').html(erroMsg).stop(true, true).show().fadeOut(9000);
            }
            else{
   if (cus == ''){
      var erroMsg =  '<span class="alert alert-danger ml-5">Please fill the customer name</span>';
      $('#errorMsg').html(erroMsg).fadeOut(9000);
   }
   else{
      if(price ==''){
   var erroMsg =  '<span class="alert alert-danger ml-5">price cannot be null please select a product </span>';
      $('#errorMsg').html(erroMsg).fadeOut(9000);
  }
  else{
      if (qty == ''|| qty < 1){
         var erroMsg =  '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
         $('#errorMsg').html(erroMsg).fadeOut(9000);
      }
   
      else{
         pro.push(name);
         qtyno.push(qty);
         prices.push(price);   
            //product();
     billFunction();
  }
}
}
  function billFunction()
          {
            var total = 0;
         
            
  
 

  
        
          $("#receipt_bill").each(function () {
            
          var total =  price*qty;
          var subTotal = 0;
          subTotal += parseInt(total);
       
         
  
          
          var table =   '<tr><td>'+ count +'</td><td>'+ name + '</td><td>' + qty + '</td><td>' + price + '</td><td><strong><input type="hidden" id="total" value="'+total+'">' +total+ '</strong></td></tr>';
          $('#new').append(table)
 
           
            var total = 0;
            $('tbody tr td:last-child').each(function() {
                var value = parseInt($('#total', this).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });
             $('#subTotal').text(total);
               
   
              var Tax = (total * 13) / 100;
              $('#taxAmount').text(Tax.toFixed(2));
 
             // Code for Total Payment Amount
 
             var Subtotal = $('#subTotal').text();
             var taxAmount = $('#taxAmount').text();

             var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
             $('#totalPayment').text(totalPayment.toFixed(2)); 
             // code for form 
             document.getElementById("totalpay").value = totalPayment;
             document.getElementById("cus").value =  document.getElementById("customer").value
             document.getElementById("sub").value = Subtotal;
             document.getElementById("vat").value = taxAmount;
            });      
         count++;
        } 
      }
       });
      
       
       function clicked(){
         document.getElementById("new").innerHTML =null;
      count= 1;
      pro = [];
      qty = [];
      prices =[];
      return;
       }
       
      function save(){
         var form = document.getElementById("form"),
      data = new FormData(form);
     data.append("numofitems",count-1);
 for(i = 0; i< pro.length; i++){
    data.append("product[]", pro[i]);
    data.append("qty[]",qtyno[i]);
    data.append("price[]",prices[i]);
   }
   alert('<?php echo $_SESSION['responce']; ?>');
        
              
              fetch("add_sale.php", { method:"POST", body:data })
  .then(res=>res.text()).then((response) => {
    console.log(response);
    
  });
  return false;
      }
 </script>
</html>