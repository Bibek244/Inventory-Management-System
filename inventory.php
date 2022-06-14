<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

include'connection.php';
?>
<table>
    <thead>
        <tr>
            <th>product id</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>On Hand</th>
            <th>Category</th>
            <th>Date Stock In</th>
            <th>Action</th>
            <tr>
</thead>
<tbody>
    <?php
    $sql = 'SELECT PRODUCT_ID, NAME, QUANTITY, ON_HAND, CATAGORY, DATE FROM inventory';
    $result = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $row['PRODUCT_ID']. '</td>';
        echo '<td>'. $row['NAME'] . '</td>';
        echo '<td>' .$row['QUANTITY'] . '</td>';
        echo '<td>' . $row['ON_HAND'] . '</td>';
        echo '<td>' . $row['CATAGORY'] . '</td>';
        echo '<td>' . $row['DATE'];
    
    echo '<td align = "right"><a type = "button">view</a></td>';
echo "</tr>";    
}
    ?>
    </tbody>
</table>
