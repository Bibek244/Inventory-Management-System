<?php
    include 'connection.php';
    ini_set("display_errors", "1");
error_reporting(E_ALL);
?>
<?php
session_start();
$currentuser = $_SESSION['user'];
$query = "SELECT id, username,fname, lname, gender, email, phone, JOB_TITLE, Hired_date, address, TYPE FROM login l
JOIN employee e ON e.Employe_id = l.Employe_id
JOIN type t ON t.TYPE_ID = l.TYPE_ID
JOIN job j ON j.JOB_ID  = e.JOB_ID
 WHERE username = '$currentuser'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));       
if($result){
    if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $eid = $row['id'];
            $user =  $row['username'];
            $fn = $row['fname'];
            $ln = $row['lname'];    
            $ge = $row['gender'];
            $em = $row['email'];
            $hd = $row['Hired_date'];
            $ad = $row['address'];
            $jt = $row['JOB_TITLE'];
            $ty = $row['TYPE'];
            $phone = $row['phone'];
            }
    }

}
?>
<div class ="form-container">
<form method = "POST">
<label for ="username">Username</label>
    <input type = "hidden" name = 'id' value ="<?php echo $eid?>">
    <input type = "text" name ="username"  value = "<?php echo $user?>">
    <label for ="password">Password</label>
    <input type = "text" name ="password" required >
    <input type="hidden" name="id" value="<?php echo $eid; ?>" />
    <label for="fname">First name</label>
    <input type ="text" name = "fname" value ="<?php echo $fn?>">
    <label for="lname">Last name</label>
    <input type ="text" name = "lname" value ="<?php echo $ln?>">
    <label for="gender">Gender</label>
    <select name ="gender" value ="<?php echo $ge?>">
        <option  name ="" disabled>Select gender</option>
        <option  name ="male"  >Male</option>
        <option  name ="female" >Female</option>
    </select>
    <label for="jobtitle">Role</label>
   <input type ="text" value = "<?php echo $jt?>"  disabled>
    <label for="email">Email</label>
    <input type ="email" name = "email" value =" <?php echo $em?>">
    <label for="hired_date">Hired date</label>
    <input type ="date" name = "hired_date" value ="<?php echo $hd?>" disabled>
    <label for="address">Address</label>
    <input type ="text" name = "address" value = "<?php echo $ad?>">  
    <label for="phone">Contacts</label>
    <input type ="tel" pattern = "[0-9]{3}[0-9]{4}[0-9]{3}" name = "phone" value = "<?php echo $phone?>">
    <button type = "submit" >Submit</button>
</form>
</div>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id =$_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $query = "UPDATE login l
                            JOIN employee e ON e.Employe_id = l.Employe_id
                            SET e.fname = '$fname', e.lname ='$lname', e.gender = '$gender', e.email = '$email',
                            e.gender = '$gender',e.address='$address',e.phone = '$phone',
                            username = '$username',password ='".sha1($password)."'
                            WHERE id  ='$id'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
}
?>
