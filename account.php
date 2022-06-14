<?php
include 'connection.php';
?>
<table border ="2" cellspacing ="7"padding ="2">
    <thead>
        <tr>
            <th>user</th>
            <tr>
</thead>
<tbody>
<?php
    $sql = 'SELECT username FROM login';
    $result = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $row['username']. '</td>';
echo "</tr>";    
}
    ?>
    </tbody>
</table>