<?php
require'connection.php';

include'sidebar.php';

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  
  <div id = "content">
    <div class="container">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transaction</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"width = "100%" id="dataTable"cellspacing="0" border = "2"> 
               <thead>
                   <tr>
                     <th width="19%">Transaction Number</th>
                     <th>Customer</th>
                     <th width="13%"># of Items</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>

            <?php                  
    $query = 'SELECT *
              FROM transaction 
              ORDER BY TRANS_D_ID ASC';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));
        
        while ($row = mysqli_fetch_assoc($result)) {
          
          echo '<tr>';
          echo '<td>'. $row['TRANS_D_ID'].'</td>';
          echo '<td>'. $row['customer'].'</td>';
          echo '<td>'. $row['numofitems'].'</td>';
          echo '<td align= "right">
          <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['tran_id'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
          </div> </td>';
          echo '</tr> ';
        }
        ?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
    
            </body>
            </html>
                