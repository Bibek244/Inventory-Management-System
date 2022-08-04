<?php
include 'connection.php';
$sqlforjob = "SELECT 	Employe_Id , fname, lname , JOB_TITLE FROM employee, job WHERE employee.JOB_ID = job.JOB_ID order by 	Employe_Id  asc";
$result = mysqli_query($con, $sqlforjob) or die ("mysqli_error( $sqlforjob)");

$emp  = "<select name='employee' required>
        <option value ='' disabled selected hidden>select employee</option>";

        
  while ($row = mysqli_fetch_assoc($result)) {
    $emp .= "<option value='".$row['Employe_Id']."'>".$row['fname'] ."&nbsp".$row['lname']."&nbsp-&nbsp".$row['JOB_TITLE']."</option> ";
  }
    $emp.= "</select>";
  
?>
<form method = "POST">
    <?php
    echo $emp; 
    ?>
    <div class ="form-container">
<label for ="username">Username</label>
    <input type = "text" name ="username"  required>
    <label for ="password">Password</label>
    <input type = "password" name ="password"  required>
    <button tyep ="submit" >submit</button>
</form>
</div>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $emp = $_POST['employee'];
    $user =  $_POST['username'];
    $pwd = sha1($_POST['password']);
    $query = "INSERT INTO login(Employe_Id,username,password,TYPE_ID) VALUES('$emp','$user','$pwd','2')";
    $result = mysqli_query($con,$query);
    if(!$result){
        echo "error".mysqli_error($con);
    }
}
?>