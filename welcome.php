<?php
include'connection.php';
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    .border-left-primary {
  border-left: 0.25rem solid #4e73df !important;
}

.border-left-success {
  border-left: 0.25rem solid #1cc88a !important;
}

.border-left-info {
  border-left: 0.25rem solid #36b9cc !important;
}

.border-left-warning {
  border-left: 0.25rem solid #f6c23e !important;
}

.border-left-danger {
  border-left: 0.25rem solid #e74a3b !important;
}
    </style>
 
  </head>
  
<body>
<div id = "content">
<div class="container">



  <div class = "row show-grid g-2">
  
  <div class="col-md-3">
      <div class = "col-md-12 mb-3">
        <div class="card border-left-warning shadow">
            <div class = "card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-0">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Suppliers</div>
            <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM supplier";
                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                        
                      </div>
                        </div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                        
                        </div>
                        </div>
                        </div>
                        

                        <div class = "col-md-12 mb-3">
        <div class="card border-left-primary shadow">
            <div class = "card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-0">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Inventorys</div>
            <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM supplier";
                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                        
                      </div>
                        </div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                        
                        </div>
                        </div>
                        </div>
                       
                        </div>
                        
                        
              
          
        <div class= "col-md-3">
      <div class = "col-md-12 mb-3">
        <div class="card border-left-success shadow">
            <div class = "card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-0">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employees</div>
            <div class="h6 mb-0 font-weight-bold text-gray-800">
                       <?php 
                       $query = "SELECT COUNT(*) FROM employee";
                       $result = mysqli_query($con, $query) or die(mysqli_error($con));
                       while ($row = mysqli_fetch_array($result)) {
                           echo "$row[0]";
                         }
                       ?> Record(s)
                         </div>
                        </div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                        </div>
                        </div>
                        </div>
                        

                       
      <div class = "col-md-12 mb-3">
        <div class="card border-left-info shadow">
            <div class = "card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-0">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cashier Account</div>
            <div class="h6 mb-0 font-weight-bold text-gray-800">
                       <?php 
                       $query = "SELECT COUNT(*) FROM login WHERE TYPE_ID=2";
                       $result = mysqli_query($con, $query) or die(mysqli_error($con));
                       while ($row = mysqli_fetch_array($result)) {
                           echo "$row[0]";
                         }
                       ?> Record(s)
                         </div>
                        </div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        


                      <div class = col-md-3>
                      
      <div class = "col-md-12 mb-3">
        <div class="card border-left-primary shadow">
            <div class = "card-body ">
            <div class="row no-gutters align-items-center">
            <div class="col mr-0">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Products</div>
            <div class="h6 mb-0 font-weight-bold text-gray-800">
                       <?php 
                       $query = "SELECT COUNT(*) FROM inventory";
                       $result = mysqli_query($con, $query) or die(mysqli_error($con));
                       while ($row = mysqli_fetch_array($result)) {
                           echo "$row[0]";
                         }
                       ?> Record(s)
                         </div>
                        </div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                        </div>
                        </div>
                        </div>

                      <div class = "col-md-12 mb-3">
        <div class="card border-left-danger shadow">
            <div class = "card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-0">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Transaction</div>
            <div class="h6 mb-0 font-weight-bold text-gray-800">
                       <?php 
                       $query = "SELECT COUNT(*) FROM transaction";
                       $result = mysqli_query($con, $query) or die(mysqli_error($con));
                       while ($row = mysqli_fetch_array($result)) {
                           echo "$row[0]";
                         }
                       ?> Record(s)
                         </div>
                        </div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                        </div>
                        </div>
                        </div>

                        </div>
                        
                        
                        <!-- Recent product-->
                        
                        <div class="col-lg-3">
                    <div class="card shadow">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">

                          <div class="col-auto">
                            <i class="fa fa-th-list fa-fw"></i> 
                          </div>

                        <div class="card-heading"> Recent Products
                        </div>
                        <div class="row no-gutters align-items-center mt-1">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-0 text-gray-800">
                        <!-- /.panel-heading -->
                        
                        <div class="card-body">
                            <div class="list-group">
                              <?php 
                                $query = "SELECT NAME FROM inventory order by PRODUCT_ID DESC LIMIT 10";
                                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($result)) {

                                    echo "<a href='#' class='list-group-item text-gray-800'>
                                          <i class='fa fa-tasks fa-fw'></i> $row[0]
                                          </a>";
                                  }
                              ?>
                            </div>
                            <!-- /.list-group -->
                            <a href="inventory.php" class="btn btn-default btn-block">View All Products</a>
                        </div>
                        <!-- /.panel-body -->
                    </div></div></div></div></div></div>

                      </div>
                               
                        </div>
</div>

  </body>
  </html>