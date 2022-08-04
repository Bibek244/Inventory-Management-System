<?php
require'connection.php'; 
$query = "SELECT NAME FROM inventory ";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
?>
<?= $row['NAME']?>
<?php
}
?>
