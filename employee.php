<?php
include 'connection.php';
include 'sidebar.php';
?>
<div id="content">
<table border ="2" cellspacing ="7"padding ="2">
    <thead>
        <tr>
            <th>Full name</th>
            <th>Job title</th>
            <th colspan = "3">Action</th>
            <tr>
</thead>
<tbody>
<?php
    $sql = 'SELECT fname, Employe_Id,fname,lname ,j.JOB_TITLE FROM employee e
    join job j ON j.JOB_ID = e.JOB_ID';
    $result = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo "<td>". $row['fname'].' '. $row['lname']. "</td>";
        echo "<td>". $row['JOB_TITLE']."</td>";
        echo"<td> <button><a href ='emp_searchfrm.php?action=edit&id=$row[Employe_Id]'>Details</a></button>";
        echo"<td> <button><a href ='emp_edit.php?action=edit&id=$row[Employe_Id]'>edit</a></button>";
        echo'<td> <button><a href ="#">delete</a></button>';
echo "</tr>";    
}
    ?>
    </tbody>
</table>
<button >  <a href="addemployee.php">Add employee</a></button>
</div>