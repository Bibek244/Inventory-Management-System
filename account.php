<?php
include 'connection.php';
include'sidebar.php';
?>
<div id="content">
<label for="admin_table">Admin account</label>
<table name = "admin_table" border ="2" cellspacing ="7"padding ="2">
    <thead>
    <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Type</th>
            <th>Action</th>
            <tr>
</thead>
<tbody>
<?php
    $sql = 'SELECT id,username,e.fname,e.lname,t.TYPE
    FROM login l
    join employee e ON e.Employe_Id =  l.Employe_Id
    join type t ON t.TYPE_ID = l.TYPE_ID
    WHERE l.TYPE_ID = 1';
    $result = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['fname'] .'&nbsp' .$row['lname'].'</td>';
        echo '<td>'. $row['username']. '</td>';
        echo '<td>'. $row['TYPE']. '</td>';
        echo"<td><a href ='account_searchfrm.php?action=edit&id=$row[id]'>Details</a>";
echo "</tr>";    
}
    ?>
    </tbody>
</table>
<label for="user_table">User account</label>
<a href = "addaccount.php"> Add account</a>
<table name = "user_table" border ="2" cellspacing ="7"padding ="2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Type</th>
            <th>Action</th>
            <tr>
</thead>
<tbody>
<?php
    $sql = 'SELECT id,username,fname,lname,TYPE,e.Employe_Id
    FROM login l
    join employee e ON e.Employe_Id =  l.Employe_Id
    join type t ON t.TYPE_ID = l.TYPE_ID
    WHERE l.TYPE_ID = 2';
    $result = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['fname'] .'&nbsp' .$row['lname'].'</td>';
        echo '<td>'. $row['username']. '</td>';
        echo '<td>'. $row['TYPE']. '</td>';
        echo"<td><a href ='account_searchfrm.php?action=edit&id=$row[id]'>Details</a>";
echo "</tr>";    
}
    ?>
    </tbody>
</table>
</div>