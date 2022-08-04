<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

require'connection.php';
include 'sidebar.php';
require'session.php';
confirm_logged_in() ;
?>
<div id="content">
<table border ="2" cellspacing ="7"padding ="2">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Cost Price</th>
            <th>Selling Price</th>
            <th>Category</th>
            <th>Date Stock In</th>
            <th colspan ="2">Action</th>
            <tr>
</thead>
<tbody>
    <?php
    $sql = 'SELECT PRODUCT_ID, NAME, QUANTITY, cprice, sprice, CATAGORY, DATE FROM inventory';
    $result = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $row['PRODUCT_ID']. '</td>';
        echo '<td>'. $row['NAME'] . '</td>';
        echo '<td>' .$row['QUANTITY'] . '</td>';
        echo '<td>' . $row['cprice'] . '</td>';
        echo '<td>' . $row['sprice'] . '</td>';
        echo '<td>' . $row['CATAGORY'] . '</td>';
        echo '<td>' . $row['DATE'];
    
    echo "<td align = 'right'><button> <a href ='updateproduct.php?PRODUCT_ID=$row[PRODUCT_ID]&NAME=$row[NAME]&QUANTITY=$row[QUANTITY] &cprice=$row[cprice]&sprice=$row[sprice]&CATAGORY=$row[CATAGORY] '>Update/Edit</a></button></td>";
    echo "<td align = 'right'><button > <a  onclick =' return checkDelete()' href ='delete.php?PRODUCT_ID=$row[PRODUCT_ID]'>Delete</a></button></td> ";
echo "</tr>";    
}
    ?>
    </tbody>
</table>
</div>
<script>
    function checkDelete(){
        return confirm('Are you sure you want to delete this product from record');
    }
    </script>