<?php
include 'connection.php';
session_start();
unset($_SESSION['responce']);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $totalpayment = $_POST['totalpayment'];
    $subtotal = $_POST['subtotal'];
    $cus = $_POST['customer'];
    $vat= $_POST['vat'];
    $product =$_POST['product'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $numofitems =  $_POST['numofitems'];
    $transcation_code = date("mdGis");
    $date =date('Y-m-j');
    
   
   
  foreach($product as $item =>$product){
      $query = "INSERT INTO transaction_detail(TRANS_D_ID,PRODUCT,PRICE,QTY,EMPLOYEE,ROLE) 
    VALUES ('$transcation_code' , '$product' , '$price[$item]' , '$qty[$item]' , ' $_SESSION[FIRST_NAME]','$_SESSION[TYPE]')";
    $result = mysqli_query($con,$query) OR die(mysqli_error($con)) ;
  }
  $query = "INSERT INTO transaction(customer, numofitems,subtotal, vat, grandtotal, date,TRANS_D_ID) 
  VALUES ('$cus', '$numofitems','$subtotal', '$vat', '$totalpayment', ' $date','$transcation_code')";
  $result = mysqli_query($con,$query) ;

  if(!$result){
      die(mysqli_error($con));
      $_SESSION['responce'] = "failed";
  }
  else{
    $_SESSION['responce'] = "sucess";

  }
    }
    
?>
