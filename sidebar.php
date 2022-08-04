<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    *{
          margin : 0;
          padding : 0;
          box-sizing : border-box;
          font-family : san-sarif;
          text-decoration: none ;
          
          list-style: none;
    }
   #content {

    padding-left : 270px;
   }


   
    .sidebar{
      position : fixed;
      left : 0;
      width : 250px;
      height : 100%; 
      background : #2C3A47;
    }
   .sidebar header{
      font-size: 22px;
      text-align: center;
      line-height: 75px;
      background: #32485e ;
      user-select: none;
      color: white;        
    }
.sidebar  ul a{
  display : block;
  width : 100%;
  height : 100%;
  line-height: 60px;
  padding-left: 40px;
  font-size : 20px;
  color: white;        
  box-sizing:border-box;
  border-top: 1px solid #97afc7;
  border-bottom: 1px solid black;
  transition: .4s;
}

ul li:hover a{
  padding-left:50px;
}

    
    </style>
</head>
<body>
  <div class="man_box">
    <div class="sidebar" id = "sidebar">
      <header>Inventory System</header>
      <ul>
        <li><a href ="inventory.php">Inventory</a></li>
        <li><a href ="welcome.php">Home</a></li>
        <li><a href ="#">Costomer</a></li>
        <li><a href ="employee.php"> Employee</a></li>
          <li><a href ="product.php">Product</a></li>
          <li><a href ="#">Transaction</a></li>
          <li><a href ="supplier.php">Supplier</a></li>
          <li><a href ="account.php">Accounts</a></li>
      </ul>
        </div>
        </div>
      </div>
</body>
</html>