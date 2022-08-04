<?php
include'connection.php';
include'sidebar.php';
?>
<div id ="content">
<h1><a href="addsup.php">Add supplier</a></h1>
<table border = "2 " colspace = "7" colspadding = "4">
    <tr>
        <th>Supplier_id</th>
        <th>Compnay name</th>
        <th>Address</th>
        <th>Phone no</th>
        <th colspan ="2" > Action </th>
    </tr>
    <div>
<?php
$query = "SELECT Supplier_id, Company_name, Address, Phone FROM supplier";
$result= mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
    echo '<tr>';
    echo '<td>'. $row['Supplier_id']. '</td>';
    echo '<td>'. $row['Company_name']. '</td>';
    echo '<td>'. $row['Address']. '</td>';
    echo '<td>'. $row['Phone']. '</td>';
    echo '<td><a href ="appsup.php?action=edit&id=$row[Supplier_id]&Company_name=$row[]">Edit</td>';
    echo '<td><a href ="delsup.php">Delete</td>';
    
echo "</tr>";    
}
?>
</table>
